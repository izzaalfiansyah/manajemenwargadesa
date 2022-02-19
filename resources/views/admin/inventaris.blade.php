@extends('layouts.admin')

@section('content')
    <x-card title="Data Inventaris">
        <div align="right" class="mb-3">
            <x-button size="sm" variant="primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah
            </x-button>
        </div>

        <x-table :headers="['Nama Barang', 'Spesifikasi', 'Jumlah', 'Opsi']" data-table>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->spesifikasi }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td align="center">
                        <x-button size="xs" variant="primary" data-bs-toggle="modal" data-bs-target="#edit" onclick="{
                            document.querySelector('#edit').parentElement.action = '{{ url('/inventaris/' . $item->id) }}';
                            document.querySelector('#edit [name=nama]').value = '{{ $item->nama }}';
                            document.querySelector('#edit [name=spesifikasi]').value = '{{ $item->spesifikasi }}';
                            document.querySelector('#edit [name=jumlah]').value = '{{ $item->jumlah }}';
                        }">
                            <i class="mdi mdi-pen"></i>
                        </x-button>
                        <x-button size="xs" variant="danger" data-bs-toggle="modal" data-bs-target="#delete" onclick="{
                            document.querySelector('#delete').parentElement.action = '{{ url('/inventaris/' . $item->id) }}';
                            document.querySelector('#delete .nama').innerHTML = '{{ $item->nama }}';
                        }">
                            <i class="mdi mdi-delete"></i>
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </x-card>

    <form action="{{ url('/inventaris') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <x-modal id="create" title="Tambah Inventaris">
            <x-text-field label="Nama" placeholder="Masukkan Nama Barang" name="nama" required></x-text-field>
            <x-text-field label="Spesifikasi" placeholder="Masukkan Spesifikasi Barang" name="spesifikasi" required></x-text-field>
            <x-text-field label="Jumlah" placeholder="Masukkan Jumlah" name="jumlah" type="number" required></x-text-field>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/inventaris') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-modal id="edit" title="Edit Inventaris">
            <x-text-field label="Nama" placeholder="Masukkan Nama Barang" name="nama" required></x-text-field>
            <x-text-field label="Spesifikasi" placeholder="Masukkan Spesifikasi Barang" name="spesifikasi" required></x-text-field>
            <x-text-field label="Jumlah" placeholder="Masukkan Jumlah" name="jumlah" type="number" required></x-text-field>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/inventaris') }}" method="POST">
        @method('DELETE')
        @csrf
        <x-modal title="Hapus Inventaris" id="delete">
            <p>Anda yakin akan menghapus <strong class="nama">inventaris terpilih</strong>?</p>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="danger">Hapus</x-button>
            </x-slot>
        </x-modal>
    </form>
@endsection