<div class="row">
              <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-lg-3 col-sm-6">
                   <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="<?php echo e(asset('uploads/' . $teacher->image)); ?>" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="<?php echo e(route('eacademy.teachers-single', $teacher)); ?>"><h6><?php echo e($teacher->name); ?></h6></a>
                            <span><?php echo e($teacher->job); ?></span>
                        </div>
                    </div> <!-- singel teachers -->
               </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           </div> <!-- row -->
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/components/teacher-grid.blade.php ENDPATH**/ ?>