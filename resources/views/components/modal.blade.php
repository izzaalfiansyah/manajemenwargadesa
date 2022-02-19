@props([
    'actions' => ''
])

<div {{ $attributes->merge([
    'class' => 'modal fade',
]) }}>
    <div class="modal-dialog modal-{{ $size }}" style="margin-top: 20px !important;">
        <div class="modal-content">
            @if ($title)
                <div class="modal-header">
                    <div class="modal-title">{{ $title }}</div>
                </div>
            @endif
            <div class="modal-body">
                {{ $slot }}
            </div>
            @if ($actions)
                <div class="modal-footer" style="flex-direction: row;">
                    {{ $actions }}
                </div>
            @endif
        </div>
    </div>
</div>