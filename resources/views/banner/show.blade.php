@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Details
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white text-center">
                        <h2>Details</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td scope="row">Category Name</td>
                                    <td>{{$category->category_name}}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Create by</td>
                                    <td>{{App\Models\user::find($category->create_by)->name}}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Create at Date & Time</td>
                                    <td>
                                        {{$category->created_at->format('d/m/Y h:i:m')}}
                                        @if ($category->created_at->diffinseconds() < 60)
                                                <p class="badge bg-dark badge-sm text-white">Just now</p>
                                            @else
                                                <div class="badge bg-dark badge-sm text-white">{{$category->created_at->diffforhumans()}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Updated by</td>
                                    <td>
                                        @if ($category->updated_by)
                                            {{App\Models\user::find($category->updated_by)->name}}
                                            @else
                                                <p class="badge bg-dark text-white">Not updated yet</p>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Last Update At</td>
                                    <td>
                                        @if ($category->updated_at)
                                                @if ($category->updated_at->diffinseconds() < 60)
                                                    <p class="badge bg-dark text-white">Just now</p>
                                                    @else
                                                    <div class="badge bg-dark text-white">{{$category->updated_at->diffforhumans()}}</div>
                                                @endif
                                             @else
                                                <p class="badge bg-dark text-white">Not updated yet</p>
                                        @endif

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="{{url()->previous()}}" class="btn btn-info text-white btn-sm">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
