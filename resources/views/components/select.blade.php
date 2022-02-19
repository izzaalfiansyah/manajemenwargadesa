<div class="form-group">
    @if ($label)
        <label for="" class="form-label">{{ $label }}</label>
    @endif

    <select {{ $attributes->merge(['class' => 'form-control']) }}>
        {{ $slot }}
    </select>
</div>