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
                        @if (session('file_format_error_blog_front_photo'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_blog_front_photo')}}
                            </div>
                        @endif

                        <form action="{{route('blog_area.update',$home_blog_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Headline One</label>
                                        <input type="text" name="headline_one" value="{{$home_blog_data->headline_one}}" class="@error('headline_one') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('headline_one')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" id="short_description_show" value="{{$home_blog_data->short_description}}" class="@error('short_description') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" rows="4"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Headline Two</label>
                                        <input type="text" name="headline_two" value="{{$home_blog_data->headline_two}}" class="@error('headline_two') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('headline_two')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Long Description</label>
                                        <textarea name="long_description" id="long_description_show" value="{{$home_blog_data->long_description}}" class="@error('short_description') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" rows="4"></textarea>
                                        @error('long_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Front Photo</label>
                                        <input type="hidden" class="form-control" name="old_front_photo" value="{{$home_blog_data->blog_front_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                        <img src="{{asset('upload_photos/blog-front-photo')}}/{{$home_blog_data->blog_front_photo}}" alt="not found" style="width: 100px; height:100px">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Front Photo</label>
                                        <input type="file" name="blog_front_photo" class=" @error('blog_front_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL1(this);">
                                        <img class="hidden p-2" id="blog_front_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:376x254</small><br>
                                        @error('blog_front_photo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Display Photo</label>
                                        <input type="hidden" class="form-control" name="old_display_photo" value="{{$home_blog_data->blog_display_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                        <img src="{{asset('upload_photos/blog-display-photo')}}/{{$home_blog_data->blog_display_photo}}" alt="not found" style="width: 100px; height:100px">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label>New Blog Display Photo</label>
                                        <input type="file" name="blog_display_photo" class=" @error('blog_display_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL1(this);">
                                        <img class="hidden p-2" id="blog_display_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:776x524</small><br>
                                        @error('blog_display_photo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Blog Photo</label>
                                        <input type="hidden" class="form-control" name="old_blog_photo" value="{{$home_blog_data->blog_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                        <img src="{{asset('upload_photos/blog-photo')}}/{{$home_blog_data->blog_photo}}" alt="not found" style="width: 100px; height:100px">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                        <label>New Blog Photo</label>
                                        <input type="file" name="blog_photo" class=" @error('blog_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL2(this);">
                                        <img class="hidden p-2" id="blog_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:376x254</small><br>
                                        @error('blog_photo')
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
        // blog_front_photo_viewer use here
        function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blog_front_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#blog_front_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // blog_display_photo_viewer use here
        function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blog_display_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#blog_display_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }

        // blog_photo_viewer use here
        function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blog_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#blog_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{--photo_viewer js code end here  --}}

    <script>
        // long_description code use here
        $(document).ready(function(){
            $textContent='{{$home_blog_data->long_description}}';
            $('#long_description_show').val($textContent);
        });

        // short_description_show code use here
        $(document).ready(function(){
            $textContent='{{$home_blog_data->short_description}}';
            $('#short_description_show').val($textContent);
        });
    </script>
@endsection
