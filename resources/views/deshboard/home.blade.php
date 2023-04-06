@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Dashboard Home
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="fa fa-delicious" aria-hidden="true"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Category</p>
                            <h3 class="text-white">{{$total_category}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">User</p>
                            <h3 class="text-white">{{$total_user}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-calendar-1"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Sale</p>
                            <h3 class="text-white">{{$order_summaries->where('order_status','delivered')->sum('grand_total')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-red">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-calendar-1"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Due</p>
                            <h3 class="text-white">{{$order_summaries->where('order_status','!=','delivered')->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-warning">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-calendar-1"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Order</p>
                            <h3 class="text-white">{{$order_summaries->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-secondary">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-calendar-1"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Processing</p>
                            <h3 class="text-white">{{$order_summaries->where('order_status','processing')->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-info">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-calendar-1"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">On the way</p>
                            <h3 class="text-white">{{$order_summaries->where('order_status','on the way')->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-blue">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-calendar-1"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Delivered</p>
                            <h3 class="text-white">{{$order_summaries->where('order_status','delivered')->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Chart</h4>
            </div>
            <div class="card-body">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-script-content')
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Order','Processing', 'On the way', 'Delivered'],
            datasets: [{
                label: '# of Votes',
                data: [{{$order_summaries->count()}},{{$order_summaries->where('order_status','processing')->count()}}, {{$order_summaries->where('order_status','on the way')->count()}}, {{$order_summaries->where('order_status','delivered')->count()}} ],
                backgroundColor: [
                    '#FFBC11',
                    '#6f42c1',
                    '#1EA7C5',
                    '#5e72e4',
                ],
                borderColor: [
                    '#FFBC11',
                    '#6f42c1',
                    '#1EA7C5',
                    '#5e72e4',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
