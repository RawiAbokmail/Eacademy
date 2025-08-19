<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection( 'content'); ?>


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
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td class="pro-thumbnail"><img src="<?php echo e(asset('products/' . $item['image'])); ?>" width="100" alt="Product"></td>
                                <td class="pro-title"><?php echo e(data_get($item, 'title')); ?></td>
                                
                                <td class="pro-price">$<?php echo e($item['price']); ?></td>
                                <td class="pro-quantity">
                                    <input type="number" value="<?php echo e($item['quantity']); ?>" min="1">
                                </td>
                                <td class="pro-subtotal">$<?php echo e($item['price'] * $item['quantity']); ?></td>
                                <td class="pro-remove"><a href="<?php echo e(route('eacademy.cart.remove', $id)); ?>"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php
                                $cart = session('cart', []);
                                $subTotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
                                $shipping = $subTotal > 0 ? 70 : 0; // إذا السلة فارغة، الشحن 0
                                $total = $subTotal + $shipping;
                            ?>

                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">Cart Totals</th>
                            </tr>
                            <tr>
                                <td>Sub Total</td>
                                <td>$<?php echo e(number_format($subTotal, 2)); ?></td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>$<?php echo e(number_format($shipping, 2)); ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="total-amount">$<?php echo e(number_format($total, 2)); ?></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <form action="<?php echo e(route('eacademy.checkout')); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-add-to-cart">Proceed To Checkout</button>
                </form>

                </div>
            </div>
        </div>
        <!-- Cart Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\Eacademy\resources\views/eacademy/cart.blade.php ENDPATH**/ ?>