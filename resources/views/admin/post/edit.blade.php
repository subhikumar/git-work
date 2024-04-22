@include('admin.layouts.css')
@section('page_title','PostEdit')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
       <div class="card-body">
        <div class="pull-right mb-2">
            <h2>Edit User </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('index.post') }}">Back</a>
        </div><br><br>


        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form class="forms-sample" action="{{ route('update.post',$post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <Strong for="exampleInputTitle3">Title</Strong>
            <input type="text" name="title" class="form-control" value="{{$post->title}}" id="exampleInputTitle3" placeholder="Title">
            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>
          <div class="form-group">
            <Strong for="exampleInputSlug3">Slug</Strong>
            <input type="text" name="slug" class="form-control" value="{{$post->slug}}" id="exampleInputSlug3" placeholder="Slug">
            @if ($errors->has('slug'))
                <span class="text-danger">{{ $errors->first('slug') }}</span>
            @endif
          </div>
          <div class="form-group">
            <strong for="exampleInputShort_Discr4">Short_Discr</strong>
            <input type="text" name="short_discr"class="form-control" value="{{$post->short_discr}}" id="exampleInputShort_Discr4" placeholder="Short_Discr">
            @if ($errors->has('short_discr'))
                <span class="text-danger">{{ $errors->first('short_discr') }}</span>
            @endif
        </div>


          <div class="form-group">
            <strong for="exampleInputPost_Date1">Post_Date</strong>
            <input type="date" name="post_date" class="form-control" value="{{$post->post_date}}" id="exampleInputPost_Date1" placeholder="Post_Date">
            @if ($errors->has('post_date'))
                <span class="text-danger">{{ $errors->first('post_date') }}</span>
            @endif
          </div>
          <div class="form-group">
            <strong for="exampleLong_Discr1">Long_Discr</strong>
            <textarea class="form-control" name="long_discr"  id="exampleLong_Discr1" rows="4">{{$post->long_discr}}</textarea>
            @if ($errors->has('long_discr'))
                <span class="text-danger">{{ $errors->first('long_discr') }}</span>
            @endif
          </div>
          <div class="form-group">
            <strong>Image</strong>
            <input type="file" name="image" class="file-upload-default">
            <img width="70" height="70" src="{{ asset('storage/post/' . $post->image) }}" alt="Image">
            <a href="{{ asset('storage/post/' . $post->image) }}" target="_blank">{{ $post->image ? basename($post->image) : '' }}</a>

            <div class="input-group col-xs-2">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
  @include('admin.layouts.footer')
