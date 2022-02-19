@props([
    'headers' => [],
    'variant' => 'hover'
])

<div class="table-responsive">
    <table class="table table-{{ $variant }}" {{ $attributes }}>
        @if ($headers)
            <thead>
                <tr>
                    @foreach ($headers as $item)
                        <th>{{ $item }}</th>
                    @endforeach
                </tr>
            </thead>
        @endif

        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>