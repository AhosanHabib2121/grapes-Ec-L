@extends('layouts.dashboard_master')

@section('dashboard_bar')
    banner
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>List banner</h2>

                        {{-- Recycle file(modal) code start here --}}
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Daleted Banner</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table class="table table-bordered table-inverse">
                                            @if ($delete_banner->count() > 0)
                                                <thead class="thead-inverse">
                                                    <tr>
                                                        <th>Serial No</th>
                                                        <th>Offer Message</th>
                                                        <th>Banner Title</th>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            @endif
                                            <tbody>
                                                @forelse ($delete_banner as $delete_data )
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$delete_data->offer_message}}</td>
                                                        <td>{{$delete_data->banner_title}}</td>
                                                        <td>
                                                            <img src="{{asset('upload_photos/banner-photos')}}/{{$delete_data->banner_photo}}" alt="not found" style="width: 100px; height:100px">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-2 btn-group">
                                                                <a href="{{route('restore',$delete_data->id)}}" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('force_delete',$delete_data->id)}}" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                                    <th>Offer Message</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner_all_info as $banner_info )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$banner_info->offer_message}}</td>
                                        <td>{{$banner_info->banner_title}}</td>
                                        <td>
                                            <img src="{{asset('upload_photos/banner-photos')}}/{{$banner_info->banner_photo}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group mb-2 btn-group">
                                                {{-- <a href="{{route('banner.show',$banner_info->id)}}" class="btn btn-info btn-square btn-xs">Show Details</a> --}}
                                                <a href="{{route('banner.edit',$banner_info->id)}}" class="btn btn-warning btn-square btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </div>
                                            <form action="{{route('banner.destroy',$banner_info->id)}}" method="POST">
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
            $(document).ready( function () {
                $('#category_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection

