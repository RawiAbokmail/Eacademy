<div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $course->title ?? '')); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Choose Category --</option>
                                         <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e((old('category_id', $course->category_id ?? '') == $category->id) ? 'selected' : ''); ?>>
                                             <?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="teacher_id">Teacher</label>
                                <select name="teacher_id" class="form-control" required>
                                    <option value="">-- Choose Teacher --</option>
                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($teacher->id); ?>" <?php echo e((old('teacher_id', $course->teacher_id ?? '') == $teacher->id) ? 'selected' : ''); ?>>
                                            <?php echo e($teacher->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="duration">Duration</label>
                                <input type="text" name="duration" class="form-control" value="<?php echo e(old('duration', $course->duration ?? '')); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="price">Price ($)</label>
                                <input type="number" step="0.01" name="price" class="form-control" value="<?php echo e(old('price', $course->price ?? 0)); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="is_paid">Is Paid?</label>
                                <select name="is_paid" class="form-control" required>
                                    <option value="1" <?php echo e(old('is_paid', $course->is_paid ?? 1) ? 'selected' : ''); ?>>Yes</option>
                                    <option value="0" <?php echo e(!old('is_paid', $course->is_paid ?? 1) ? 'selected' : ''); ?>>No</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4" required><?php echo e(old('description', $course->description ?? '')); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="requirements">requirements</label>
                                <textarea name="requirements" class="form-control" rows="4"><?php echo e(old('requirements', $course->requirements ?? '')); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                                <?php if(!empty($course->image)): ?>
                                    <img src="<?php echo e(asset('uploads/' . $course->image)); ?>" width="100" class="mt-2">
                                <?php endif; ?>
                            </div>


<?php /**PATH C:\wamp64\www\Eacademy\resources\views/components/form/courseform.blade.php ENDPATH**/ ?>