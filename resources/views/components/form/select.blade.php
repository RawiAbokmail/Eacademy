
@props(['name', 'label' => '', 'options', 'required' => true])
<div class="mb-3">
        @if(isset($label))
    <label class="form-label">{{ $label }}</label>
    @endif
        <select class="form-select" name="{{ $name }}">
            {{ $slot }}
        </select>
    </div>
