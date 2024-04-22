@extends('admin.master')
@section('page_title','ContactIndex')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <h2>Contact Table</h2>
      <div class="card-body">

        {{-- <div class="pull-left mb-2">
            <a class="btn btn-success" href="{{ route('dashboard') }}">Back</a>
        </div> --}}

        <table class="table table-striped">
          <thead>
            <tr>
              <th><b> S.NO. </b></th>
              <th><b> Name </b></th>
              <th><b> Email </b></th>
              <th><b> Mobile </b></th>
              {{-- <th><b> Message </b></th> --}}
              <th><b> Added_on </b></th>
              <th><b> Action </b></th>

            </tr>
          </thead>
          <tbody>
            @foreach($contacts as $key=> $contact)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $contact->user_name }}</td>
              <td>{{ $contact->email }}</td>
              <td>{{ $contact->mobile }}</td>
              {{-- <td>{{ $contact->message }}</td> --}}
              <td>{{ $contact->added_on }}</td>
              <td>
                <a href="{{ route('edit.contact', $contact->id) }}" class="badge badge-info">Edit</label>
                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('delete.contact', $contact->id) }}" class="badge badge-danger">Delete</a>
              </td>
            </tr>
            @endforeach
           </tbody>
        </table>
      </div>
    </div>
@endsection

