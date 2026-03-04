@props([
    'label',
    'name',
    'type' => 'text',
    'value' => null,
    'class' => null,
    'attributes' => null,
])

<div class="">
    @if($label)
        <label for="{{ $name }}" class="">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $text }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $attributes->merge(['class' => '' . $class]) }}
    />

    @error($name)
    <p>{{ $message }}</p>
    @enderror
</div>
