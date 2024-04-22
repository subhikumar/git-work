@extends('admin.master')
@section('page_title','PageIndex')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <h2>Page Table</h2>
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('add.page') }}">Add</a>
        </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th><b>S.NO.</b></th>
              <th><b> Name </b></th>
              <th><b> Slug </b></th>
              {{-- <th><b> Discription </b></th> --}}
              <th><b> Action </b></th>
            </tr>
          </thead>
          <tbody>
            @foreach($pages as $key=> $page)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $page->name }}</td>
              <td>{{ $page->slug }}</td>
              {{-- <td>{{ $page->discription }}</td> --}}
              <td>
                <a href="{{ route('edit.page', $page->id) }}" class="badge badge-info">Edit</label>
                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('delete.page', $page->id) }}" class="badge badge-danger">Delete</a>
              </td>
            </tr>
            @endforeach
           </tbody>
        </table>
      </div>
    </div>
@endsection

