@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<span class="col-md-4">			
			<b>Edición de Derechos por Periodo: </b>{{ $docente['wdocente'] }} ({{ $docente['cdocente'] }})
		</span>
		<span class="col-md-4">			
			Verificacion: <check-component cod_doc="{{ $docente['id'] }}"></check-component>
		</span>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.derecho.update') }}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $data->id }}">
		<input type="hidden" name="cdocente" value="{{ $docente['cdocente'] }}">
		<span class="row">				
			<span class="col-md-3">			
				<div class="input-group">
					<span class="input-group-addon" id="periodo">Periodo</span>
					<input type="text" class="form-control" name="periodo" value="{{ $data->periodo }}">
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="dias">Dias</span>
					<input type="text" class="form-control" name="dias" value="{{ $data->dias }}">
				</div>
			</span>
		</span>
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar modificaciones</button>
		</div>
	</form>
</div>
@endsection

