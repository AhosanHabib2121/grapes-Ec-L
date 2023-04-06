@extends('layouts.dashboard_master');

@section('dashboard_bar')
    Coupon Generate
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Coupon add code use here --}}
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Coupon Add</h2>
                    </div>
                    <div class="card-body">
                        @if (session('coupon_success'))
                            <div class="alert alert-success">
                                {{session('coupon_success')}}
                            </div>
                        @endif
                        <form action="{{route('coupon.insert')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Coupon Name</label>
                                        <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('coupon_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Coupon Validity Date</label>
                                        <input type="date" name="coupon_validity_date" class="form-control @error('coupon_validity_date') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('coupon_validity_date')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Coupon Type</label>
                                        <select name="coupon_type" class="form-control @error('coupon_type') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                            <option value="percentage">Percentage Discount</option>
                                            <option value="flat">Flat Discount</option>
                                        </select>
                                        @error('coupon_validity_date')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Coupon Amount</label>
                                        <input type="number" name="coupon_amount" class="form-control @error('coupon_amount') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('coupon_amount')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Minimum Order</label>
                                        <input type="number" name="minimum_order" class="form-control @error('minimum_order') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('minimum_order')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Coupon Limit</label>
                                        <input type="number" name="coupon_limit" class="form-control @error('coupon_limit') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                        @error('coupon_limit')
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
        </div>
        <div class="row">
            <div class="col-md-12">
                {{-- coupon chart use here --}}
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Coupon Chart</h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('coupon_delete_message'))
                            <div class="alert alert-danger">
                                {{session('coupon_delete_message')}}
                            </div>
                        @endif
                        <table id="coupon_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Coupon Name</th>
                                    <th>Coupon Calidity Date</th>
                                    <th>Coupon Type</th>
                                    <th>Coupon Amount</th>
                                    <th>Minimum Order</th>
                                    <th>Coupon Limit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coupon_data as $coupon )
                                    <tr>
                                        <td>{{$coupon->coupon_name}}</td>
                                        <td>{{$coupon->coupon_validity_date}}</td>
                                        <td>{{$coupon->coupon_type}}</td>
                                        <td>{{$coupon->coupon_amount}}</td>
                                        <td>{{$coupon->minimum_order}}</td>
                                        <td>{{$coupon->coupon_limit}}</td>
                                        <td>
                                            <a href="{{route('coupon.remove',$coupon->id)}}" class="text-danger"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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
@endsection
@section('js-script-content')
    <script>
        // dataTables -plugin code start here
        $(document).ready( function () {
            $('#coupon_table').DataTable();
        });
        // dataTables -plugin code end here
    </script>
@endsection
