@extends('admin.layouts.master')
@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Sub-Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Sub-Category</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                            <form method="POST" action="{{ route('admin.subcategories.store') }}">
                                @csrf
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <select name="category_id" class="form-control" required>  
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach ($getCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   
                                    <div class="col-md-3 mt-2"><input class="form-control" type="text" name="name" placeholder="Catagory Name" required></div>
                                    <div class="col-md-3">
                                        <select name="status" class="form-control mt-2" required>  
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-2"><button type="submit" class="btn btn-primary">Submit</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Sub-Category List</h4>
                            {{-- <div class="card-header-action">
                                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">+ Category</a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                                    <thead>
                                        <th> Sl </th>
                                        <th> Name </th>
                                        <th> Category </th> 
                                        <th> Status </th>
                                        <th> Action </th>
                                    </thead>

                                    <tbody>
                                        @foreach ($getSubcategories as $subcategory)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $subcategory->name }}</td>
                                                <td>{{ $subcategory->category->name }}</td>
                                                <td>{{ ucfirst($subcategory->status) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('admin.subcategories.destroy', $subcategory->id) }}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
    </section>
@endsection