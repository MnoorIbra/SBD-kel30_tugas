@extends('pegawai.layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">

            <h5 class="card-title fw-bolder mb-3">Tambah pegawai</h5>

            <form method="post" action="{{ route('pegawai.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_pegawai" class="form-label">ID Pegawai</label>
                    <input type="text" class="form-control" id="id_pegawai" name="id_pegawai">
                </div>
                <div class="mb-3">
                    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="merk" name="nama_pegawai">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="stock" name="alamat">
                </div>
                <div class="mb-3">
                    <label for="no_telfon" class="form-label">Nomer Telfon</label>
                    <input type="text" class="form-control" id="harga" name="no_telfon">
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <div class="form-group">
                        <select class="form-control" name="jenis_kelamin">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Non Binary">Non Binary</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="id_departement" class="form-label">ID Departement</label>
                    {{-- <input type="text" class="form-control" id="harga" name="id_departement"> --}}
                    <div class="form-group">
                        <select class="form-control" name="id_departement">
                            @foreach ($departements as $dp)
                                <option value="{{ $dp->id_departement }}">{{ $dp->id_departement}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop
