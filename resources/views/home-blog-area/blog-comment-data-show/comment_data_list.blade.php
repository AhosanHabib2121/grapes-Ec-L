@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Blog Comment Data List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>Comment Data List </h2>

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
                                        <table class="table table-bordered table-inverse">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($delete_blog_comment_data_all as $delete_blog_comment_data )
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$delete_blog_comment_data->name}}</td>
                                                        <td>{{$delete_blog_comment_data->email}}</td>
                                                        <td>{{$delete_blog_comment_data->message}}</td>
                                                        <td>
                                                            <div class="btn-group mb-2 btn-group">
                                                                <a href="{{route('blog_comment_data_restore',$delete_blog_comment_data->id)}}" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('blog_comment_data_force_delete',$delete_blog_comment_data->id)}}" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                        <table id="feature_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blog_comment_data_all as $blog_comment_data )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$blog_comment_data->name}}</td>
                                        <td>{{$blog_comment_data->email}}</td>
                                        <td>{{$blog_comment_data->message}}</td>
                                        <td>
                                            <form action="{{route('blog_comment_data.delete',$blog_comment_data->id)}}" method="POST">
                                                @csrf
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


