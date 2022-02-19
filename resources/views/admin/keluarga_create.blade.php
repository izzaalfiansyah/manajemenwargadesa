@extends('layouts.admin')

@section('content')
    <form action="{{ url('/keluarga') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <x-card title="Tambah Keluarga">
            <div class="row">
                <div class="col-lg-4">
                    <x-text-field number label="Nomor KK" placeholder="350904xxxxxxxxxxxxx" name="nomor_kk" required>
                    </x-text-field>
                </div>
                <div class="col-lg-4">
                    <x-select label="Kepala Keluaga" name="kepala_keluarga_id" required select-autocomplete>
                        <option value="">- Pilih Kepala Keluarga -</option>
                        @foreach ($warga as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="col-lg-4">
                    <x-text-field type="file" label="File KK" title="Pilih File KK" name="file_kk" required></x-text-field>
                </div>
                <div class="col-lg-6">
                    <x-select label="Status Rumah" name="status_rumah" required>
                        <option value="">- Pilih Status Rumah -</option>
                        <option value="1">Milik Sendiri</option>
                        <option value="2">Kontrak</option>
                    </x-select>
                </div>
                <div class="col-lg-6">
                    <x-text-field label="Alamat Domisili" name="alamat_domisili" placeholder="Masukkan Alamat Domisili"
                        required></x-text-field>
                </div>
                <div class="col-lg-12">
                    <x-select name="anggota_id[]" label="Anggota Keluarga" select-autocomplete multiple>
                        <option value="">- Pilih Anggota -</option>
                        @foreach ($warga as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <x-slot name="actions">
                <x-button type="button" onclick="window.location = '{{ url('/keluarga') }}'">Batal</x-button>
                <x-button variant="primary" type="submit">Simpan</x-button>
            </x-slot>
        </x-card>
    </form>
@endsection
