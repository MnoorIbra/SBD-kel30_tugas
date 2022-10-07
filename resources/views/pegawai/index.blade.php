@extends('pegawai.layout')

@section('content')

<h4 class="mt-5">Data pegawai</h4>

<a href="{{ route('pegawai.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
{{-- <a href="{{ route('admin.index') }}" type="button" class="btn btn-primary rounded-3">Pindah ke admin</a> --}}

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID pegawai</th>
        <th>Nama Pegawai</th>
        <th>Alamat</th>
        <th>Nomer Telfon</th>
        <th>Jenis Kelamin</th>
        <th>ID Departement</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_pegawai }}</td>
                <td>{{ $data->nama_pegawai }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->no_telfon }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->id_departement }}</td>
                <td>
                    <a href="{{ route('pegawai.edit', $data->id_pegawai) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_pegawai }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_pegawai }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('pegawai.delete', $data->id_pegawai) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus $data->nama_pegawai ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
@stop
