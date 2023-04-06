@extends('layouts.dashboard_master');

@section('dashboard_bar')
    Orders
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- order use here --}}
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Orders list</h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('coupon_delete_message'))
                            <div class="alert alert-danger">
                                {{session('coupon_delete_message')}}
                            </div>
                        @endif
                        @if (session('order_delete'))
                            <div class="alert alert-danger">
                                {{session('order_delete')}}
                            </div>
                        @endif
                        <table id="orders_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Grand Total</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Payment Method</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order_summaries as $order_summary )
                                    <tr>
                                        <td>{{$order_summary->id}}</td>
                                        <td>{{$order_summary->customer_name}}</td>
                                        <td>{{$order_summary->grand_total}}</td>
                                        <td>{{$order_summary->payment_status}}</td>
                                        <td>{{$order_summary->order_status}}</td>
                                        <td>{{$order_summary->payment_method}}</td>
                                        <td>{{$order_summary->created_at->diffforhumans()}}</td>
                                        <td>
                                            <form action="{{route('order.status.change',$order_summary->id)}}" method="POST">
                                                @csrf
                                                <select name="order_status" class="form-control" onchange="this.form.submit()">
                                                    <option {{($order_summary->order_status == 'processing') ?'selected':'' }} value="processing">Processing</option>
                                                    <option {{($order_summary->order_status == 'on the way') ?'selected':'' }} value="on the way">On the way</option>
                                                    <option {{($order_summary->order_status == 'delivered') ?'selected':'' }} value="delivered">Delivered</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('delete.customer_order',$order_summary->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-square btn-xs">Delete</button>
                                            </form>
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
            $('#orders_table').DataTable();
        });
        // dataTables -plugin code end here
    </script>
@endsection
