<?php $__env->startSection('title', 'Courses'); ?>
<?php $__env->startSection( 'content'); ?>



    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(<?php echo e(asset('backend/images/page-banner-2.jpg')); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Our Courses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Courses</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== COURSES PART START ======-->

    <section id="courses-part" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item">Showning 4 0f 24 Results</li>
                        </ul> <!-- nav -->

                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row">
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="<?php echo e(asset('uploads/' . $course->image)); ?>" alt="Course">
                                    </div>
                                    <div class="price">
                                        <span><?php echo e(($course->is_paid) ? 'paid' : 'free'); ?></span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>(20 Reviws)</span>
                                    <a href="<?php echo e(route('eacademy.courses-single', $course)); ?>"><h4><?php echo e($course->title); ?></h4></a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="<?php echo e(asset('uploads/' . $course->teacher->image)); ?>" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="teachers-singel.php"><h6><?php echo e($course->teacher->name); ?></h6></a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div> <!-- row -->
                </div>
                <div class="tab-pane fade" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="singel-course mt-30">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="<?php echo e(asset('backend/images/course/cu-1.jpg')); ?>" alt="Course">
                                            </div>
                                            <div class="price">
                                                <span>Paid</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cont">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>(20 Reviws)</span>
                                            <a href="courses-singel.php"><h4>Learn basis javascirpt from start for beginner</h4></a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img src="<?php echo e(asset('backend/images/course/teacher/t-1.jpg')); ?>" alt="teacher"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="teachers-singel.php"><h6>Mark anthem</h6></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--  row  -->
                            </div> <!-- singel course -->
                        </div>
                        <div class="col-lg-12">
                            <div class="singel-course mt-30">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="<?php echo e(asset('backend/images/course/cu-2.jpg')); ?>" alt="Course">
                                            </div>
                                            <div class="price">
                                                <span>Paid</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cont">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>(20 Reviws)</span>
                                            <a href="courses-singel.php"><h4>Learn basis javascirpt from start for beginner</h4></a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img src="<?php echo e(asset('backend/images/course/teacher/t-2.jpg')); ?>" alt="teacher"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="teachers-singel.php"><h6>Mark anthem</h6></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--  row  -->
                            </div> <!-- singel course -->
                        </div>
                        <div class="col-lg-12">
                            <div class="singel-course mt-30">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="<?php echo e(asset('backend/images/course/cu-3.jpg')); ?>" alt="Course">
                                            </div>
                                            <div class="price">
                                                <span>Paid</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cont">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>(20 Reviws)</span>
                                            <a href="courses-singel.php"><h4>Learn basis javascirpt from start for beginner</h4></a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img src="<?php echo e(asset('backend/images/course/teacher/t-3.jpg')); ?>" alt="teacher"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="teachers-singel.php"><h6>Mark anthem</h6></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--  row  -->
                            </div> <!-- singel course -->
                        </div>
                        <div class="col-lg-12">
                            <div class="singel-course mt-30">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="<?php echo e(asset('backend/images/course/cu-4.jpg')); ?>" alt="Course">
                                            </div>
                                            <div class="price">
                                                <span>Paid</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cont">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>(20 Reviws)</span>
                                            <a href="courses-singel.php"><h4>Learn basis javascirpt from start for beginner</h4></a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img src="<?php echo e(asset('backend/images/course/teacher/t-4.jpg')); ?>" alt="teacher"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="teachers-singel.php"><h6>Mark anthem</h6></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--  row  -->
                            </div> <!-- singel course -->
                        </div>
                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <?php echo e($courses->appends($_GET)->links()); ?>

                        
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES PART ENDS ======-->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\Eacademy\resources\views/eacademy/courses.blade.php ENDPATH**/ ?>