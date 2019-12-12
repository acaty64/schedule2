@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<span class="col-md-4">			
			<b>Edición de Vacaciones Gozadas</b>
		</span>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.gozada.update') }}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $data->id }}">
		<input type="hidden" name="docente_id" value="{{ $docente->id }}">
		<span class="row">				
			<span class="col-md-5">			
				<div class="input-group">
					<span class="input-group-addon" id="periodo">Docente</span>
					<span class="form-control" id="periodo"><p>{{ $wdocente }}</p></span>
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="fecha_ini">Inicio</span>
					<input type="date" class="form-control" name="fecha_ini" value="{{ $data->fecha_ini }}">
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="fecha_fin">Fin</span>
					<input type="date" class="form-control" name="fecha_fin" value="{{ $data->fecha_fin }}">
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="observaciones">Observaciones</span>
					<input type="text" name="observaciones" value="{{ $data->observaciones }}" size="100">
				</div>
			</span>
		</span>
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar modificaciones</button>
		</div>
	</form>
</div>
@endsection

