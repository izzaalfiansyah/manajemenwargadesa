@props([
    'variant' => 'default',
    'size' => 'sm',
])

<button {{ $attributes->merge([
    'class' => 'btn btn-' . $variant . ' btn-' . $size,
    'type' => 'button',
]) }}>
    {{ $slot }}
</button>