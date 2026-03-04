@props([
    'label',
    'name',
    'value' => null,
    'min' => null,
    'max' => null,
    'step' => null,
    'class' => null,
])

<div class="">
    @if($label)
        <label for="{{ $name }}" class="">
            {{ $label }}
        </label>
    @endif

    <input
        type="number"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        @if($min !== null) min="{{ $min }}" @endif
        @if($max !== null) max="{{ $max }}" @endif
        @if($step !== null) step="{{ $step }}" @endif
        {{ $attributes->merge(['class' => '' . $class]) }}
    />

    @error($name)
    <p>{{ $message }}</p>
    @enderror
</div>
