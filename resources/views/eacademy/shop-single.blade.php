@extends('layouts.master')
@section('title', 'Shop Single')
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

    <section id="shop-singel" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="shop-destails">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shop-left pt-30">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-image-1" role="tabpanel" aria-labelledby="pills-image-1-tab">
                                    <div class="shop-image">
                                        <a href="images/shop-singel/ss-1.jpg" class="shop-items"><img src="{{ asset('backend/images/shop-singel/ss-1.jpg') }}" alt="Shop"></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-image-2" role="tabpanel" aria-labelledby="pills-image-2-tab">
                                    <div class="shop-image">
                                        <a href="images/shop-singel/ss-2.jpg" class="shop-items"><img src="{{ asset('backend/images/shop-singel/ss-2.jpg') }}" alt="Shop"></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-image-3" role="tabpanel" aria-labelledby="pills-image-3-tab">
                                    <div class="shop-image">
                                        <a href="images/shop-singel/ss-3.jpg" class="shop-items"><img src="{{ asset('backend/images/shop-singel/ss-3.jpg') }}" alt="Shop"></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-image-4" role="tabpanel" aria-labelledby="pills-image-4-tab">
                                    <div class="shop-image">
                                        <a href="images/shop-singel/ss-1.jpg" class="shop-items"><img src="{{ asset('backend/images/shop-singel/ss-1.jpg') }}" alt="Shop"></a>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-justified mt-30" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="pills-image-1-tab" data-toggle="pill" href="#pills-image-1" role="tab" aria-controls="pills-image-1" aria-selected="true">
                                        <span class="shop-thum">
                                            <img src="{{ asset('backend/images/shop-singel/ss-s1.jpg') }}" alt="Thum">
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="pills-image-2-tab" data-toggle="pill" href="#pills-image-2" role="tab" aria-controls="pills-image-2" aria-selected="false">
                                        <span class="shop-thum">
                                            <img src="{{ asset('backend/images/shop-singel/ss-s2.jpg') }}" alt="Thum">
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="pills-image-3-tab" data-toggle="pill" href="#pills-image-3" role="tab" aria-controls="pills-image-1" aria-selected="false">
                                        <span class="shop-thum">
                                            <img src="{{ asset('backend/images/shop-singel/ss-s3.jpg') }}" alt="Thum">
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="pills-image-4-tab" data-toggle="pill" href="#pills-image-4" role="tab" aria-controls="pills-image-4" aria-selected="false">
                                        <span class="shop-thum">
                                            <img src="{{ asset('backend/images/shop-singel/ss-s1.jpg') }}" alt="Thum">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div> <!-- shop left -->
                    </div>
                    <div class="col-lg-6">
                        <div class="shop-right pt-30">
                            <h6>Big Pen </h6>
                            <span>$50.00</span>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                            <div class="nice-number pt-15">
                                <input type="number" value="1">
                            </div>
                            <div class="add-btn pt-15">
                                <a href="cart.php"><button type="button"
                                class="main-btn">Add to Cart</button></a>
                            </div>
                        </div>
                    </div>
                </div>  <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-reviews mt-60">
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                </li>
                            </ul> <!-- nav -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="description-cont pt-40">
                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                    </div>
                                </div> <!-- row -->
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="reviews-cont">
                                        <ul>
                                           <li>
                                               <div class="singel-reviews">
                                                    <div class="reviews-author">
                                                        <div class="author-thum">
                                                            <img src="{{ asset('backend/images/review/r-1.jpg') }}" alt="Reviews">
                                                        </div>
                                                        <div class="author-name">
                                                            <h6>Bobby Aktar</h6>
                                                            <span>April 03, 2019</span>
                                                        </div>
                                                    </div>
                                                    <div class="reviews-description pt-20">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                        <div class="rating">
                                                            <ul>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                            </ul>
                                                            <span>/ 5 Star</span>
                                                        </div>
                                                    </div>
                                                </div> <!-- singel reviews -->
                                           </li>
                                           <li>
                                               <div class="singel-reviews">
                                                    <div class="reviews-author">
                                                        <div class="author-thum">
                                                            <img src="{{ asset('backend/images/review/r-2.jpg') }}" alt="Reviews">
                                                        </div>
                                                        <div class="author-name">
                                                            <h6>Humayun Ahmed</h6>
                                                            <span>April 13, 2019</span>
                                                        </div>
                                                    </div>
                                                    <div class="reviews-description pt-20">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                        <div class="rating">
                                                            <ul>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                            </ul>
                                                            <span>/ 5 Star</span>
                                                        </div>
                                                    </div>
                                                </div> <!-- singel reviews -->
                                           </li>
                                        </ul>
                                        <div class="reviews-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" placeholder="Fast name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <div class="rate-wrapper">
                                                                <div class="rate-label">Your Rating:</div>
                                                                <div class="rate">
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <textarea placeholder="Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <button type="button" class="main-btn">Post Comment</button>
                                                        </div>
                                                    </div>
                                                </div> <!-- row -->
                                            </form>
                                        </div> <!-- reviews form -->
                                    </div>
                                </div> <!-- row -->
                            </div> <!-- tab-content -->
                        </div> <!-- shop reviews -->
                    </div>
                </div> <!-- row -->
            </div> <!-- shop-destails -->
            <div class="releted-item pt-110">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title pb-10">
                            <h3>Releted products</h3>
                        </div>
                    </div>
                </div> <!-- row -->
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="singel-publication mt-30">
                            <div class="image">
                                <img src="{{ asset('backend/images/publication/p-1.jpg') }}" alt="Publication">
                                <div class="add-cart">
                                    <ul>
                                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="name">
                                    <a href="shop-singel.php"><h6>Set for life </h6></a>
                                    <span>$50.00</span>
                                </div>
                                <div class="button text-right">
                                    <a href="cart.php" class="main-btn">Buy Now</a>
                                </div>
                            </div>
                        </div> <!-- singel publication -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="singel-publication mt-30">
                            <div class="image">
                                <img src="{{ asset('backend/images/publication/p-2.jpg') }}" alt="Publication">
                                <div class="add-cart">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="name">
                                    <a href="shop-singel.php"><h6>Set for life </h6></a>
                                    <span>$50.00</span>
                                </div>
                                <div class="button text-right">
                                    <a href="cart.php" class="main-btn">Buy Now</a>
                                </div>
                            </div>
                        </div> <!-- singel publication -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="singel-publication mt-30">
                            <div class="image">
                                <img src="{{ asset('backend/images/publication/p-3.jpg') }}" alt="Publication">
                                <div class="add-cart">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="name">
                                    <a href="shop-singel.php"><h6>Set for life </h6></a>
                                    <span>$50.00</span>
                                </div>
                                <div class="button text-right">
                                    <a href="cart.php" class="main-btn">Buy Now</a>
                                </div>
                            </div>
                        </div> <!-- singel publication -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="singel-publication mt-30">
                            <div class="image">
                                <img src="{{ asset('backend/images/publication/p-4.jpg') }}" alt="Publication">
                                <div class="add-cart">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="name">
                                    <a href="shop-singel.php"><h6>Set for life </h6></a>
                                    <span>$50.00</span>
                                </div>
                                <div class="button text-right">
                                    <a href="cart.php" class="main-btn">Buy Now</a>
                                </div>
                            </div>
                        </div> <!-- singel publication -->
                    </div>
                </div>  <!-- row -->
            </div> <!-- releted item -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES PART ENDS ======-->



@endsection
