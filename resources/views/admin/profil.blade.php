@extends('layouts.admin')

@section('content')
    <form action="{{ url('/user/' . $data->id . '/auth?redirect=/profil') }}" method="POST">
        @csrf
        @method('PUT')

        <x-card title="Autentikasi User">
            <div class="row">
                <div class="col-lg-6">
                    <x-text-field value="{{ $data->username }}" label="Username" name="username" required placeholder="Masukkan Username"></x-text-field>
                </div>
                <div class="col-lg-6">
                    <x-text-field label="Password" name="password" hint="Kosongkan jika tidak ingin mengganti password" placeholder="Masukkan Password"></x-text-field>
                </div>
            </div>

            <x-slot name="actions">
                <x-button type="submit" variant="primary">
                    Simpan
                </x-button>
            </x-slot>
        </x-card>
    </form>
    <form action="{{ url('/user/' . $data->id . '?redirect=/profil') }}" method="POST">
        @csrf
        @method('PUT')

        <x-card title="Profil User">
            <x-text-field value="{{ $data->nama }}" label="Nama" name="nama" required placeholder="Masukkan Nama"></x-text-field>
            <x-text-field value="{{ $data->alamat }}" label="Alamat" name="alamat" required placeholder="Masukkan Alamat"></x-text-field>
            <x-text-field value="{{ $data->telepon }}" number label="Nomor Telepon" name="telepon" required placeholder="08xxxxxxxxxx"></x-text-field>
            <input type="text" name="role" style="display: none" value="{{ $data->role }}">

            <x-slot name="actions">
                <x-button type="submit" variant="primary">
                    Simpan
                </x-button>
            </x-slot>
        </x-card>
    </form>
@endsection