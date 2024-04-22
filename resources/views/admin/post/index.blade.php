@extends('admin.master')
@section('page_title','PostIndex')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <h2>Post Table</h2>
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('add.post') }}">Add</a>
        </div>
       {{-- <button><p class="success" href="{{ route('add.post') }}">Add Post</button>
        </p> --}}
        <table class="table table-striped">
          <thead>
            <tr>
              <th><b> S.NO.</b></th>
              <th><b> Image</b></th>
              <th><b> Title</b></th>
              {{-- <th><b> Short_Discr</b></th> --}}
              <th><b> Post_Date</b></th>
              <th><b> Action </b></th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $key=> $post)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td><img width="170" height="170" src="{{ asset('storage/post/' . $post->image) }}" alt=""></td>

              <td>{{ $post->title }}</td>
              {{-- <td>{{ $post->short_discr }}</td> --}}
              <td>{{ $post->post_date }}</td>
              <td>
                <a href="{{ route('edit.post', $post->id) }}" class="badge badge-info">Edit</label>
                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('delete.post', $post->id) }}" class="badge badge-danger">Delete</a>

              </td>
            </tr>
            @endforeach
           </tbody>
        </table>
      </div>
    </div>
@endsection

