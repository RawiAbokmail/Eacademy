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
            <h1 class="m-0">Show Product</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="<?php echo e(asset('products/' . $product->image)); ?>" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="<?php echo e($product->title); ?>">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <h2 class="card-title fw-bold"><?php echo e($product->title); ?></h2>
                        </div>
                        <br>

                        <div class="mb3">
                            <h5>Price of : <?php echo e($product->price); ?></h5>
                        </div>

                        <div class="mb3">
                            <h5>Quantity of : <?php echo e($product->quantity); ?></h5>
                        </div>


                        <div class="mb-3">
                            <span class="text-secondary small">Slug:</span>
                            <span class="text-dark"><?php echo e($product->slug); ?></span>
                        </div>
                        <div class="card-text" style="font-size: 1.1rem;">
                            <?php echo nl2br(e($product->description)); ?>

                        </div>
                        <br>

                        <div class="mb-3">
                            <h5>Gallery Images:</h5>
                            <div class="row">
                                <?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 mb-2">
                                        <img src="<?php echo e(asset('products/' . $galleryImage->image)); ?>" class="img-thumbnail" alt="Gallery Image" style="width: 100%; height: auto;">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/dashboard/products/show.blade.php ENDPATH**/ ?>