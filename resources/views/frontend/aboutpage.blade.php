@extends('frontend.master')
@section('page_title','About')
@section('content')
 <!-- Page Header-->
 <header class="masthead" style="background-image: url('{{ asset('frontend_assets/assets/img/about-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>ABOUT US</h1>
                </div>
            </div>
        </div>
    </div>
</header>
 <!-- Main Content-->
 <main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($pages as $page)
                   <p>{{ $page ->discription}}</p>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection
