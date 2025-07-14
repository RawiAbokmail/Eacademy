<?php $__env->startSection('title', 'events'); ?>
<?php $__env->startSection( 'content'); ?>



    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(<?php echo e(asset('backend/images/page-banner-3.jpg')); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Events</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Events</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== EVENTS PART START ======-->

    <section id="event-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
               <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6">
                   <div class="singel-event-list mt-30">
                       <div class="event-thum">
                           <img src="<?php echo e(asset('uploads/' . $event->image)); ?>" alt="Event">
                       </div>
                       <div class="event-cont">
                           <span><i class="fa fa-calendar"></i> <?php echo e(\Carbon\Carbon::parse($event->duration)->format('d F Y')); ?>

</span>
                            <a href="<?php echo e(route('eacademy.events-single', $event)); ?>"><h4><?php echo e($event->title); ?></h4></a>
                            <span><i class="fa fa-clock-o"></i> <?php echo e(\Carbon\Carbon::parse($event->time_start)->format('h:i A')); ?> - <?php echo e(\Carbon\Carbon::parse($event->time_end)->format('h:i A')); ?></span>
                            <span><i class="fa fa-map-marker"></i> <?php echo e($event->location); ?></span>
                            <p><?php echo e($event->description); ?></p>
                       </div>
                   </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div> <!-- row -->

           <?php echo e($events->appends($_GET)->links()); ?>

            
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\Eacademy\resources\views/eacademy/events.blade.php ENDPATH**/ ?>