@extends('admin.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
    </div>
    </div>
    <div class="section-body">

    <div class="row mt-sm-4">
        
        <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
            <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                @csrf
            <div class="card-header">
                <h4>Update Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Profile Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <img src="{{asset(Auth::user()->image)}}" alt="Profile Image" class="img-thumbnail mt-2" style="width: 150px; height: 150px;">
                    </div>
                </div>

                <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" required>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" required>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
            </div>
            </form>
        </div>
        </div>
    </div>
     <div class="row mt-sm-4">
        
        <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
            <form method="post" action="{{route('admin.update.password')}}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                @csrf
            <div class="card-header">
                <h4>Update Password</h4>
            </div>
            <div class="card-body">                              
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="current_password" required>
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label>Retype Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</section>
    
@endsection