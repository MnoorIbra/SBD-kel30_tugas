@extends('departement.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data departement{{ $data->id_departement }}</h5>

		<form method="post" action="{{ route('departement.update', $data->id_departement) }}">
			@csrf
            <div class="mb-3">
                <label for="id_departement" class="form-label">ID departement</label>
                <input type="text" class="form-control" id="id_departement" name="id_departement" value="{{ $data->id_departement }}">
            </div>
			<div class="mb-3">
                <label for="nama_departement" class="form-label">Nama departement</label>
                <input type="text" class="form-control" id="nama_departement" name="nama_departement" value="{{ $data->nama_departement }}">
            </div>


			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
