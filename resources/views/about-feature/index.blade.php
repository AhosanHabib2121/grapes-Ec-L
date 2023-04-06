@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Feature List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>Feature Info </h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                        <table id="feature_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($about_feature_data as $feature_info )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$feature_info->title}}</td>
                                        <td>{{$feature_info->sub_title}}</td>
                                        <td>
                                            <img src="{{asset('upload_photos/about-feature-photos')}}/{{$feature_info->feature_photo}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group mb-2 btn-group">
                                                <a href="{{route('about_feature.edit',$feature_info->id)}}" class="btn btn-warning btn-square btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </div>
                                            <form action="{{route('about_feature.destroy',$feature_info->id)}}" method="POST">
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
                $('#feature_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection

