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
            <div><h1>All Teachers</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="<?php echo e(route('dashboard.users.create')); ?>">
                Add New Teacher
            </a> </button></div>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-<?php echo e(session('type') ?? 'success'); ?> alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>



         <div class="container p-2">
            <table class="table">
  <thead>
    <tr class="table-info">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Job</th>
      <th scope="col">Description</th>
      <th scope="col">Bio</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr>
      <th scope="row"><?php echo e($user->id); ?></th>
      <td><?php echo e($user->name); ?></td>
      <td> <img src="<?php echo e(asset('uploads/' . $user->image)); ?>" alt="Post Image" width="50" height="50"></td>
      <td><?php echo e($user->job); ?></td>
      <td><?php echo e($user->description); ?></td>
      <td><?php echo e($user->bio); ?></td>
      <td><?php echo e($user->created_at->format('M d, Y')); ?></td>
      <td>

                    <a href="<?php echo e(route('dashboard.users.edit', $user->id)); ?>" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form class="d-inline" action="<?php echo e(route('dashboard.teachers.destroy',
                    $user->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>


                </td>

    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td class="text-center" colspan="8">No data entered</td>
    </tr>
    <?php endif; ?>

  </tbody>
</table>
<?php echo e($users->appends($_GET)->links()); ?>

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
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/dashboard/teachers/index.blade.php ENDPATH**/ ?>