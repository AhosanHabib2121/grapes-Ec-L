@extends('layouts.dashboard_master');

@section('dashboard_bar')
    Variation Manager
@endsection
@section('content')
    <div class="container">
        <div class="row">
            {{-- color variation code use here --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Color Add</h2>
                    </div>
                    <div class="card-body mb-5">
                        @if (session('success_color'))
                            <div class="alert alert-success">
                                {{session('success_color')}}
                            </div>
                        @endif
                        <form action="{{route('variation_color.post')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Color Name</label>
                                <input type="text" class=" @error('color_name') is-invalid @enderror form-control" name="color_name" style="border-color: rgba(38, 41, 83, 0.5);">
                                @error('color_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Color Code</label>
                                <input type="color" name="color_code" class="col-2 form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add Color</button>
                            </div>
                        </form>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header bg-secondary text-white">
                            <h2>Color List</h2>
                        </div>
                        <div class="card-body">
                            @if (session('delete_color_message'))
                                <div class="alert alert-danger">
                                    {{session('delete_color_message')}}
                                </div>
                            @endif
                            <table id="color_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($color_data as $color )
                                        <tr>
                                            <td>{{$color->color_name}}</td>
                                            <td>
                                                <span class="badge" style="background: {{$color->color_code}}">&nbsp;</span>
                                            </td>
                                            <td>
                                                <a href="{{route('color.delete',$color->id)}}" class="text-danger"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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
            {{-- size variation code use here --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2>Size Add</h2>
                    </div>
                    <div class="card-body mb-5">
                        @if (session('success_size'))
                            <div class="alert alert-success">
                                {{session('success_size')}}
                            </div>
                        @endif
                        <form action="{{route('variation_size.post')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Size Name</label>
                                <input type="text" class=" @error('size_name') is-invalid @enderror form-control" name="size_name" style="border-color: rgba(38, 41, 83, 0.5);">
                                @error('size_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add size</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h2>Size List</h2>
                        </div>
                        <div class="card-body" >
                            @if (session('delete_size_message'))
                                <div class="alert alert-danger">
                                    {{session('delete_size_message')}}
                                </div>
                            @endif
                            <table id="size_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Size Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($size_data as $size )
                                        <tr>
                                            <td>{{$size->size_name}}</td>
                                            <td>
                                                <a href="{{route('size.delete',$size->id)}}" class="text-danger"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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
@endsection
@section('js-script-content')
    {{-- dataTables -plugin code start here --}}
        <script>
            $(document).ready( function () {
                $('#size_table').DataTable();
            } );
            $(document).ready( function () {
                $('#color_table').DataTable();
            } );
        </script>
    {{-- dataTables -plugin code end here --}}
@endsection
