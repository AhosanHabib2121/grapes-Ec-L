@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Update
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Admin Information Update</h2>
                    </div>
                    <div class="card-body">
                        @if (session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif
                        <form action="{{route('admin_info.update',$admin_parsonal_info_id->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" value="{{$admin_parsonal_info_id->name}}" class="@error('name') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" value="{{$admin_parsonal_info_id->email}}" class="@error('email') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone_number" value="{{$admin_parsonal_info_id->phone_number}}" class="@error('phone_number') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('phone_number')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" value="{{$admin_parsonal_info_id->address}}" class="@error('address') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
