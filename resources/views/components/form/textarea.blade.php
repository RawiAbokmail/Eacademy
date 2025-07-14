@props([
    'rows' => '5',
    'name',
    'label',
    'placeholder' => '',
    'value' => old($name, $value ?? '')

])
<div class="mb-3">
    @if(isset($label))
    <label class="form-label">{{ $label }}</label>
    @endif
    <textarea rows="{{ $rows }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" placeholder="{{ $placeholder }}" >{{ $value }}</textarea>
     @error($name)
        <small class="invalid-feedback">
            {{ $message }}
        </small>

    @enderror
</div>
