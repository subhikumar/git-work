@extends('frontend.master')
@section('page_title','Home')
@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image:url('{{asset('frontend_assets/assets/img/home-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Start Blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
            @foreach($homes as $home)
                <div class="post-preview">
                    <a href="{{ url('post/'.$home->slug) }}">
                        <h2 class="post-title">{{$home->title}}</h2>
                        <h3 class="post-subtitle">{{$home->short_discr}}</h3>
                    </a>
                    <p class="post-meta">
                    Posted on {{$home->post_date}}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4"/>
            @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
            </div>
        </div>
    </div>
@endsection
