@extends('layouts.admin')

@section('content')
    <x-card title="Data User">
        <div align="right" class="mb-3">
            <x-button size="sm" variant="primary" data-bs-toggle="modal" data-bs-target="#create">
                Tambah
            </x-button>
        </div>

        <x-table :headers="['Nama', 'Alamat', 'Nomor Telepon', 'Role', 'Opsi']" data-table>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->role_detail }}</td>
                    <td align="center">
                        <x-button size="xs" variant="primary" data-bs-toggle="modal" data-bs-target="#edit" onclick="{
                            document.querySelector('#edit').parentElement.action = '{{ url('/user/' . $item->id) }}';
                            document.querySelector('#edit [name=nama]').value = '{{ $item->nama }}';
                            document.querySelector('#edit [name=alamat]').value = '{{ $item->alamat }}';
                            document.querySelector('#edit [name=telepon]').value = '{{ $item->telepon }}';
                            document.querySelector('#edit [name=role]').value = '{{ $item->role }}';
                        }">
                            <i class="mdi mdi-pen"></i>
                        </x-button>
                        <x-button size="xs" variant="danger" data-bs-toggle="modal" data-bs-target="#delete" onclick="{
                            document.querySelector('#delete').parentElement.action = '{{ url('/user/' . $item->id) }}';
                            document.querySelector('#delete .nama').innerHTML = '{{ $item->nama }}';
                        }">
                            <i class="mdi mdi-delete"></i>
                        </x-button>
                        <div class="mb-1"></div>
                        <x-button size="xs" variant="success" data-bs-toggle="modal" data-bs-target="#edit-auth" onclick="{
                            document.querySelector('#edit-auth').parentElement.action = '{{ url('/user/' . $item->id . '/auth') }}';
                            document.querySelector('#edit-auth [name=username]').value = '{{ $item->username }}';
                            document.querySelector('#edit-auth [name=password]').value = '';
                        }">
                            Autentikasi
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </x-card>

    <form action="{{ url('/user') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <x-modal id="create" title="Tambah User">
            <x-text-field label="Nama" name="nama" required placeholder="Masukkan Nama"></x-text-field>
            <x-text-field label="Alamat" name="alamat" required placeholder="Masukkan Alamat"></x-text-field>
            <x-text-field number label="Nomor Telepon" name="telepon" required placeholder="08xxxxxxxxxx"></x-text-field>
            <x-select label="Role" name="role" required>
                <option value="">- Pilih Role -</option>
                <option value="1">Admin</option>
                <option value="2">Umum</option>
            </x-select>
            <x-text-field label="Username" name="username" required placeholder="Masukkan Username"></x-text-field>
            <x-text-field type="password" label="Password" name="password" required placeholder="********"></x-text-field>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/user') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-modal id="edit" title="Edit User">
            <x-text-field label="Nama" name="nama" required placeholder="Masukkan Nama"></x-text-field>
            <x-text-field label="Alamat" name="alamat" required placeholder="Masukkan Alamat"></x-text-field>
            <x-text-field number label="Nomor Telepon" name="telepon" required placeholder="08xxxxxxxxxx"></x-text-field>
            <x-select label="Role" name="role" required>
                <option value="">- Pilih Role -</option>
                <option value="1">Admin</option>
                <option value="2">Umum</option>
            </x-select>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/user/auth') }}" method="POST">
        @method('PUT')
        @csrf
        <x-modal id="edit-auth" title="Edit Autentikasi User">
            <x-text-field label="Username" name="username" required placeholder="Masukkan Username"></x-text-field>
            <x-text-field label="Password" name="password" hint="Kosongkan jika tidak ingin mengganti password" placeholder="Masukkan Password"></x-text-field>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="primary">Simpan</x-button>
            </x-slot>
        </x-modal>
    </form>

    <form action="{{ url('/user') }}" method="POST">
        @method('DELETE')
        @csrf
        <x-modal title="Hapus User" id="delete">
            <p>Anda yakin akan menghapus <strong class="nama">user terpilih</strong>?</p>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="danger">Hapus</x-button>
            </x-slot>
        </x-modal>
    </form>
@endsection