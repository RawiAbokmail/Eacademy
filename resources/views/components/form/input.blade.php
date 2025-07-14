@props([
    'type' => 'text',
    'name' => '',
    'label',
    'placeholder' => '',
    'value' => old($name, $value ?? '')

])
<div class="mb-3">
    @if(isset($label))
    <label class="form-label">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    @error($name)
        <small class="text text-danger">
            {{ $message }}
        </small>

    @enderror

    {{-- for update image --}}
    @if($type == 'file' && $value)
        <div>
            <img class="img-thumbnail mt-1" width="100" src="{{ asset('uploads/' . $value) }}" alt="">
        </div>
    @endif

</div>
