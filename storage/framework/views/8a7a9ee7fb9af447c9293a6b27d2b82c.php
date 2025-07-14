<?php if (isset($component)) { $__componentOriginal0de143e5b61900e6d7b990ac144ae3fb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0de143e5b61900e6d7b990ac144ae3fb = $attributes; } ?>
<?php $component = App\View\Components\DashboardLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\DashboardLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Event</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="<?php echo e(asset('uploads/' . $event->image)); ?>" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="<?php echo e($event->title); ?>">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <span><i class="fa fa-calendar"></i> <?php echo e($event->duration); ?></span>
                        </div>
                        <div class="mb-3">
                            <h2 class="card-title fw-bold"><?php echo e($event->title); ?></h2>
                        </div>
                        <br>
                        <div class="mb-3">
                            <span><i class="fa fa-clock-o"></i> <?php echo e($event->time_start); ?> - <?php echo e($event->time_end); ?></span>
                        </div>
                        <span><i class="fa fa-map-marker"></i> <?php echo e($event->location); ?></span>
                        <div class="mb-3">
                            <span class="text-secondary small">Slug:</span>
                            <span class="text-dark"><?php echo e($event->slug); ?></span>
                        </div>
                        <div class="card-text" style="font-size: 1.1rem;">
                            <?php echo nl2br(e($event->description)); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0de143e5b61900e6d7b990ac144ae3fb)): ?>
<?php $attributes = $__attributesOriginal0de143e5b61900e6d7b990ac144ae3fb; ?>
<?php unset($__attributesOriginal0de143e5b61900e6d7b990ac144ae3fb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0de143e5b61900e6d7b990ac144ae3fb)): ?>
<?php $component = $__componentOriginal0de143e5b61900e6d7b990ac144ae3fb; ?>
<?php unset($__componentOriginal0de143e5b61900e6d7b990ac144ae3fb); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/dashboard/events/show.blade.php ENDPATH**/ ?>