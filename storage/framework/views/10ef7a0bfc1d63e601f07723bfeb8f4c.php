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

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Lectures</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="<?php echo e(route('dashboard.lectures.create')); ?>">
                Add New Lecture
            </a> </button></div>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-<?php echo e(session('type') ?? 'success'); ?> alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

          <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Video</th>
                <th>Time</th>
                <th>Description</th>
                <th>Course_title</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $lectures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($lecture->id); ?></td>
                    <td><?php echo e($lecture->name); ?></td>
                    <td>
                        <?php if($lecture->video): ?>
                            <a href="<?php echo e(asset('uploads/' . $lecture->video)); ?>" target="_blank">show Video</a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($lecture->time); ?></td>
                    <td><?php echo e($lecture->description); ?></td>
                    <td><?php echo e($lecture->course->title); ?></td>
                    <td><?php echo e($lecture->created_at); ?></td>

                    <td>
                        <a href="<?php echo e(route('dashboard.lectures.show', $lecture->id)); ?>" class="btn btn-sm btn-success">
                            <i class="fa-solid fa-eye me-1"></i>
                        </a>
                        <a href="<?php echo e(route('dashboard.lectures.edit', $lecture->id)); ?>" class="btn btn-sm btn-info">Edit</a>
                        <form action="<?php echo e(route('dashboard.lectures.destroy', $lecture->id)); ?>" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash me-1"></i></button>
                        </form>
                    </td>
                </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                 <td class="text-center align-middle" colspan="8">No data entered</td>
                </tr>
             <?php endif; ?>

        </tbody>
    </table>


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
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/dashboard/lectures/index.blade.php ENDPATH**/ ?>