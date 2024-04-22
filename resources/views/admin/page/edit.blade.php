@include('admin.layouts.css')
@section('page_title','PageEdit')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
       <div class="card-body">
        <div class="pull-right mb-2">
            <h2>Edit User </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('index.page') }}">Back</a>
        </div><br><br>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form class="forms-sample" action="{{ route('update.page',$page->id) }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <Strong for="exampleInputName3">Name</Strong>
            <input type="text" name="name" class="form-control" value="{{$page->name}}" id="exampleInputName3" placeholder="Name">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>
          <div class="form-group">
            <strong for="exampleInputSlug4">Slug</strong>
            <input type="text" name="slug"class="form-control" value="{{$page->slug}}" id="exampleInputSlug4" placeholder="Slug">
            @if ($errors->has('slug'))
                <span class="text-danger">{{ $errors->first('slug') }}</span>
            @endif
        </div>
        <div class="form-group">
            <strong for="exampleDiscription1">Discription</strong>
            <input type="text" class="form-control" name="discription"  id="exampleDiscription1" value="{{$page->discription}}">
            @if ($errors->has('discription'))
                <span class="text-danger">{{ $errors->first('discription') }}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
  @include('admin.layouts.footer')
