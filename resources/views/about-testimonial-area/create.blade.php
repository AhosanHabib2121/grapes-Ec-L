@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Testimonial Data create
@endsection

@section('content')
    <div class="container">
        <div class="row">
            {{-- main testimonial area start here --}}
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

                        <form action="{{route('about_testimonial.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="@error('title') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" class="@error('short_description') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" rows="4"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Testimonial Photo</label>
                                        <input type="file" name="testimonial_photo" class=" @error('testimonial_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL(this);">
                                        <img class="hidden p-2" id="testimonial_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:56x56</small><br>
                                        @error('testimonial_photo')
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
            {{-- main testimonial area end here --}}

            {{-- main testimonial reating area start here --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Reating</h2>
                    </div>
                    <div class="card-body">
                        @if (session('reating_success'))
                            <div class="alert alert-success">
                                {{session('reating_success')}}
                            </div>
                        @endif

                        <form action="{{route('testimonial_reating.add')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reating</label>
                                        <input type="range" name="reating" min="1" max="5" value="1" class="form-control">
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
            {{-- main testimonial reating area end here --}}
        </div>
    </div>
@endsection
@section('js-script-content')
    {{--photo_viewer js code start here  --}}
    <script>
        // testimonial_photo_viewer here
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#testimonial_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#testimonial_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{--photo_viewer js code end here  --}}
@endsection
