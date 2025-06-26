@extends('layouts.master')
@section('title', 'Cart')
@section( 'content')


<br>
   <br>
<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <!-- Cart Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive ">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Thumbnail</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-subtotal">Total</th>
                            <th class="pro-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="pro-thumbnail"><a href="#">
                                <img class="img-fluid" src="{{ asset('backend/images/publication/p-1.jpg') }}"
                                width="100" alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Zeon Zen 4 Pro</a></td>
                            <td class="pro-price"><span>$295.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="1"></div>
                            </td>
                            <td class="pro-subtotal"><span>$295.00</span></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#">
                                <img class="img-fluid" src="{{ asset('backend/images/publication/p-2.jpg') }}"
                                width="100" alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Aquet Drone D 420</a></td>
                            <td class="pro-price"><span>$275.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="2"></div>
                            </td>
                            <td class="pro-subtotal"><span>$550.00</span></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#">
                            <img class="img-fluid" src="{{ asset('backend/images/publication/p-3.jpg') }}"
                                width="100" alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Game Station X 22</a></td>
                            <td class="pro-price"><span>$295.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="1"></div>
                            </td>
                            <td class="pro-subtotal"><span>$295.00</span></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#">
                            <img class="img-fluid" src="{{ asset('backend/images/publication/p-4.jpg') }}"
                                width="100" alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Roxxe Headphone Z 75 </a></td>
                            <td class="pro-price"><span>$110.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="1"></div>
                            </td>
                            <td class="pro-subtotal"><span>$110.00</span></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-lg-flex">
                    <div class="apply-coupon-wrapper">
                        <form action="#" method="post" class=" d-block d-md-flex">
                            <input type="text" placeholder="Enter Your Coupon Code"/>
                            <button class="btn-add-to-cart">Apply Coupon</button>
                        </form>
                    </div>
                    <div class="cart-update">
                        <a href="#" class="btn-add-to-cart">Update Cart</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2">Cart Totals</th>
                                </tr>
                                <tr>
                                    <td>Sub Total</td>
                                    <td>$230</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>$70</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="total-amount">$300</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="checkout.php" class="btn-add-to-cart">Proceed To Checkout</a>
                </div>
            </div>
        </div>
        <!-- Cart Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->




@endsection
