@extends('layouts.dashboard_master')

@section('dashboard_bar')
    Create Subcategory
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Create Subcategory</h2>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif

                        <form action="{{route('subcategory.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select id="category_dropdown" name="category_id" class="@error('category_id') is-invalid @enderror form-control">
                                            <option></option>
                                            @foreach ($category_info as $single_category)
                                                <option value="{{$single_category->id}}">{{$single_category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subcategory Name</label>
                                        <input type="text" class=" @error('subcategory_name') is-invalid @enderror form-control" name="subcategory_name">
                                        @error('subcategory_name')
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
    </div>
@endsection
@section('js-script-content')
    {{-- select2-plugin code start here --}}
    <script>
        $("#category_dropdown").select2({
            placeholder: "Select a category",
            allowClear: true
        });
    </script>
    {{-- select2-plugin code end here --}}
@endsection

