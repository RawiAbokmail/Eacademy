@extends('layouts.master')
@section('title', 'Checkout')
@section( 'content')



<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <!--== Checkout Page Content Area ==-->
        <div class="row">
            <div class="col-12">
                <!-- Checkout Login Coupon Accordion Start -->
                <div class="checkoutaccordion" id="checkOutAccordion">
                    <div class="card">
                        <h3>Returning Customer? <span data-toggle="collapse" data-target="#logInaccordion">Click Here To Login</span>
                        </h3>

                        <div id="logInaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If
                                    you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <div class="login-reg-form-wrap">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <input type="email" placeholder="Enter your Email" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <input type="password" placeholder="Enter your Password" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                <div class="remember-meta">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="rememberMe">
                                                        <label class="custom-control-label" for="rememberMe">Remember
                                                            Me</label>
                                                    </div>
                                                </div>

                                                <a href="#" class="forget-pwd">Forget Password?</a>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <button class="btn-login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h3>Have A Coupon? <span data-toggle="collapse" data-target="#couponaccordion">Click Here To Enter Your Code</span>
                        </h3>
                        <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <div class="cart-update-option">
                                    <div class="apply-coupon-wrapper">
                                        <form action="#" method="post" class=" d-block d-md-flex">
                                            <input type="text" placeholder="Enter Your Coupon Code"/>
                                            <button class="btn-add-to-cart">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout Login Coupon Accordion End -->
            </div>
        </div>

       <form action="{{ route('eacademy.checkout.process') }}" method="POST">
        @csrf
         <div class="row">
            <!-- Checkout Billing Details -->
            <div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                        <div >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">First Name</label>
                                        <input name="first_name" type="text" id="f_name" placeholder="First Name"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">Last Name</label>
                                        <input name="last_name" type="text" id="l_name" placeholder="Last Name"/>
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <label for="email" class="required">Email Address</label>
                                <input name="email" type="email" id="email" placeholder="Email Address"/>
                            </div>

                            <div class="single-input-item">
                                <label for="com-name">Company Name</label>
                                <input name="company_name" type="text" id="com-name" placeholder="Company Name"/>
                            </div>

                            <div class="single-input-item">
                                <label for="country" class="required">Country</label>
                                <select name="country" name="country" id="country">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="England">England</option>
                                    <option value="London">London</option>
                                    <option value="London">London</option>
                                    <option value="Chaina">Chaina</option>
                                </select>
                            </div>

                            <div class="single-input-item">
                                <label for="street-address" class="required">Street address</label>
                                <input name="street_address1" type="text" id="street-address" placeholder="Street address Line 1"/>
                            </div>

                            <div class="single-input-item">
                                <input name="street_address2" type="text" placeholder="Street address Line 2 (Optional)"/>
                            </div>

                            <div class="single-input-item">
                                <label for="town" class="required">Town / City</label>
                                <input name="town" type="text" id="town" placeholder="Town / City"/>
                            </div>

                            <div class="single-input-item">
                                <label for="state">State / Divition</label>
                                <input name="state" type="text" id="state" placeholder="State / Divition"/>
                            </div>

                            <div class="single-input-item">
                                <label for="postcode" class="required">Postcode / ZIP</label>
                                <input name="postcode" type="text" id="postcode" placeholder="Postcode / ZIP"/>
                            </div>

                            <div class="single-input-item">
                                <label for="phone">Phone</label>
                                <input name="phone" type="text" id="phone" placeholder="Phone"/>
                            </div>

                            {{-- <div class="checkout-box-wrap">
                                <div class="single-input-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="create_pwd">
                                        <label class="custom-control-label" for="create_pwd">Create an account?</label>
                                    </div>
                                </div>
                                <div class="account-create single-form-row">
                                    <p>Create an account by entering the information below. If you are a returning
                                        customer please login at the top of the page.</p>
                                    <div class="single-input-item">
                                        <label for="pwd" class="required">Account Password</label>
                                        <input type="password" id="pwd" placeholder="Account Password"/>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="checkout-box-wrap">
                                <div class="single-input-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                        <label class="custom-control-label" for="ship_to_different">Ship to a different
                                            address?</label>
                                    </div>
                                </div>
                                <div class="ship-to-different single-form-row">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name_2" class="required">First Name</label>
                                                <input type="text" id="f_name_2" placeholder="First Name"/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name_2" class="required">Last Name</label>
                                                <input type="text" id="l_name_2" placeholder="Last Name"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email_2" class="required">Email Address</label>
                                        <input type="email" id="email_2" placeholder="Email Address"/>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="com-name_2">Company Name</label>
                                        <input type="text" id="com-name_2" placeholder="Company Name"/>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="country_2" class="required">Country</label>
                                        <select id="country_2">
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="London">London</option>
                                            <option value="Chaina">Chaina</option>
                                        </select>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="street-address_2" class="required">Street address</label>
                                        <input type="text" id="street-address_2" placeholder="Street address Line 1"/>
                                    </div>

                                    <div class="single-input-item">
                                        <input type="text" placeholder="Street address Line 2 (Optional)"/>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="town_2" class="required">Town / City</label>
                                        <input type="text" id="town_2" placeholder="Town / City"/>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state_2">State / Divition</label>
                                        <input type="text" id="state_2" placeholder="State / Divition"/>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="postcode_2" class="required">Postcode / ZIP</label>
                                        <input type="text" id="postcode_2" placeholder="Postcode / ZIP"/>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="single-input-item">
                                <label for="order_note">Order Note</label>
                                <textarea name="order_note" id="order_note" cols="30" rows="3"
                                          placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Details -->
             <div class="col-lg-6 mt-5 mt-lg-0">
                    <h2>Your Order Summary</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Products</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td>{{ data_get($item, 'title') }} <strong> × {{ data_get($item, 'quantity') }}</strong></td>
                                <td>${{ $item['price'] * $item['quantity'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Total Amount</td>
                            <td><strong>${{ $total }}</strong></td>
                        </tr>
                        </tfoot>
                    </table>

                    <!-- اختيار طريقة الدفع -->
                    <label>
                        <input type="radio" name="payment_method" value="cash" checked> Cash On Delivery
                    </label>
                    <label>
                        <input type="radio" name="payment_method" value="paypal"> PayPal
                    </label>

                    <!-- الشروط -->
                    <div class="custom-control custom-checkbox mt-3">
                        <input type="checkbox" class="custom-control-input" id="terms" required>
                        <label class="custom-control-label" for="terms">
                            I have read and agree to the website <a href="#">terms and conditions</a>.
                        </label>
                    </div>

                    <!-- زر إتمام الطلب -->
                    <button type="submit" class="btn btn-primary mt-3">Place Order</button>
                </div>
        </div>
        <button class="btn btn-success p-3">Complete Order</button>
       </form>
        <!--== Checkout Page Content End ==-->
    </div>
</div>
<!--== Page Content Wrapper End ==-->



@endsection
