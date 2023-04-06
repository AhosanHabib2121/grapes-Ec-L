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
                        <form action="{{route('about_brand.update',$about_brand_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Brand Link</label>
                                        <input type="text" name="brand_link" value="{{$about_brand_data->brand_link}}" class="@error('title') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('brand_link')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Brand Photo</label>
                                        <input type="hidden" class="form-control" name="old_brand_photo" value="{{$about_brand_data->brand_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                        <img src="{{asset('upload_photos/about-brand-photo')}}/{{$about_brand_data->brand_photo}}" alt="not found" style="width: 100px; height:100px">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Brand Photo</label>
                                        <input type="file" name="brand_photo" class=" @error('brand_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL(this);">
                                        <img class="hidden p-2" id="brand_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:125x63 png</small><br>
                                        @error('brand_photo')
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
        // brand_photo_viewer use here
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#brand_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#brand_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{--photo_viewer js code end here  --}}
@endsection
