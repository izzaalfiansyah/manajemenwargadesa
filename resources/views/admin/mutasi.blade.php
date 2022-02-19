@extends('layouts.admin')

@section('content')
    <x-card title="Data Kategori Mutasi">
        <div align="right" class="mb-3">
            <x-button size="sm" variant="primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah
            </x-button>
        </div>

        <x-table :headers="['Nama Kategori', 'Deskripsi', 'Opsi']" data-table>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td align="center">
                        <x-button size="xs" variant="primary" data-bs-toggle="modal" data-bs-target="#edit" onclick="{
                            document.querySelector('#edit').parentElement.action = '{{ url('/mutasi/' . $item->id) }}';
                            document.querySelector('#edit [name=nama]').value = '{{ $item->nama }}';
                            document.querySelector('#edit [name=deskripsi]').value = '{{ $item->deskripsi }}';
                        }">
                            <i class="mdi mdi-pen"></i>
                        </x-button>
                        <x-button size="xs" variant="danger" data-bs-toggle="modal" data-bs-target="#delete" onclick="{
                            document.querySelector('#delete').parentElement.action = '{{ url('/mutasi/' . $item->id) }}';
                            document.querySelector('#delete .nama').innerHTML = '{{ $item->nama }}';
                        }">
                            <i class="mdi mdi-delete"></i>
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </x-card>

    <form action="{{ url('/mutasi') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <x-modal id="create" title="Tambah Mutasi">
            <x-text-field label="Nama" placeholder="Masukkan Nama Kategori" name="nama" required></x-text-field>
            <x-text-field label="Deskripsi" placeholder="Masukkan Deskripsi" hint="Optional (boleh tidak diisi)" name="deskripsi"></x-text-field>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/mutasi') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-modal id="edit" title="Edit Mutasi">
            <x-text-field label="Nama" placeholder="Masukkan Nama Kategori" name="nama" required></x-text-field>
            <x-text-field label="Deskripsi" placeholder="Masukkan Deskripsi" hint="Optional (boleh tidak diisi)" name="deskripsi"></x-text-field>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/mutasi') }}" method="POST">
        @method('DELETE')
        @csrf
        <x-modal title="Hapus Inventaris" id="delete">
            <p>Anda yakin akan menghapus <strong class="nama">mutasi terpilih</strong>?</p>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="danger">Hapus</x-button>
            </x-slot>
        </x-modal>
    </form>
@endsection