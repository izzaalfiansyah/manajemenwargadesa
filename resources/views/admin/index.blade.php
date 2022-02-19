@extends('layouts.admin')

@section('content')
    <x-card>
        <p>Selamat datang di Aplikasi {{ env('APP_NAME') }}</p>
    </x-card>
    @php
        $statistics = [
            ['Data User', count(\App\Models\User::all())],
            ['Data Warga', count(\App\Models\Warga::all())],
            ['Data Inventaris', count(\App\Models\Inventaris::all())],
        ];

        $items = [];
        foreach ($statistics as $key => $item) {
            $items[] = json_decode(json_encode([
                'title' => $item[0],
                'count' => $item[1],
            ]));
        }
    @endphp
    <div class="row">
        @foreach ($items as $item)    
            <div class="col-lg-4">
                <x-card>
                    <div class="statistics-detail d-flex align-items-center justifi-content-between">
                        <div>
                            <p class="statistics-title">{{ $item->title }}</p>
                            <h3 class="rate-percentage">{{ $item->count }}</h3>
                        </div>
                    </div>
                </x-card>
            </div>
        @endforeach
    </div>
@endsection