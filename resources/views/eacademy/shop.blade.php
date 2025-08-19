@extends('layouts.master')
@section('title', 'Shop')
@section( 'content')



    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{ asset('backend/images/page-banner-5.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Shop</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== SHOP PART START ======-->

    <section id="shop-page" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-top-search">
                        <div class="shop-bar">
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="shop-grid-tab" data-toggle="tab" href="#shop-grid" role="tab" aria-controls="shop-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a id="shop-list-tab" data-toggle="tab" href="#shop-list" role="tab" aria-controls="shop-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                                </li>
                                <li class="nav-item">Showning 4 0f 24 Results</li>
                            </ul> <!-- nav -->
                        </div><!-- shop bar -->
                        <div class="shop-select">
                           <select>
                                <option value="1">Sort by</option>
                                <option value="1">Sort by 01</option>
                                <option value="2">Sort by 02</option>
                                <option value="3">Sort by 03</option>
                                <option value="4">Sort by 04</option>
                                <option value="5">Sort by 05</option>
                            </select>
                        </div> <!-- shop select -->
                    </div> <!-- shop top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="shop-grid" role="tabpanel" aria-labelledby="shop-grid-tab">
                    <div class="row justify-content-center">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-8">
                                <div class="singel-publication mt-30">
                                    <div class="image">
                                        <img src="{{ asset('products/' . $product->image) }}" alt="Publication">
                                        <div class="add-cart">
                                            <ul>
                                                <li><a href="{{ route('eacademy.cart') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <div class="name">
                                            <a href="{{ route('eacademy.shop-single', $product) }}"><h6>{{ $product->title }}</h6></a>
                                            <span>${{ $product->price }}</span>
                                        </div>
                                        <div class="button text-right">
                                            <a href="{{ route('eacademy.cart.add', $product) }}" class="main-btn">Buy Now</a>
                                        </div>
                                    </div>
                                </div> <!-- singel publication -->
                            </div>

                        @endforeach
                        {{ $products->links() }}

                    </div> <!-- row -->
                </div>
                <div class="tab-pane fade" id="shop-list" role="tabpanel" aria-labelledby="shop-list-tab">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-6">
                            <div class="singel-publication mt-30">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="image">
                                            <img src="{{ asset('products/'. $product->image) }}" alt="Publication">
                                            <div class="add-cart">
                                                <ul>
                                                    <li><a href="{{ route('eacademy.cart') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="cont">
                                            <div class="name">
                                                <a href="{{ route('eacademy.shop-single', $product) }}"><h6>{{ $product->title }}</h6></a>
                                                <span>${{ $product->price }}</span>
                                            </div>
                                            <div class="description pt-10">
                                                <p>{{ $product->description }}</p>
                                            </div>
                                            <div class="button">
                                                <a href="{{ route('eacademy.cart') }}" class="main-btn">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- row -->
                            </div> <!-- singel publication -->
                        </div>
                        @endforeach

                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
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
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES PART ENDS ======-->




@endsection
