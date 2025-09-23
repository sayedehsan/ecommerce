@extends('admin.layouts.master')
@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Category</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="col-12">
                <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- <input type="hidden" name="id" value="{{$category->id}}"> --}}
                                <div class="row align-items-center">
                                   
                                    <div class="col-md-3"><input class="form-control" type="text" name="name" value="{{$category->name}}" placeholder="Catagory Name" required></div>
                                    <div class="col-md-3">
                                        <select name="status" class="form-control" required>  
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="active" {{$category->status == 'active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{$category->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"><button type="submit" class="btn btn-primary">Submit</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
          </div>
    </section>
@endsection