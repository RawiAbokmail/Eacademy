@extends('layouts.master')
@section('title', 'Blogs')
@section( 'content')


@section('css')
<style>
    .singel-blog .blog-thum img {
    width: 100%;
    max-height: 300px;
}
</style>
@endsection

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{ asset('backend/images/page-banner-4.jpg)') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
               <div class="col-lg-8">
                   @foreach($blogs as $blog)
                    <div class="singel-blog mt-30">
                       <div class="blog-thum">
                           <img src="{{ asset('uploads/'. $blog->image) }}" alt="Blog">
                       </div>
                       <div class="blog-cont">
                           <a href="{{ route('eacademy.blog-single', $blog) }}"><h3>{{ $blog->title }}</h3></a>
                           <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</a></li>
                               <li><a href="#"><i class="fa fa-user"></i>Mark anthem</a></li>
                               <li><a href="#"><i class="fa fa-tags"></i>@foreach ($blog->tags as $tag)
                                <span class="badge">{{ $tag->name }}</span>
                                @endforeach</a></li>
                           </ul>
                           <p>{{ $blog->content }}</p>
                       </div>
                   </div> <!-- singel blog -->
                   @endforeach
                    {{ $blogs->appends($_GET)->links()}}

                   {{-- <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-lg-end justify-content-center">

                            <li class="page-item">
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            <li class="page-item"><a href="#">3</a></li>
                            <li class="page-item">
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>  <!-- courses pagination --> --}}
               </div>
               <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row">
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-search mt-30">
                                   <form action="{{ route('eacademy.blogs') }}" method="GET">
                                       <input type="text" name="search" value="{{ request('search') }}" placeholder="Search">
                                       <button type="submit"><i class="fa fa-search"></i></button>
                                   </form>
                               </div> <!-- saidbar search -->
                               <div class="categories mt-30">
                                   <h4>Categories</h4>
                                   <ul>
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('eacademy.blogs', ['category' =>          $category->slug]) }}" class="d-block mb-2">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                   </ul>
                               </div>
                           </div> <!-- categories -->
                       </div> <!-- row -->
                   </div> <!-- saidbar -->
               </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== BLOG PART ENDS ======-->



@endsection
