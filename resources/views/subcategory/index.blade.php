@extends('layouts.dashboard_master')

@section('dashboard_bar')
    List Subcategory
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>List Subcategory</h2>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="subcategory_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Category Name</th>
                                    <th>Subcategory Name</th>
                                    <th>Added by</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subcategory_info as $single_subcategories)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{App\Models\category::withTrashed()->find($single_subcategories->category_id)->category_name}}</td>
                                        <td>{{$single_subcategories->subcategory_name}}</td>
                                        <td>{{App\Models\User::find($single_subcategories->added_by)->name}}</td>
                                        {{-- <td class="d-flex">
                                            <div class="btn-group mb-2 btn-group">
                                                <a href="{{route('category.show',$single_info->id)}}" class="btn btn-info btn-square btn-xs">Show Details</a>
                                                <a href="{{route('category.edit',$single_info->id)}}" class="btn btn-warning btn-square btn-xs">Edit</a>
                                            </div>
                                            <form action="{{route('category.destroy',$single_info->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-square btn-xs">Delete</button>
                                            </form>
                                        </td> --}}
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
    </div>
@endsection

@section('js-script-content')
    <script>
        $(document).ready( function () {
            $('#subcategory_table').DataTable();
        } );
    </script>
@endsection

