@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header text-center">
                <h2>Blog Member List</h2>
            </div>

            <div class="card-body">
                @if (session('delete_message'))
                    <div class="alert alert-danger">
                        {{session('delete_message')}}
                    </div>
                @endif
              <table class="table table-bordered">
                  <thead class="thead-inverse">
                      <tr>
                          <th>Serial No</th>
                          <th>Bloge member names</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($blog_names as $single_names )
                       <tr>
                            <td>{{ $loop->index +1}}</td>
                            <td>{{ $single_names->blog_member}}</td>
                            <td>
                                <a href="{{route('blogMemberDelete',$single_names->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                <a href="{{route('blogMemberEditpage',Crypt::encrypt($single_names->id))}}" class="btn btn-sm btn-success">Edit</a>
                            </td>
                       </tr>
                      @endforeach

                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
