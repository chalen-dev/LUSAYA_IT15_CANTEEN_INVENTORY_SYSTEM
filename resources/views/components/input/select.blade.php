@props([
    'id',
    'name',
    'label',
    'value' => 1,
    'options' => []
])

<div class="mb-4">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
        </label>
    @endif

    <select
        id="{{ $id }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm']) }}
    >
        @foreach($options as $val => $text)
            <option value="{{ $val }}" @selected(old($name, $value) == $val)>
                {{ $text }}
            </option>
        @endforeach
    </select>

    @error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
