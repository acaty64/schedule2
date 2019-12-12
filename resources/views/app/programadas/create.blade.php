@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<span class="col-md-4">			
			<b>Creación de Vacaciones Programadas</b>
		</span>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.programada.store') }}" method="POST">
		{{ csrf_field() }}
		<span class="row">				
			<span class="col-md-5">			
				<div class="input-group">
					<span class="input-group-addon" id="docente_id">Docente</span>
					<span class="input-group-addon" id="docente_id">
						<select name="docente_id" id="docente_id">
							@foreach($docentes as $i)
							<option value="{{ $i['id'] }}">
								{{ $i['wdocente'] }}
							</option>
							@endforeach
						</select>
					</span>
				</div>
			</span>
		</span>		
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="fecha_ini">Fecha Inicio</span>
					<input type="date" class="form-control" name="fecha_ini" required>
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="fecha_fin">Fecha Fin</span>
					<input type="date" class="form-control" name="fecha_fin" required>
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="paso">Paso</span>
					<input type="number" max=15 min=1 class="form-control" name="paso" required>
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="maximo">Maximo</span>
					<input type="number" max=30 min=1 class="form-control" name="maximo" required>
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="type">Status</span>
					<span class="input-group-addon" id="type">
						<select name="type" id="type">
							<option value='fixed'>Fijo</option>
							<option value='new'>Nuevo</option>
						</select>
					</span>
				</div>
			</span>
		</span>	
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar</button>
		</div>
	</form>
</div>
@endsection

