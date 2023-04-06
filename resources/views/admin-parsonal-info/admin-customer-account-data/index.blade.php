@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Account Details(admin & customer)
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>User Account Details</h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                        <table id="account_detail_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_account_data_all as $user_account_data)
                                    <tr>
                                        <td>{{$user_account_data->name}}</td>
                                        <td>{{$user_account_data->email}}</td>
                                        <td>{{$user_account_data->phone_number}}</td>
                                        <td>{{$user_account_data->role}}</td>
                                        <td class="d-flex">
                                            <form action="{{route('account.delete',$user_account_data->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-square btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
            //account_detail_table code use here
            $(document).ready( function () {
                $('#account_detail_table').DataTable();
            } );
            //deleted_account_detail_table code use here
            $(document).ready( function () {
                $('#deleted_account_detail_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection


