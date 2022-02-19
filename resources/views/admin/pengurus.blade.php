@extends('layouts.admin')

@section('content')
    <form action="{{ url('/pengurus/' . $data->id) }}" method="POST">
        @method('PUT')
        @csrf
        <x-card title="Data Pengurus">
            <x-text-field label="Ketua RW" name="ketua_rw" value="{{ $data->ketua_rw }}" required
                placeholder="Nama Ketua RW"></x-text-field>
            <x-text-field label="Ketua RT" name="ketua_rt" value="{{ $data->ketua_rt }}" required
                placeholder="Nama Ketua RT"></x-text-field>
            <div class="row">
                <div class="col-lg-6">
                    <x-text-field label="Sekretaris" name="sekretaris" value="{{ $data->sekretaris }}" required
                        placeholder="Nama Sekretaris"></x-text-field>
                </div>
                <div class="col-lg-6">
                    <x-text-field label="Bendahara" name="bendahara" value="{{ $data->bendahara }}" required
                        placeholder="Nama Bendahara"></x-text-field>
                </div>
            </div>
        </x-card>

        <x-card title="Seksi-Seksi">
            <hr>
            <div class="row align-items-center">
                <div class="col-6">
                    <small><i>Kosongkan jika kolom tidak terpakai</i></small>
                </div>
                <div class="col-6" align="right">
                    <x-button variant="primary" onclick="tambahSeksi()">Tambah Petugas</x-button>
                </div>
            </div>
            <hr>
            <div id="seksi-seksi">
                @foreach ($data->seksi_seksi as $key => $item)
                    <div class="row">
                        <div class="col-lg-12 d-lg-none">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <x-text-field label="Bagian ke-{{ $loop->iteration }}"
                                placeholder="Bagian Kerja (Keamanan / Keagamaan / dll)" value="{{ $item->bagian }}"
                                name="seksi_seksi[{{ $key }}][bagian]"></x-text-field>
                            </div>
                            <div class="col-lg-6">
                                <x-text-field label="Petugas" placeholder="Nama Petugas" value="{{ $item->petugas }}"
                                    name="seksi_seksi[{{ $key }}][petugas]">
                                </x-text-field>
                            </div>
                        </div>
                        <div class="col-lg-12 d-lg-none">
                            <br>
                        </div>
                @endforeach
            </div>
        </x-card>

        <x-card>
            <div align="right">
                <x-button type="submit" variant="primary">Simpan</x-button>
            </div>
        </x-card>
    </form>

    <script>
        function tambahSeksi() {
            // mengambil element dengan ID seksi
            const seksiSection = document.getElementById('seksi-seksi');

            // mengambil banyaknya anak elemen dari seksiSection
            const childCount = seksiSection.childElementCount;

            // membuat element baru
            const newChild = document.createElement('div');
            newChild.className = 'row';
            newChild.innerHTML = `
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-label">Bagian ke-${childCount + 1}</label>
                        <input class="form-control" name="seksi_seksi[${childCount}][bagian]" placeholder="Bagian Kerja (Keamanan / Keagamaan / dll)" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-label">Petugas</label>
                        <input class="form-control" name="seksi_seksi[${childCount}][petugas]" placeholder="Nama Petugas" autocomplete="off">
                    </div>
                </div>
            `;

            // menambahkan ke HTML
            seksiSection.appendChild(newChild);
        }
    </script>
@endsection
