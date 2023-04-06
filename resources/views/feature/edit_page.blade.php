@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Edit feature
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Edit feature</h2>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif

                        <form action="{{route('feature.update',$feature->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Feature Title</label>
                                        <input type="text" class=" @error('feature_title') is-invalid @enderror form-control" name="feature_title" value="{{$feature->feature_title}}" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('feature_title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Title</label>
                                        <input type="text" class=" @error('sub_title') is-invalid @enderror form-control" name="sub_title" value="{{$feature->sub_title}}" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('sub_title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Photo</label>
                                        <input type="hidden" class="form-control" name="old_photo" value="{{$feature->feature_photo}}" style="border-color: rgba(38, 41, 83, 0.5);">
                                        <img src="{{url($feature->feature_photo)}}" alt="not found" style="width: 100px; height:100px">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Photo</label>
                                        <input type="file" class=" @error('new_photo') is-invalid @enderror form-control" name="new_photo" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL(this);">
                                        <img class="hidden p-2" id="feature_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:46x34png</small><br>
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
    {{--feature_photo_viewer js code start here  --}}
    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#feature_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#feature_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{--feature_photo_viewer js code end here  --}}
@endsection
