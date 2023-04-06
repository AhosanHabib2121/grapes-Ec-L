@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2>Blog Member Edit</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('blogMemberUpdate',$member_info->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Blog member name</label>
                            <input type="text" class="form-control" name="blog_member_name" value="{{$member_info->blog_member}}">
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
