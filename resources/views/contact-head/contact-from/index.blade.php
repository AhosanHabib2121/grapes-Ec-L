@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Contact From Data
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <h2>Data List </h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                        <table id="contact_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact_from_data as $contact_from )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$contact_from->name}}</td>
                                        <td>{{$contact_from->email}}</td>
                                        <td>{{$contact_from->message}}</td>
                                        <td>
                                            <form action="{{route('contact_from.delete',$contact_from->id)}}" method="POST">
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
            //contact_table code use here
            $(document).ready( function () {
                $('#contact_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection


