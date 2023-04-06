@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Blog data create
@endsection

@section('content')
    <div class="container">
        <div class="row">
            {{-- blog head area end here --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Update</h2>
                    </div>
                    <div class="card-body">
                        @if (session('update_head_message'))
                            <div class="alert alert-success">
                                {{session('update_head_message')}}
                            </div>
                        @endif

                        <form action="{{route('blog_head.update',$home_blog_head_data)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$home_blog_head_data->title}}"  class="@error('title') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" name="subtitle" value="{{$home_blog_head_data->subtitle}}" class="@error('subtitle') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('subtitle')
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
            {{-- blog head area end here --}}

            {{-- main blog area start here --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Create</h2>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif

                        <form action="{{route('blog_area.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Headline One</label>
                                        <input type="text" name="headline_one" class="@error('headline_one') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('headline_one')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" id="" class="@error('short_description') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" rows="4"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Headline Two</label>
                                        <input type="text" name="headline_two" class="@error('headline_two') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('headline_two')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Long Description</label>
                                        <textarea name="long_description" id="" class="@error('short_description') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" rows="4"></textarea>
                                        @error('long_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Front Photo</label>
                                        <input type="file" name="blog_front_photo" class=" @error('blog_front_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL(this);">
                                        <img class="hidden p-2" id="blog_front_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:376x254</small><br>
                                        @error('blog_front_photo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Display Photo</label>
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
                                        <label>Blog Photo</label>
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
                              <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- main blog area end here --}}
        </div>
    </div>
@endsection
@section('js-script-content')
    {{--photo_viewer js code start here  --}}
    <script>
        // blog_front_photo_viewer here
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blog_front_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#blog_front_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // blog_display_photo_viewer here
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
        // blog_photo_viewer here
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
@endsection
