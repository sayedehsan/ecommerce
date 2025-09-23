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
                            <form method="POST" action="{{ route('admin.categories.store') }}">
                                @csrf
                                <div class="row align-items-center">
                                    {{-- <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Icon">Icon</label>
                                            <div>
                                                <button class="btn btn-primary" data-selected-class="btn-danger" data-unselected-class="btn-info" role="iconpicker"></button>
                                            </div>
                                            <button class="btn btn-secondary" role="iconpicker"></button>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3"><input class="form-control" type="text" name="name" placeholder="Catagory Name" required></div>
                                    <div class="col-md-3">
                                        <select name="status" class="form-control" required>  
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"><button type="submit" class="btn btn-primary">Submit</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Category List</h4>
                            {{-- <div class="card-header-action">
                                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">+ Category</a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                                    <thead>
                                        <th> Id </th>
                                        <th> Icon </th>
                                        <th> Name </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </thead>

                                    <tbody>
                                        @foreach ($getData as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td><i class="{{$item->icon}}"></i></td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                @if ($item->status == 'active')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.categories.edit',$item->id)}}" id="modal-1" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                                </form>
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