@extends('layouts.admin')

@section('content')
    <x-card title="Data Keluarga">
        <div align="right" class="mb-3">
            <x-button size="sm" variant="primary" onclick="window.location = '{{ url('/keluarga/create') }}'">
                Tambah
            </x-button>
        </div>

        <x-table :headers="['Nomor KK', 'Kepala Keluarga', 'KK', 'Opsi']" data-table>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nomor_kk }}</td>
                    <td>{{ $item->kepala_keluarga->nama }}</td>
                    <td>
                        <a href="{{ $item->file_kk_url }}" target="_blank">Lihat</a>
                    </td>
                    <td align="center">
                        <x-button size="xs" variant="primary" onclick="window.location = '{{ url('/keluarga/' . $item->id) }}'">
                            <i class="mdi mdi-pen"></i>
                        </x-button>
                        <x-button size="xs" variant="danger" data-bs-toggle="modal" data-bs-target="#delete" onclick="{
                            document.querySelector('#delete').parentElement.action = '{{ url('/keluarga/' . $item->id) }}';
                            document.querySelector('#delete .nomor_kk').innerHTML = '{{ $item->nomor_kk }}';
                        }">
                            <i class="mdi mdi-delete"></i>
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </x-card>
    
    <form action="{{ url('/keluarga') }}" method="POST">
        @method('DELETE')
        @csrf
        <x-modal title="Hapus Keluarga" id="delete">
            <p>Anda yakin akan menghapus <strong class="nomor_kk">keluarga terpilih</strong>?</p>

            <x-slot name="actions">
                <x-button data-bs-dismiss="modal">Batal</x-button>
                <x-button type="submit" variant="danger">Hapus</x-button>
            </x-slot>
        </x-modal>
    </form>
@endsection