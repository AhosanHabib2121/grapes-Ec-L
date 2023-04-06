@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Update Logo
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Logo Photo</h2>
                    </div>
                    <div class="card-body">
                        @if (session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif

                        <form action="{{route('logo.update',$project_logo_id->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Logo Photo</label>
                                        <input type="hidden" class="form-control" name="old_photo" value="{{$project_logo_id->logo_photo}}" style="border-color: rgba(38, 41, 83, 0.5);"><br>
                                        <img src="{{asset('upload_photos/logo-photo')}}/{{$project_logo_id->logo_photo}}" alt="not found" style="width: 100px; height:100px">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Logo Photo</label>
                                        <input type="file" class=" @error('logo_photo') is-invalid @enderror form-control" name="logo_photo" style="border-color: rgba(38, 41, 83, 0.5);" onchange="readURL(this);">
                                        <img class="hidden p-2" id="logo_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size:124x29png</small><br>
                                        @error('logo_photo')
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
@section('js-script-content')
    {{--logo_photo_viewer js code start here  --}}
    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#logo_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#logo_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{--logo_photo_viewer js code end here  --}}
@endsection
