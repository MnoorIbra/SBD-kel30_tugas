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

        <h5 class="card-title fw-bolder mb-3">Tambah departement</h5>

		<form method="post" action="{{ route('departement.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_departement" class="form-label">ID departement</label>
                <input type="text" class="form-control" id="id_departement" name="id_departement">
            </div>
			<div class="mb-3">
                <label for="nama_departement" class="form-label">Nama departement</label>
                <input type="text" class="form-control" id="merk" name="nama_departement">
            </div>
           


			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
