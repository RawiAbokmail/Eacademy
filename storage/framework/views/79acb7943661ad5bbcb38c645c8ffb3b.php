<?php $__env->startSection('title', 'Our Teachers'); ?>
<?php $__env->startSection( 'content'); ?>



    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(<?php echo e(asset('backend/images/page-banner-3.jpg')); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Teachers</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
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
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <?php echo e($teachers->links()); ?>

                            
                        </ul>
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\Eacademy\resources\views/eacademy/teachers.blade.php ENDPATH**/ ?>