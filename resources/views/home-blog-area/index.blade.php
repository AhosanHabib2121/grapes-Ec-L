@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Blog List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>Blog Info </h2>

                        {{-- Recycle file(modal) code start here --}}
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Daleted blog Area</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table id="deleted_blog_table" class="table table-bordered table-inverse">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Headline One</th>
                                                    <th>Short Description</th>
                                                    <th>Headline Two</th>
                                                    <th>Long Description</th>
                                                    <th>Blog Front Photo</th>
                                                    <th>Blog Photo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($deleted_home_blog_data as $deleted_home_blog )
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$deleted_home_blog->headline_one}}</td>
                                                        <td>{{$deleted_home_blog->short_description}}</td>
                                                        <td>{{$deleted_home_blog->headline_two}}</td>
                                                        <td>{{$deleted_home_blog->long_description}}</td>
                                                        <td>
                                                            <img src="{{asset('upload_photos/blog-front-photo')}}/{{$deleted_home_blog->blog_front_photo}}" alt="not found" style="width: 100px; height:100px">
                                                        </td>
                                                        <td>
                                                            <img src="{{asset('upload_photos/blog-display-photo')}}/{{$deleted_home_blog->blog_display_photo}}" alt="not found" style="width: 100px; height:100px">
                                                        </td>
                                                        <td>
                                                            <img src="{{asset('upload_photos/blog-photo')}}/{{$deleted_home_blog->blog_photo}}" alt="not found" style="width: 100px; height:100px">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-2 btn-group">
                                                                <a href="{{route('blog_restore',$deleted_home_blog->id)}}" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('blog_force_delete',$deleted_home_blog->id)}}" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                        <table id="blog_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Headline One</th>
                                    <th>Short Description</th>
                                    <th>Headline Two</th>
                                    <th>Long Description</th>
                                    <th>Blog Front Photo</th>
                                    <th>Blog Display Photo</th>
                                    <th>Blog Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($home_blog_data as $home_blog )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$home_blog->headline_one}}</td>
                                        <td>{{$home_blog->short_description}}</td>
                                        <td>{{$home_blog->headline_two}}</td>
                                        <td>{{$home_blog->long_description}}</td>
                                        <td>
                                            <img src="{{asset('upload_photos/blog-front-photo')}}/{{$home_blog->blog_front_photo}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        <td>
                                            <img src="{{asset('upload_photos/blog-display-photo')}}/{{$home_blog->blog_display_photo}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        <td>
                                            <img src="{{asset('upload_photos/blog-photo')}}/{{$home_blog->blog_photo}}" alt="not found" style="width: 100px; height:100px">
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group mb-2 btn-group">
                                                <a href="{{route('blog_area.edit',$home_blog->id)}}" class="btn btn-warning btn-square btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </div>
                                            <form action="{{route('blog_area.destroy',$home_blog->id)}}" method="POST">
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
            //blog_table code use here
            $(document).ready( function () {
                $('#blog_table').DataTable();
            } );
            //deleted_blog_table code use here
            $(document).ready( function () {
                $('#deleted_blog_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection


