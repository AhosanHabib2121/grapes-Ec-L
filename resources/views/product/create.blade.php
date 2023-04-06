@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Product
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Create Information</h2>
                    </div>
                    <div class="card-body">
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Produts Name</label>
                                        <input type="text"  class="@error('product_name') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" name="product_name">
                                        @error('product_name')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Regular Price</label>
                                        <input type="text" name="regular_price" class="@error('regular_price') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" >
                                        @error('regular_price')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Discounted Price</label>
                                        <input type="text" name="discounted_price" class="@error('discounted_price') is-invalid @enderror @error('error') is-invalid @enderror  form-control" style="border-color: rgba(38, 41, 83, 0.5);" >
                                        @error('error')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        @error('discounted_price')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea type="text" rows="4" class="@error('short_description') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" name="short_description"></textarea>
                                        @error('short_description')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Id</label>
                                        <select id="category_dropdown" name="category_id" class="@error('category_id') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                            <option value="">-Select one category-</option>
                                            @foreach ($categories as $category )
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subcategory Id</label>
                                        <select id="subcategory_dropdown" name="subcategory_id" class="@error('subcategory_id') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" >
                                            <option value="">-No data yet-</option>
                                        </select>
                                        @error('subcategory_id')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Long Description</label>
                                        <textarea type="text" rows="4" class="@error('long_description') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" name="long_description"></textarea>
                                        @error('long_description')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input type="text" class="@error('weight') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" name="weight">
                                        @error('weight')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Dimensions</label>
                                        <input type="text" class="@error('dimensions') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" name="dimensions">
                                        @error('dimensions')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Materials</label>
                                        <input type="text" class="@error('materials') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" name="materials">
                                        @error('materials')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Other Info</label>
                                        <input type="text" class="@error('other_info') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" name="other_info">
                                        @error('other_info')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Thumbnail Photo</label>
                                        <input type="file" class="@error('product_thumbnail_photo') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" name="product_thumbnail_photo"  onchange="readURL(this);">
                                        <img class="hidden p-2" id="product_photo_viewer" src="#" alt="your image" /><br>
                                        <small>size: 270x310</small>
                                        @error('product_thumbnail_photo')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script-content')
    <script>
        $(document).ready(function(){
            $('#category_dropdown').change(function(){
                var category_id=$(this).val();
                // ajax start here
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{route('get_subcategory')}}",
                        data:{category_id:category_id},

                        success:function(data){
                            $('#subcategory_dropdown').html(data)
                        }
                    });
                // ajax end here
            });
        });
    </script>
    {{--product_photo_viewer js code start here  --}}
    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#product_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#product_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{--product_photo_viewer js code end here  --}}
@endsection
