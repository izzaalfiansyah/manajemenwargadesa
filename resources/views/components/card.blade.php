@props([
    'title' => '',
    'actions' => '',
])

<div class="card mb-3">
    <div class="card-body">
        @if ($title)
            <div class="card-title">{{ $title }}</div>
        @endif
        
        {{ $slot }}
        
        @if ($actions)
            <hr>
            {{ $actions }}
        @endif
    </div>
</div>