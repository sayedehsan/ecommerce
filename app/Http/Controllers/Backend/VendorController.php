<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function dashboard()
    {
        // Logic for vendor dashboard
        return view('vendor.dashboard');
    }
}
