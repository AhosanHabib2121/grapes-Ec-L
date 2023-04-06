@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Team List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>Team Info </h2>

                        {{-- Recycle file(modal) code start here --}}
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Daleted Team Area</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table id="deleted_team_table" class="table table-bordered table-inverse">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Name</th>
                                                    <th>Title</th>
                                                    <th>Team Photo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($deleted_about_team_all_data as $deleted_about_team_data )
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$deleted_about_team_data->name}}</td>
                                                        <td>{{$deleted_about_team_data->title}}</td>
                                                        <td>
                                                            <img src="{{asset('upload_photos/about-team-area-photo')}}/{{$deleted_about_team_data->team_photo}}" alt="not found" style="width: 100px; height:100px">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-2 btn-group">
                                                                <a href="{{route('team_restore',$deleted_about_team_data->id)}}" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('team_force_delete',$deleted_about_team_data->id)}}" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                        <table id="team_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Team Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($about_team_all_data as $about_team_data )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$about_team_data->name}}</td>
                                        <td>{{$about_team_data->title}}</td>
                                        <td>
                                            <img src="{{asset('upload_photos/about-team-area-photo')}}/{{$about_team_data->team_photo}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group mb-2 btn-group">
                                                <a href="{{route('team_area.edit',$about_team_data->id)}}" class="btn btn-warning btn-square btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </div>
                                            <form action="{{route('team_area.destroy',$about_team_data->id)}}" method="POST">
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
            //team_table code use here
            $(document).ready( function () {
                $('#team_table').DataTable();
            } );
            //deleted_team_table code use here
            $(document).ready( function () {
                $('#deleted_team_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection


