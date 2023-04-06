@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Edit Banner
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Edit Banner</h2>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif

                        <form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Offer Message</label>
                                        <input type="text" class=" @error('offer_message') is-invalid @enderror form-control" name="offer_message" value="{{$banner->offer_message}}" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('offer_message')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Title</label>
                                        <input type="text" class=" @error('banner_title') is-invalid @enderror form-control" name="banner_title" value="{{$banner->banner_title}}" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('banner_title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Photo</label>
                                        <input type="hidden" class="form-control" name="old_photo" value="{{$banner->banner_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                        <img src="{{asset('upload_photos/banner-photos')}}/{{$banner->banner_photo}}" alt="not found" style="width: 100px; height:100px">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Photo</label>
                                        <input type="file" class=" @error('new_photo') is-invalid @enderror form-control" name="new_photo" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL(this);">
                                        <img class="hidden p-2" id="banner_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:608x552png</small><br>
                                        @error('new_photo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-script-content')
    {{--banner_photo_viewer js code start here  --}}
    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#banner_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#banner_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{--banner_photo_viewer js code end here  --}}
@endsection
