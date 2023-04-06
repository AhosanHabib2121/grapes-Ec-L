@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2>Blog Member Add</h2>
                </div>
                <div class="card-body">
                    @if (session('success_message'))
                        <div class="alert alert-success">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form action="{{route('nameInsert')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Member Name Add</label>
                            <input type="text" class="form-control" name="blog_member_name" placeholder="Enter blog member">
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
