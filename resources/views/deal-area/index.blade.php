@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Deal data List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>Deal Info </h2>

                        {{-- Recycle file(modal) code start here --}}
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Daleted Deal Area</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table id="deleted_deal_table" class="table table-bordered table-inverse">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Category Name</th>
                                                    <th>Title</th>
                                                    <th>Deal Photo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($delete_deal_area_info as $delete_deal_area )
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$delete_deal_area->category_name}}</td>
                                                        <td>{{$delete_deal_area->title}}</td>
                                                        <td>
                                                            <img src="{{url($delete_deal_area->deal_photo)}}" alt="not found" style="width: 100px; height:100px">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-2 btn-group">
                                                                <a href="{{route('deal_restore',$delete_deal_area->id)}}" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('deal_force_delete',$delete_deal_area->id)}}" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                        <table id="deal_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Category Name</th>
                                    <th>Title</th>
                                    <th>Deal Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deal_area_data as $deal_area )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$deal_area->category_name}}</td>
                                        <td>{{$deal_area->title}}</td>
                                        <td>
                                            <img src="{{url($deal_area->deal_photo)}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group mb-2 btn-group">
                                                <a href="{{route('deal_area.edit',$deal_area->id)}}" class="btn btn-warning btn-square btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </div>
                                            <form action="{{route('deal_area.destroy',$deal_area->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-square btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
            //deal_table code use here
            $(document).ready( function () {
                $('#deal_table').DataTable();
            } );
            //deleted_deal_table code use here
            $(document).ready( function () {
                $('#deleted_deal_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection
