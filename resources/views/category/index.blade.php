@extends('layouts.dashboard_master')

@section('dashboard_bar')
    List Category
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>List Category</h2>

                        {{-- Recycle file(modal) code start here --}}
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Category Name</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table class="table table-bordered table-inverse">
                                            @if ($delete_category->count() > 0)
                                                <thead class="thead-inverse">
                                                    <tr>
                                                        <th>Serial No</th>
                                                        <th>Category name</th>
                                                        <th>Category photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            @endif
                                            <tbody>
                                                @forelse ($delete_category as $delete_categories )
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$delete_categories->category_name}}</td>
                                                        <td>
                                                            <img src="{{asset('upload_photos/category-photos')}}/{{$delete_categories->category_photo}}" alt="not found" style="width: 100px; height:100px">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-2 btn-group">
                                                                <a href="{{route('category_restore',$delete_categories->id)}}" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('category_force_delete',$delete_categories->id)}}" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr class="text-center text-danger">
                                                        <td colspan='50'>No data no show</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Recycle file(modal) code end here --}}
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                        <table id="category_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Category Name</th>
                                    <th>Category Photo</th>
                                    {{-- <th>Category create time & date</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category_all_info as $single_info )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$single_info->category_name}}</td>
                                        <td>
                                            <img src="{{asset('upload_photos/category-photos')}}/{{$single_info->category_photo}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        {{-- <td>
                                            {{$single_info->created_at->format('d/m/Y h:i:m')}}
                                            @if ($single_info->created_at->diffinseconds() < 60)
                                                    <p class="badge bg-dark text-white">Just now</p>
                                                @else
                                                    <div class="badge bg-dark text-white">{{$single_info->created_at->diffforhumans()}}</div>
                                            @endif
                                        </td> --}}
                                        <td class="d-flex">
                                            <div class="btn-group mb-2 btn-group">
                                                {{-- <a href="{{route('category.show',$single_info->id)}}" class="btn btn-info btn-square btn-xs">Show Details</a> --}}
                                                <a href="{{route('category.edit',$single_info->id)}}" class="btn btn-warning btn-square btn-xs">Edit</a>
                                            </div>
                                            <form action="{{route('category.destroy',$single_info->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-square btn-xs">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script-content')
    {{-- dataTables -plugin code start here --}}
        <script>
            $(document).ready( function () {
                $('#category_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection

