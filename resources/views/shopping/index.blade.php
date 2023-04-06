@extends('layouts.dashboard_master');

@section('dashboard_bar')
    Shopping Charge Chart
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {{-- shopping charge add code use here --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                <h2>Shopping Charge add</h2>
                            </div>
                            <div class="card-body">
                                @if (session('shoppings_error'))
                                    <div class="alert alert-danger">
                                        {{session('shoppings_error')}}
                                    </div>
                                @endif
                                @if (session('shoppings_success'))
                                    <div class="alert alert-success">
                                        {{session('shoppings_success')}}
                                    </div>
                                @endif
                                <form action="{{route('add.shopping')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Country Name</label>
                                        <select name="country_id" class=" @error('country_id') is-invalid @enderror js-example-placeholder-single js-states form-control">
                                            <option value="">Select a Country name</option>
                                            @forelse ($country_all as $country )
                                                <option value="{{$country->id}}">{{$country->name}} {{$country->code}}</option>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="50" class="text-danger">No data to show</td>
                                                </tr>
                                            @endforelse
                                        </select>
                                        @error('country_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>City Name</label>
                                        <input type="text" name="city_name" class="form-control @error('city_name') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('city_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Shopping Charge</label>
                                        <input type="number" name="shopping_charge" class="form-control @error('shopping_charge') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('shopping_charge')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    {{-- shopping chart add code use here --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                <h2>Shopping Chart</h2>
                            </div>
                            <div class="card-body table-responsive">
                                @if (session('shopping_delete_message'))
                                    <div class="alert alert-danger">
                                        {{session('shopping_delete_message')}}
                                    </div>
                                @endif
                                <table id="shopping_charge_table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Country Name</th>
                                            <th>City Name</th>
                                            <th>Shopping Charge</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($shopping_all as $shopping )
                                            <tr>
                                                <td>{{$shopping->relationTocountry->name}} {{$shopping->relationTocountry->code}}</td>
                                                <td>{{$shopping->city_name}}</td>
                                                <td>{{$shopping->shopping_charge}}</td>
                                                <td>
                                                    <a href="{{route('shopping.remove',$shopping->id)}}" class="text-danger"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-danger text-center">
                                                <td colspan="50">No data to show</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-script-content')
    <script>
        // dataTables -plugin code start here
        $(document).ready( function () {
            $('#shopping_charge_table').DataTable();
        });
        // dataTables -plugin code end here
        // select2 code start here
        $(".js-example-placeholder-single").select2({
            placeholder: "Select a Country name",
            allowClear: true,
        });
        // select2 code end here
    </script>
@endsection
