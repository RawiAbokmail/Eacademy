@props([
    'label',
    'name' => '',
    'options',
])
<div class="mb-3">
    <label>{{ $label }}</label> <br>
    @foreach ($options as $key => $val)
<label><input class="radio-control mb-3" type="radio" name="{{ $name }}" value="{{ $key }}"> {{ $val }}</label>
    @if(!$loop->last)
        <br>
    @endif
    @endforeach


</div>
