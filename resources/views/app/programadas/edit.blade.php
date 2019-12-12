@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<span class="col-md-4">			
			<b>Edición de Vacaciones Programadas</b>
		</span>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.programada.update') }}" method="POST">
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
					<span class="input-group-addon" id="paso">Paso</span>
					<input class="form-control" type="number" id="paso" name="paso" value="{{ $data->paso }}">
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="maximo">Maximo</span>
					<input class="form-control" type="number" id="maximo" name="maximo" value="{{ $data->maximo }}">
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="type">Tipo</span>
					<span class="form-control" id="type">
						<select name="type" id="type">
							<option value='fixed'
								@if($data->type == 'fixed')
									selected 
								@endif>Fijo</option>
							<option value='new'
								@if($data->type == 'new')
									selected 
								@endif>Nuevo</option>
						</select>
					</span>
				</div>
			</span>
		</span>
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar modificaciones</button>
		</div>
	</form>
</div>
@endsection

