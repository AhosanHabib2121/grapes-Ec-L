@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Product List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>Product List</h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                        <table id="category_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Product Name</th>
                                    <th>Regular Price</th>
                                    <th>Discounted Price</th>
                                    <th>Product Thumbnail Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_info as $product )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->regular_price}}</td>
                                        <td>{{$product->discounted_price}}</td>
                                        <td>
                                            <img src="{{asset('upload_photos/product-photos')}}/{{$product->product_thumbnail_photo}}" style="width: 100px; height:100px;" alt="not found">
                                        </td>

                                        <td>
                                            <div class="btn-group mb-2 btn-group">
                                                <a href="{{route('add_feature.photo',$product->id)}}" class="btn btn-info btn-square btn-xs">Add Feature Photo</a>
                                                <a href="{{route('product.details',$product->slug)}}" target="_blank" class="btn btn-warning btn-square btn-xs">Previous</a>
                                                <a href="{{route('add.inventories',$product->id)}}" class="btn btn-secondary btn-square btn-xs">Add Inventory</a>
                                            </div>
                                            <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-square btn-xs">Delete</button>
                                            </form>
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

@section('js-script-content')
    {{-- dataTables -plugin code start here --}}
        <script>
            $(document).ready( function () {
                $('#category_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection


