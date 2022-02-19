@extends('layouts.admin')

@section('content')
    <x-card title="Data Warga">
        <div align="right" class="mb-3">
            <x-button size="sm" variant="primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah
            </x-button>
        </div>

        <x-table :headers="['NIK', 'Nama', 'Tempat, Tgl Lahir', 'Pekerjaan', 'KTP', 'Mutasi', 'Opsi']" data-table>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir_local }}</td>
                    <td>{{ $item->pekerjaan }}</td>
                    <td>
                        <a href="{{ $item->file_ktp_url }}" target="_blank">Lihat</a>
                    </td>
                    <td>{{ $item->mutasi->nama }}</td>
                    <td align="center">
                        <x-button size="xs" variant="primary" data-bs-toggle="modal" data-bs-target="#edit" onclick="{
                            $('#edit [select-autocomplete]').select2('destroy');
                            document.querySelector('#edit').parentElement.action = '{{ url('/warga/' . $item->id) }}';
                            document.querySelector('#edit [name=nik]').value = '{{ $item->nik }}';
                            document.querySelector('#edit [name=nama]').value = '{{ $item->nama }}';
                            document.querySelector('#edit [name=tempat_lahir]').value = '{{ $item->tempat_lahir }}';
                            document.querySelector('#edit [name=tanggal_lahir]').value = '{{ $item->tanggal_lahir }}';
                            document.querySelector('#edit [name=agama]').value = '{{ $item->agama }}';
                            document.querySelector('#edit [name=pekerjaan]').value = '{{ $item->pekerjaan }}';
                            document.querySelector('#edit [name=telepon]').value = '{{ $item->telepon }}';
                            document.querySelector('#edit [name=mutasi_id]').value = '{{ $item->mutasi_id }}';
                            document.querySelector('#edit [name=status_keluarga]').value = '{{ $item->status_keluarga }}';
                            $('#edit [select-autocomplete]').select2({
                                theme: 'bootstrap-5',
                            });
                        }">
                            <i class="mdi mdi-pen"></i>
                        </x-button>
                        <x-button size="xs" variant="danger" data-bs-toggle="modal" data-bs-target="#delete" onclick="{
                            document.querySelector('#delete').parentElement.action = '{{ url('/warga/' . $item->id) }}';
                            document.querySelector('#delete .nama').innerHTML = '{{ $item->nama }}';
                        }">
                            <i class="mdi mdi-delete"></i>
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </x-card>

    <form action="{{ url('/warga') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <x-modal id="create" title="Tambah Warga" size="lg">
            <div class="row">
                <div class="col-lg-6">
                    <x-text-field number label="NIK" name="nik" maxlength="16" minlength="16" required placeholder="350904xxxxxxxxx"></x-text-field>
                    <x-text-field label="Nama" name="nama" required placeholder="Masukkan Nama"></x-text-field>
                    <x-text-field label="Tempat Lahir" name="tempat_lahir" required placeholder="Masukkan Tempat Lahir"></x-text-field>
                    <x-text-field label="Tanggal Lahir" type="date" name="tanggal_lahir" required></x-text-field>
                    <x-text-field label="Agama" name="agama" required placeholder="Islam / Kristen / Hindu / Buddha"></x-text-field>
                </div>
                <div class="col-lg-6">
                    <x-text-field label="Pekerjaan" name="pekerjaan" required placeholder="Masukkan Pekerjaan"></x-text-field>
                    <x-text-field number label="Nomor Telepon" name="telepon" required placeholder="081xxxxxxxxxx"></x-text-field>
                    <x-select label="Mutasi" name="mutasi_id" required select-autocomplete>
                        <option value="">- Pilih Mutasi -</option>
                        @foreach ($mutasi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </x-select>
                    <x-text-field label="Status Anggota Keluarga" name="status_keluarga" required placeholder="Suami / Istri / Anak / Orang tua / Lainnya"></x-text-field>
                    <x-text-field type="file" label="File KTP" name="file_ktp" required title="Pilih File KTP"></x-text-field>
                </div>
            </div>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/warga') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-modal id="edit" title="Edit Warga" size="lg">
            <div class="row">
                <div class="col-lg-6">
                    <x-text-field number label="NIK" name="nik" maxlength="16" minlength="16" required placeholder="350904xxxxxxxxx"></x-text-field>
                    <x-text-field label="Nama" name="nama" required placeholder="Masukkan Nama"></x-text-field>
                    <x-text-field label="Tempat Lahir" name="tempat_lahir" required placeholder="Masukkan Tempat Lahir"></x-text-field>
                    <x-text-field label="Tanggal Lahir" type="date" name="tanggal_lahir" required></x-text-field>
                    <x-text-field label="Agama" name="agama" required placeholder="Islam / Kristen / Hindu / Buddha"></x-text-field>
                </div>
                <div class="col-lg-6">
                    <x-text-field label="Pekerjaan" name="pekerjaan" required placeholder="Masukkan Pekerjaan"></x-text-field>
                    <x-text-field number label="Nomor Telepon" name="telepon" required placeholder="081xxxxxxxxxx"></x-text-field>
                    <x-select label="Mutasi" name="mutasi_id" required select-autocomplete>
                        <option value="">- Pilih Mutasi -</option>
                        @foreach ($mutasi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </x-select>
                    <x-text-field label="Status Anggota Keluarga" name="status_keluarga" required placeholder="Suami / Istri / Anak / Orang tua / Lainnya"></x-text-field>
                    <x-text-field type="file" label="File KTP" name="file_ktp" title="Pilih File KTP" hint="Kosongkan jika tidak ingin mengganti file"></x-text-field>
                </div>
            </div>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/warga') }}" method="POST">
        @method('DELETE')
        @csrf
        <x-modal title="Hapus Warga" id="delete">
            <p>Anda yakin akan menghapus <strong class="nama">warga terpilih</strong>?</p>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="danger">Hapus</x-button>
            </x-slot>
        </x-modal>
    </form>
@endsection