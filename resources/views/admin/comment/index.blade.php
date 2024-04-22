@extends('admin.master')
@section('page_title','PageIndex')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <h2>Comment Table</h2>
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        {{-- <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('add.page') }}">Add</a>
        </div> --}}

        <table class="table table-striped">
          <thead>
            <tr>
              <th><b>S.NO.</b></th>
              <th><b>Comment</b></th>
              <th><b>User</b></th>
              <th><b>Post</b></th>
              <th><b>Created</b></th>
              <th><b>Action</b></th>
            </tr>
          </thead>
          <tbody>
            @foreach($comments as $key=> $comment)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $comment->comment }}</td>
              <td>{{ $comment->user->name }}</td>
              <td>{{ $comment->post->title }}</a></td>
              <td>{{ $comment->created_at->diffForHumans() }}</td>
              <td>

                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('delete.comment', $comment->id) }}" class="badge badge-danger">Delete</a>
              </td>
            </tr>
            @endforeach
           </tbody>
        </table>
      </div>
    </div>
@endsection

