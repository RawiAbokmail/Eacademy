<?php $__env->startSection('title', 'About Us'); ?>
<?php $__env->startSection('content'); ?>


    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(<?php echo e(asset('backend/images/page-banner-1.jpg')); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>About Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>About us</h5>
                        <h2>Welcome to Edubin </h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-7">
                    <div class="about-image mt-50">
                        <img src="<?php echo e(asset('backend/images/about/about-2.jpg')); ?>" alt="About">
                    </div>  <!-- about imag -->
                </div>
            </div> <!-- row -->
            <div class="about-items pt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>01</span>
                            <h4>Why Choose us</h4>
                            <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit sollicitudirem quibibendum auci</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>02</span>
                            <h4>Our Mission</h4>
                            <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit sollicitudirem quibibendum auci</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>03</span>
                            <h4>Our vission</h4>
                            <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit sollicitudirem quibibendum auci</p>
                        </div> <!-- about singel -->
                    </div>
                </div> <!-- row -->
            </div> <!-- about items -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== COUNTER PART START ======-->

    <?php if (isset($component)) { $__componentOriginal3794f0472dc90784c51dc659162cf097 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3794f0472dc90784c51dc659162cf097 = $attributes; } ?>
<?php $component = App\View\Components\CounterPart::resolve(['coursesCount' => $coursesCount,'people' => $people,'studentsCount' => $studentsCount,'teachersCount' => $teachersCount] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('counter-part'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CounterPart::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3794f0472dc90784c51dc659162cf097)): ?>
<?php $attributes = $__attributesOriginal3794f0472dc90784c51dc659162cf097; ?>
<?php unset($__attributesOriginal3794f0472dc90784c51dc659162cf097); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3794f0472dc90784c51dc659162cf097)): ?>
<?php $component = $__componentOriginal3794f0472dc90784c51dc659162cf097; ?>
<?php unset($__componentOriginal3794f0472dc90784c51dc659162cf097); ?>
<?php endif; ?>

    <!--====== COUNTER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-part" class="pt-65 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50 pb-35">
                        <h5>Featured Teachers</h5>
                        <h2>Meet Our teachers</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <?php if (isset($component)) { $__componentOriginal2af5c6777a2443bf02838cafcee8cd61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2af5c6777a2443bf02838cafcee8cd61 = $attributes; } ?>
<?php $component = App\View\Components\TeacherGrid::resolve(['teachers' => $teachers] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('teacher-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\TeacherGrid::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2af5c6777a2443bf02838cafcee8cd61)): ?>
<?php $attributes = $__attributesOriginal2af5c6777a2443bf02838cafcee8cd61; ?>
<?php unset($__attributesOriginal2af5c6777a2443bf02838cafcee8cd61); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2af5c6777a2443bf02838cafcee8cd61)): ?>
<?php $component = $__componentOriginal2af5c6777a2443bf02838cafcee8cd61; ?>
<?php unset($__componentOriginal2af5c6777a2443bf02838cafcee8cd61); ?>
<?php endif; ?>
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->

    <!--====== TEASTIMONIAL PART START ======-->

    <section id="testimonial" class="bg_cover pt-115 pb-120" data-overlay="8" style="background-image: url(<?php echo e(asset('backend/images/bg-2.jpg')); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-40">
                        <h5>Testimonial</h5>
                        <h2>What they say</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row testimonial-slied mt-40">
                <div class="col-lg-6">
                    <div class="singel-testimonial">
                        <div class="testimonial-thum">
                            <img src="<?php echo e(asset('backend/images/testimonial/t-1.jpg')); ?>" alt="Testimonial">
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="testimonial-cont">
                            <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet sem nibh id elit sollicitudirem </p>
                            <h6>Rubina Helen</h6>
                            <span>Bsc, Engineering</span>
                        </div>
                    </div> <!-- singel testimonial -->
                </div>
                <div class="col-lg-6">
                    <div class="singel-testimonial">
                        <div class="testimonial-thum">
                            <img src="<?php echo e(asset('backend/images/testimonial/t-2.jpg')); ?>" alt="Testimonial">
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="testimonial-cont">
                            <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet sem nibh id elit sollicitudirem </p>
                            <h6>Rubina Helen</h6>
                            <span>Bsc, Engineering</span>
                        </div>
                    </div> <!-- singel testimonial -->
                </div>
                <div class="col-lg-6">
                    <div class="singel-testimonial">
                        <div class="testimonial-thum">
                            <img src="<?php echo e(asset('backend/images/testimonial/t-3.jpg')); ?>" alt="Testimonial">
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="testimonial-cont">
                            <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet sem nibh id elit sollicitudirem </p>
                            <h6>Rubina Helen</h6>
                            <span>Bsc, Engineering</span>
                        </div>
                    </div> <!-- singel testimonial -->
                </div>
            </div> <!-- testimonial slied -->
        </div> <!-- container -->
    </section>

    <!--====== TEASTIMONIAL PART ENDS ======-->

    <?php if (isset($component)) { $__componentOriginal4d652aa995849f22cd362ed3896ef0a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d652aa995849f22cd362ed3896ef0a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.patner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('patner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d652aa995849f22cd362ed3896ef0a5)): ?>
<?php $attributes = $__attributesOriginal4d652aa995849f22cd362ed3896ef0a5; ?>
<?php unset($__attributesOriginal4d652aa995849f22cd362ed3896ef0a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d652aa995849f22cd362ed3896ef0a5)): ?>
<?php $component = $__componentOriginal4d652aa995849f22cd362ed3896ef0a5; ?>
<?php unset($__componentOriginal4d652aa995849f22cd362ed3896ef0a5); ?>
<?php endif; ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\Eacademy\resources\views/eacademy/about.blade.php ENDPATH**/ ?>