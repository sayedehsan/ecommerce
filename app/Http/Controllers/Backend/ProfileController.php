<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{
    public function index()
    {
        // Logic to show the profile
        return view('admin.profile.index');
    }

    public function edit()
    {
        // Logic to edit the profile
        return view('backend.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,

        ]);
        $user = User::find(Auth::id());
        if($request->hasfile('image')){
            if(File::exists(public_path('uploads/profile/' . $user->image))){
                File::delete(public_path('uploads/profile/' . $user->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile'), $imageName);
            $imgPath = 'uploads/profile/' . $imageName;
            $user->image = $imgPath;
        }


        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::find(Auth::id());


        if (!password_verify($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = bcrypt($request->input('password'));
        $user->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admin.profile')->with('success', 'Password updated successfully.');
    }
    public function destroy()
    {
        // Logic to delete the profile
        return redirect()->route('dashboard')->with('success', 'Profile deleted successfully.');
    }
}
