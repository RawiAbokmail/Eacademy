
<!doctype html>
<html lang="en">
<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title><?php echo $__env->yieldContent('title', env('APP_NAME')); ?></title>
    <link rel="icon" href="<?php echo e(asset('backend/images/favicon.png')); ?>" type="image/x-icon"/>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/slick.css')); ?>">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/animate.css')); ?>">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/nice-select.css')); ?>">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/jquery.nice-number.min.css')); ?>">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/magnific-popup.css')); ?>">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/font-awesome.min.css')); ?>">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/default.css')); ?>">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/new.css')); ?>">
<?php echo $__env->yieldContent('css'); ?>
</head>
<style>
    th{
        background-color: #07294d;
        color: white;
    }
    a{
        color: black;
    }


</style>

   <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    <!--====== PRELOADER PART START ======-->

    <!--====== HEADER PART START ======-->

    <header id="header-part">

        <div class="header-top d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><img src="<?php echo e(asset('backend/images/all-icon/call.png')); ?>" alt="icon"><span>(124) 123 675 598</span></li>
                                <li><img src="<?php echo e(asset('backend/images/all-icon/email.png')); ?>" alt="icon"><span>info@yourmail.com</span></li>
                                <li><img src="<?php echo e(asset('backend/images/all-icon/map.png')); ?>" alt="icon"><span>127/5 Mark street, New york</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="header-social text-lg-right text-center">
                            <ul>
                                

                                <li class="nav-item">
                                     <?php if(auth()->guard()->guest()): ?>
                                        <a href="<?php echo e(route('login')); ?>" style="color: #fff;">Login</a>
                                        <span>/</span>
                                        <a href="<?php echo e(route('register')); ?>" style="color: #fff;">Sign in</a>
                                    <?php endif; ?>

                                    <?php if(auth()->guard()->check()): ?>
                                        <a href="<?php echo e(route('logout')); ?>"style="color: #fff;"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                        </form>
                                    <?php endif; ?>
                                </li>

                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
        <div class="navigation navigation-2">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-11 col-md-10 col-sm-9 col-9">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?php echo e(route('eacademy.index')); ?>">
                                <img src="<?php echo e(asset('backend/images/log.png')); ?>" width="160" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="<?php echo e(request()->routeIs('eacademy.index')? 'active' : ''); ?>" href="<?php echo e(route('eacademy.index')); ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(request()->routeIs('eacademy.about')? 'active' : ''); ?>" href="<?php echo e(route('eacademy.about')); ?>">About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(request()->routeIs('eacademy.courses')? 'active' : ''); ?>" href="<?php echo e(route('eacademy.courses')); ?>">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(request()->routeIs('eacademy.events')? 'active' : ''); ?>" href="<?php echo e(route('eacademy.events')); ?>">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(request()->routeIs('eacademy.teachers')? 'active' : ''); ?>" href="<?php echo e(route('eacademy.teachers')); ?>">Our teachers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(request()->routeIs('blogs.index')? 'active' : ''); ?>" href="<?php echo e(route('eacademy.blogs')); ?>">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(request()->routeIs('eacademy.shop')? 'active' : ''); ?>" href="<?php echo e(route('eacademy.shop')); ?>">Shop</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(request()->routeIs('eacademy.contact')? 'active' : ''); ?>" href="<?php echo e(route('eacademy.contact')); ?>">Contact</a>
                                    </li>

                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                        <div class="right-icon text-right">
                            <ul>
                                <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                <li><a href="<?php echo e(route('eacademy.cart')); ?>"><i class="fa fa-shopping-bag "></i><span>0</span></a></li>
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SEARCH BOX PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <!--====== SEARCH BOX PART ENDS ======-->

<?php echo $__env->yieldContent('content'); ?>


    <!--====== FOOTER PART START ======-->

    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="#"><img src="<?php echo e(asset('backend/images/la.png')); ?>"
                                 alt="Logo" width="300"></a>
                            </div>
                            <p>Gravida nibh vel velit auctor aliquetn quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate.</p>
                            <ul class="mt-20">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Sitemap</h6>
                            </div>
                            <ul>
                                <li><a href="index-2.html"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a href="about.html"><i class="fa fa-angle-right"></i>About us</a></li>
                                <li><a href="courses.html"><i class="fa fa-angle-right"></i>Courses</a></li>
                                <li><a href="blog.html"><i class="fa fa-angle-right"></i>News</a></li>
                                <li><a href="events.html"><i class="fa fa-angle-right"></i>Event</a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Gallery</a></li>
                                <li><a href="shop.html"><i class="fa fa-angle-right"></i>Shop</a></li>
                                <li><a href="teachers.html"><i class="fa fa-angle-right"></i>Teachers</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Support</h6>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Policy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Documentation</a></li>
                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>143 castle road 517 district, kiyev port south Canada</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+3 123 456 789</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>info@yourmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->

        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a> </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">

                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TO TP PART ENDS ======-->








    <!--====== jquery js ======-->
    <script src="<?php echo e(asset('backend/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/vendor/jquery-1.12.4.min.js')); ?>"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>"></script>

    <!--====== Slick js ======-->
    <script src="<?php echo e(asset('backend/js/slick.min.js')); ?>"></script>

    <!--====== Magnific Popup js ======-->
    <script src="<?php echo e(asset('backend/js/jquery.magnific-popup.min.js')); ?>"></script>

    <!--====== Counter Up js ======-->
    <script src="<?php echo e(asset('backend/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/jquery.counterup.min.js')); ?>"></script>

    <!--====== Nice Select js ======-->
    <script src="<?php echo e(asset('backend/js/jquery.nice-select.min.js')); ?>"></script>

    <!--====== Nice Number js ======-->
    <script src="<?php echo e(asset('backend/js/jquery.nice-number.min.js')); ?>"></script>

    <!--====== Count Down js ======-->
    <script src="<?php echo e(asset('backend/js/jquery.countdown.min.js')); ?>"></script>

    <!--====== Validator js ======-->
    <script src="<?php echo e(asset('backend/js/validator.min.js')); ?>"></script>

    <!--====== Ajax Contact js ======-->
    <script src="<?php echo e(asset('backend/js/ajax-contact.js')); ?>"></script>

    <!--====== Main js ======-->
    <script src="<?php echo e(asset('backend/js/main.js')); ?>"></script>

    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="<?php echo e(asset('backend/js/map-script.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>

</body>

</html>
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/layouts/master.blade.php ENDPATH**/ ?>