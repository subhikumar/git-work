@include('admin.layouts.css')
@section('page_title','ContactEdit')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
       <div class="card-body">
        <div class="pull-right mb-2">
            <h2>Edit User Contact </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('index.contact') }}">Back</a>
        </div><br><br>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form class="forms-sample" action="{{ route('update.contact',$contact->id) }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <Strong for="exampleInputUsername3">Name</Strong>
            <input type="text" name="user_name" class="form-control" value="{{$contact->user_name}}" id="exampleInputUsername3" placeholder="Username">
            @if ($errors->has('user_name'))
                <span class="text-danger">{{ $errors->first('user_name') }}</span>
            @endif
          </div>
          <div class="form-group">
            <strong for="exampleInputEmail4">Email</strong>
            <input type="text" name="email"class="form-control" value="{{$contact->email}}" id="exampleInputEmail4" placeholder="Email">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="form-group">
            <strong for="exampleMobile1">Mobile</strong>
            <input type="text" class="form-control" name="mobile"  id="exampleMobile1" value="{{$contact->mobile}}" placeholder="Mobile">
            @if ($errors->has('mobile'))
                <span class="text-danger">{{ $errors->first('mobile') }}</span>
            @endif
          </div>
          <div class="form-group">
            <strong for="exampleMessage1">Message</strong>
            <textarea class="form-control" name="message" id="exampleMessage1" rows="4">{{$contact->message}}</textarea>
            @if ($errors->has('message'))
                <span class="text-danger">{{ $errors->first('message') }}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
  @include('admin.layouts.footer')
