@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<span class="col-md-4">			
			<b>Creación de Vacaciones Gozadas</b>
		</span>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.gozada.store') }}" method="POST">
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
					<span class="input-group-addon" id="observaciones">Observaciones</span>
					<input type="string" class="form-control" name="observaciones" required>
				</div>
			</span>
		</span>
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar</button>
		</div>
	</form>
</div>
@endsection

