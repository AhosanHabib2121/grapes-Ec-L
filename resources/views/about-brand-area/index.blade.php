@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Brand List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>Brand Info </h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                        <table id="service_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Brand Link</th>
                                    <th>Brand Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brand_all_data as $brand_data )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$brand_data->brand_link}}</td>
                                        <td>
                                            <img src="{{asset('upload_photos/about-brand-photo')}}/{{$brand_data->brand_photo}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group mb-2 btn-group">
                                                <a href="{{route('about_brand.edit',$brand_data->id)}}" class="btn btn-warning btn-square btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </div>
                                            <form action="{{route('about_brand.destroy',$brand_data->id)}}" method="POST">
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
            //service_table code use here
            $(document).ready( function () {
                $('#service_table').DataTable();
            } );
            //deleted_service_table code use here
            $(document).ready( function () {
                $('#deleted_service_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection


