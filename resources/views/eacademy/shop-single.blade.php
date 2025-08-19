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
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
                                        <a href="images/shop-singel/ss-1.jpg" class="shop-items"><img src="{{ asset('products/'. $product->image) }}" alt="Shop"></a>
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
                                @foreach ($product->gallery as $galleryImage)
                                <li class="nav-item">
                                    <a class="active" id="pills-image-1-tab" data-toggle="pill" href="#pills-image-1" role="tab" aria-controls="pills-image-1" aria-selected="true">
                                        <span class="shop-thum">
                                            <img src="{{ asset('products/' . $galleryImage->image) }}" class="img-thumbnail" alt="Gallery Image" style="width: 100%; height: auto;">
                                        </span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div> <!-- shop left -->
                    </div>
                    <div class="col-lg-6">
                        <div class="shop-right pt-30">
                            <h6>{{ $product->title }}</h6>
                            <span>${{ $product->price }}</span>
                            <p>{{ $product->description }}</p>
                            {{-- <div class="nice-number pt-15">
                                <input type="number" name="quantity-buy" value="1">
                            </div>
                            <div class="add-btn pt-15">
                                <a href="{{ route('eacademy.cart.add', $product) }}"><button type="button"
                                class="main-btn">Add to Cart</button></a>
                            </div> --}}

                            {{-- <form action="{{ route('eacademy.cart.add', $product) }}" method="POST">
                            @csrf
                            <div class="nice-number pt-15">
                                <input type="number" name="quantity" value="1" min="1">
                            </div>
                            <div class="add-btn pt-15">
                                <button type="submit" class="main-btn">Add to Cart</button>
                            </div>
                        </form> --}}

                       <div class="nice-number pt-15">
    <input type="number" id="quantityInput" value="1" min="1">
</div>
<div class="add-btn pt-15">
    <a id="addToCartBtn" href="{{ route('eacademy.cart.add', $product) }}">
        <button type="button" class="main-btn">Add to Cart</button>
    </a>
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
                                        <p>{{ $product->description }}</p>
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
                            <h3>Related products</h3>
                        </div>
                    </div>
                </div> <!-- row -->
                <div class="row justify-content-center">
                    @foreach ($relatedProducts as $related)
                        <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="singel-publication mt-30">
                            <div class="image">
                                <img src="{{ asset('products/' . $related->image) }}" alt="Publication">
                                <div class="add-cart">
                                    <ul>
                                        <li><a href="{{ route('eacademy.cart') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="name">
                                    <a href="shop-singel.php"><h6>{{ $related->title }}</h6></a>
                                    <span>${{ $related->price }}</span>
                                </div>
                                <div class="button text-right">
                                    <a href="{{ route('eacademy.cart') }}" class="main-btn">Buy Now</a>
                                </div>
                            </div>
                        </div> <!-- singel publication -->
                    </div>
                    @endforeach

                </div>  <!-- row -->
            </div> <!-- releted item -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES PART ENDS ======-->

@endsection

@section('js')

<script>
document.getElementById('addToCartBtn').addEventListener('click', function(e) {
    e.preventDefault();
    let qty = document.getElementById('quantityInput').value;
    let baseUrl = this.getAttribute('href');
    window.location.href = baseUrl + '?quantity=' + qty;
});
</script>

@endsection

