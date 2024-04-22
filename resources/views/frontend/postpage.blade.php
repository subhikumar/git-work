@extends('frontend.master')
@section('content')
    <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{ asset('frontend_assets/assets/img/post-bg.jpg') }}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{$post->title}}</h1>
                            <h2 class="subheading">{{$post->short_discr}}</h2>
                            <span class="meta">
                                Posted on
                              {{$post->post_date}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        {{-- <p>{{ $post->long_discr }}</p> --}}
                        <h2 class="section-heading">{{ $post->long_discr}}</h2>

                        <a href="#!"><img class="img-fluid" src="{{ asset('storage/post/' . $post->image) }}" alt="..." /></a>
                    </div>
                </div>
            </div>
        </article>
        <!---start comment section area--->
        <section class="comment-sec-area pt-80 pb-80">
          <div class="container">
           <div class ="row flex-column">
            <h5 class ="text-uppercase pb-80">Comments</h5>
             </br>
             @foreach ($post->comments as $comment)
              <div class="comment-list">
                <div class="single comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">

                        <div class="desc">
                            <h5><a href="#">{{$comment->user->name}}</a></h5>
                            <p class="comment">{{$comment->comment}}</p>
                            <p class="date">{{$comment->created_at->format(' d M Y H:i')}}</p>

                        </div>
                        {{-- <div class="reply-btn">
                            <button><a href="" class="btn-reply text-uppercase">reply</a></button>
                        </div> --}}
                    </div>

                </div>
              </div>
             @endforeach
           </div>
          </div>
        </section>
        <!---end comment section area--->
         <!--- start comment form area --->
    <section class="comment form area pb-120 pt-80 nb-100">
        {{-- @guest
            <div class="container">
            <h4>Please log in to comment</h4>
            </div>
        @else --}}
        <div class="container">

            <h5 class="text-uppercas pb-50">Leave a Reply</h5>
            <div class="row flex-row d-flex">
                <div class="col-lg-12">
                    <form action="{{ route('store.comment',$post->id) }}" method="post">
                    @csrf

                        <textarea class="form-control mb-10" name="comment" placeholder="Message" onfocus ="this.placeholder = ''"
                            onblur="this.placeholder = 'Message'" required="">
                        </textarea><br>
                        <button type="submit" class="primary-btn mt-20" href="#">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- @endguest --}}
@endsection
