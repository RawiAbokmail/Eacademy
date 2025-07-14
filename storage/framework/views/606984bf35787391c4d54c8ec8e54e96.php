
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name', 'label' => '', 'options', 'required' => true]));

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

foreach (array_filter((['name', 'label' => '', 'options', 'required' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
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
        <select class="form-select" name="<?php echo e($name); ?>">
            <?php echo e($slot); ?>

        </select>
    </div>
<?php /**PATH C:\wamp64\www\Eacademy\resources\views/components/form/select.blade.php ENDPATH**/ ?>