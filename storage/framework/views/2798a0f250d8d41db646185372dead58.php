<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'text',
    'name' => '',
    'label',
    'placeholder' => '',
    'value' => old($name, $value ?? '')

]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'type' => 'text',
    'name' => '',
    'label',
    'placeholder' => '',
    'value' => old($name, $value ?? '')

]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div class="mb-3">
    <?php if(isset($label)): ?>
    <label class="form-label"><?php echo e($label); ?></label>
    <?php endif; ?>
    <input type="<?php echo e($type); ?>" class="form-control <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder); ?>" value="<?php echo e($value); ?>">
    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small class="text text-danger">
            <?php echo e($message); ?>

        </small>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    
    <?php if($type == 'file' && $value): ?>
        <div>
            <img class="img-thumbnail mt-1" width="100" src="<?php echo e(asset('uploads/' . $value)); ?>" alt="">
        </div>
    <?php endif; ?>

</div>
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/components/form/input.blade.php ENDPATH**/ ?>