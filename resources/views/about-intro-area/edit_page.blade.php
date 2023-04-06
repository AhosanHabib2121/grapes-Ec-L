@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Edit Page
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Edit</h2>
                    </div>
                    <div class="card-body">
                        @if (session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif
                        <form action="{{route('intro_area.update',$about_intro_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$about_intro_data->title}}" class="@error('title') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" id="short_description_show" value="{{$about_intro_data->short_description}}" class="@error('short_description') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" rows="4"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Intro Small Photo</label>
                                        <input type="hidden" class="form-control" name="old_intro_small_photo" value="{{$about_intro_data->intro_small_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                        <img src="{{asset('upload_photos/intro-area-photo-one')}}/{{$about_intro_data->intro_small_photo}}" alt="not found" style="width: 100px; height:100px">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Intro Small Photo</label>
                                        <input type="file" name="intro_small_photo" class=" @error('intro_small_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL(this);">
                                        <img class="hidden p-2" id="intro_small_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:283x127 png</small><br>
                                        @error('intro_small_photo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Intro Large Photo</label>
                                        <input type="hidden" class="form-control" name="old_intro_large_photo" value="{{$about_intro_data->intro_large_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                        <img src="{{asset('upload_photos/intro-area-photo-two')}}/{{$about_intro_data->intro_large_photo}}" alt="not found" style="width: 100px; height:100px">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Intro Large Photo</label>
                                        <input type="file" name="intro_large_photo" class=" @error('intro_large_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL1(this);">
                                        <img class="hidden p-2" id="intro_large_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:509x506 png</small><br>
                                        @error('intro_large_photo')
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
    {{--photo_viewer js code start here  --}}
    <script>
        // intro_small_photo_viewer use here
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#intro_small_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#intro_small_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // intro_large_photo_viewer use here
        function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#intro_large_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#intro_large_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{--photo_viewer js code end here  --}}

    <script>
        // short_description_show code use here
        $(document).ready(function(){
            $textContent='{{$about_intro_data->short_description}}';
            $('#short_description_show').val($textContent);
        });
    </script>
@endsection
