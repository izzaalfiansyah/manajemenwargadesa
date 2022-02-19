@props([
    'textarea' => false,
])

<div class="form-group">
    @if ($label)
        <label for="" class="form-label">{{ $label }}</label>
    @endif

    @if ($textarea)
        <textarea {{ $attributes->merge(['class' => 'form-control']) }}></textarea>
    @else
        <input {{ $attributes->merge(['class' => 'form-control']) }} autocomplete="off" onkeyup="{
            if (this.attributes.getNamedItem('number')) {
                const newValue = this.value.replace(/[^,\d]/gi, '');
                this.value = newValue;
            }
        }">
    @endif

    @if ($hint)
        <small style="font-size: 11px;">{{ $hint }}</small>
    @endif
</div>
