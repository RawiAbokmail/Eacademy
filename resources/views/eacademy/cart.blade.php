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
                            @foreach($cart as $id => $item)
                            <tr>

                                <td class="pro-thumbnail"><img src="{{ asset('products/' . $item['image']) }}" width="100" alt="Product"></td>
                                <td class="pro-title">{{ data_get($item, 'title') }}</td>
                                {{-- <td class="pro-title">{{ $item['title'] }}</td> --}}
                                <td class="pro-price">${{ $item['price'] }}</td>
                                <td class="pro-quantity">
                                    <input type="number" value="{{ $item['quantity'] }}" min="1">
                                </td>
                                <td class="pro-subtotal">${{ $item['price'] * $item['quantity'] }}</td>
                                <td class="pro-remove"><a href="{{ route('eacademy.cart.remove', $id) }}"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            @endforeach
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
                            @php
                                $cart = session('cart', []);
                                $subTotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
                                $shipping = $subTotal > 0 ? 70 : 0; // إذا السلة فارغة، الشحن 0
                                $total = $subTotal + $shipping;
                            @endphp

                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">Cart Totals</th>
                            </tr>
                            <tr>
                                <td>Sub Total</td>
                                <td>${{ number_format($subTotal, 2) }}</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>${{ number_format($shipping, 2) }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="total-amount">${{ number_format($total, 2) }}</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <form action="{{ route('eacademy.checkout') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn-add-to-cart">Proceed To Checkout</button>
                </form>

                </div>
            </div>
        </div>
        <!-- Cart Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->




@endsection
