@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Profile
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{route('profile')}}">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo" style="background: url({{asset('upload_photos/cover-photos')}}/{{$cover_photo_id->cover_photo}});
                            background-size: cover;
                            background-position: center;
                            min-height: 250px;
                            width: 100%;"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{asset('upload_photos/profile_photos/')}}/{{auth()->user()->profile_photo}}" class="img-fluid rounded-circle" alt="not found">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{auth()->user()->name}}</h4>
                                    <p>Name</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">
                                        @if (auth()->user()->phone_number)
                                            {{auth()->user()->phone_number}}
                                            @else
                                                N/A
                                        @endif
                                    </h4>
                                    <p>Phone Number</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{auth()->user()->email}}</h4>
                                    <p>Email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- row --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{-- ssuccess_message start here --}}
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif

                        @if (session('change_message'))
                            <div class="alert alert-success">
                                {{session('change_message')}}
                            </div>
                        @endif
                        {{-- ssuccess_message end here --}}
                    <div class="col-md-12">
                        <div class="pt-3">
                            <div class="settings-form">
                                <h4 class="text-primary">Account Setting</h4>
                                <form action="{{route('change_about')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control  @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone_number" value="{{auth()->user()->phone_number}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" value="{{auth()->user()->address}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Profile Photo</label>
                                                <input type="file" name="profile_photo" class="form-control" onchange="readURL(this);">
                                                <img class="hidden p-2" id="profile_photo_viewer" src="#" alt="your image" /><br>
                                                <small>size:300x300</small><br>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-square btn-sm" type="submit">Change</button>
                                </form>

                                {{-- change cover photo use code here --}}
                                <form action="{{route('change_cover.photo',$cover_photo_id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Old Cover Photo</label>
                                                <input type="hidden" class="form-control" name="old_photo" value="{{$cover_photo_id->cover_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                                <img src="{{asset('upload_photos/cover-photos')}}/{{$cover_photo_id->cover_photo}}" alt="not found" style="width: 100px; height:100px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Cover Photo</label>
                                                <input type="file" name="cover_photo" class="form-control" onchange="readURL1(this);">
                                                <img class="hidden p-2" id="cover_photo_viewer" src="#" alt="your image" /><br>
                                                <small>size:1600x451</small><br>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-square btn-sm" type="submit">Change</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{-- password_success start here --}}
                        @if (session('password_success'))
                            <div class="alert alert-success">
                                {{session('password_success')}}
                            </div>
                        @endif
                        {{-- ssuccess_message end here --}}
                        <div class="col-md-12">
                            <div class="pt-3">
                                <div class="settings-form">
                                    <h4 class="text-primary">Password Setting</h4>
                                    <form action="{{route('change_password')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input type="password" name="current_password" placeholder="password" class="form-control  @error('current_password') is-invalid @enderror @error('error_password') is-invalid @enderror">

                                                    @error('current_password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                    @error('error_password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>New passwore</label>
                                                    <input type="password" name="password" placeholder="password" class="form-control @error('password') is-invalid @enderror">
                                                    @error('password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Confrm Password</label>
                                                    <input type="password" name="password_confirmation" placeholder="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-info btn-square btn-sm" type="submit">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script-content')
    <script>
        // profile_photo_viewer here
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#profile_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // cover_photo_viewer here
        function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cover_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#cover_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
