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
            <div><h1>All Blogs</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="<?php echo e(route('dashboard.blogs.create')); ?>">
                Add New Blog
            </a> </button></div>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-<?php echo e(session('type') ?? 'success'); ?> alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

         <div class="container p-2">


<table class="table table-bordered text-center align-middle w-100">
  <thead>
    <tr class="table-info">
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      
      <th scope="col">Content</th>
      <th scope="col">Image</th>
      <th scope="col">Category_id</th>
      <th scope="col">Tags</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <th scope="row" class="align-middle"><?php echo e($blog->id); ?></th>
        <td class="align-middle"><?php echo e($blog->title); ?></td>
        
        <td class="align-middle"><?php echo e($blog->content); ?></td>
        <td class="align-middle">
          <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
            <img src="<?php echo e(asset('uploads/' . $blog->image)); ?>" alt="Post Image" style="max-width: 100px; max-height: 100px;">
          </div>
        </td>
        <td class="align-middle"><?php echo e($blog->category_id); ?></td>
        <td class="align-middle">
            <?php $__currentLoopData = $blog->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge bg-info"><?php echo e($tag->name); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td class="align-middle"><?php echo e($blog->created_at->format('M d, Y')); ?></td>
        <td class="align-middle">
          <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
            <a href="<?php echo e(route('dashboard.blogs.show', $blog)); ?>" class="btn btn-sm btn-success d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-eye me-1"></i>
            </a>

            <a href="<?php echo e(route('dashboard.blogs.edit', $blog)); ?>" class="btn btn-sm btn-primary d-flex align-items-center justify-content-center">
              <i class="fa fa-edit me-1"></i>
            </a>

            <form class="d-inline" action="<?php echo e(route('dashboard.blogs.destroy', $blog)); ?>" method="post">
              <?php echo csrf_field(); ?>
              <?php echo method_field('delete'); ?>
              <button class="btn btn-sm btn-danger d-flex align-items-center justify-content-center">
                <i class="fa fa-trash me-1"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr>
        <td class="text-center align-middle" colspan="9">No data entered</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
<?php echo e($blogs->appends($_GET)->links()); ?>

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
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/dashboard/blogs/index.blade.php ENDPATH**/ ?>