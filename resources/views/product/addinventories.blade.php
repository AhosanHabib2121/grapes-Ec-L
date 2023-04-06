@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Inventory
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2>Add Inventory - {{$product_information->product_name}}</h2>
                </div>
                <div class="card-body">
                    @if(session('success_message'))
                        <div class="alert alert-success">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form action="{{ route('add_inventories.post',$product_id)}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Color :</label>
                                    @forelse ($color_information as $color_info )
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="color_id" id="exampleRadios{{$color_info->id}}" value="{{$color_info->id}}" checked>
                                            <label class="form-check-label" for="exampleRadios{{$color_info->id}}">
                                                {{$color_info->color_name}} <span class="badge" style="background: {{$color_info->color_code}}"> &nbsp; </span>
                                            </label>
                                        </div>
                                    @empty
                                        <span class="text-danger">No data to show</span>
                                    @endforelse

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Size :</label>
                                    <select name="size_id" class="@error('size_id') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);">
                                        <option value="">-Choose Size-</option>
                                        @foreach ($size_information as $size )
                                            <option value="{{$size->id}}">{{$size->size_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('size_id')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantity :</label>
                                    <input type="number" name="quantity" class="@error('quantity') is-invalid @enderror form-control" style="border-color: rgba(38, 41, 83, 0.5);" >
                                    @error('quantity')
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2>Inventory List- {{$product_information->product_name}}</h2>
                    <span class="badge bg-info">Total Variation : {{$inventorie_information->count('quantity')}} </span>
                </div>
                <div class="card-body">
                    @if(session('delete_inventorie_message'))
                        <div class="alert alert-danger">
                            {{session('delete_inventorie_message')}}
                        </div>
                    @endif
                    <table id="inventory_table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Color Name</th>
                                <th>Size Name</th>
                                <th>Quantity Name</th>
                                <th>Market Value (৳)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_market_value=0;
                            @endphp
                            @forelse ($inventorie_information as $inventorie )
                                <tr>
                                    <td>
                                        {{$loop->index+1}}
                                        @if ($inventorie->quantity==0)
                                            <alert class="alert-danger">
                                                Stoke Out
                                            </alert>
                                        @endif
                                    </td>
                                    <td>
                                        {{$inventorie->relationTocolor->color_name}}
                                        <span class="badge" style="background: {{$inventorie->relationTocolor->color_code}}"> </span>
                                    </td>
                                    <td>{{$inventorie->relationTosize->size_name}}</td>
                                    <td>{{$inventorie->quantity}}</td>
                                        @php
                                            $total_market_value +=($product_information->discounted_price * $inventorie->quantity);
                                        @endphp
                                    <td>{{$product_information->discounted_price * $inventorie->quantity}}</td>
                                    <td>
                                        <a href="{{route('inventory.delete',$inventorie->id)}}" class="text-danger"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-danger text-center">
                                    <td colspan="50">No data to show</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="3" class="text-center">
                                    <b>Total </b>
                                </td>
                                <td>{{$inventorie_information->sum('quantity')}}</td>
                                <td colspan="2" ><b>{{$total_market_value}}</b></td>
                            </tr>
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
                $('#inventory_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection
