@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Product Feature photo
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Product Feature photo - {{$product_data->product_name}}</h2>
                    </div>
                    <div class="card-body">
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        @if(session('file_format_error_message'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_message')}}
                            </div>
                        @endif
                        <form action="{{ route('add_feature_photo.post',$product_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Feature Photo</label>
                                        <input type="file" name="product_feature_photo_name[]" class="@error('product_feature_photo_name') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" multiple >
                                        <small>size: 270x310</small><br>
                                        @error('product_feature_photo_name')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add feature photo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Product Feature photo List - {{$product_data->product_name}}</h2>
                    </div>
                    <div class="card-body">
                        @if(session('dalate_message'))
                            <div class="alert alert-danger">
                                {{session('dalate_message')}}
                            </div>
                        @endif
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Product Feature Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_feature_photos as $product_feature_photo )
                                     <tr>
                                         <td>{{$loop->index+1}}</td>
                                         <td>
                                             <img width="100px" src="{{asset('upload_photos/product-feature-photos')}}/{{$product_feature_photo->product_feature_photo_name}}" alt="not found">
                                         </td>
                                         <td>
                                             <a href="{{route('product_feature_photo_delete',$product_feature_photo->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                         </td>
                                     </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

