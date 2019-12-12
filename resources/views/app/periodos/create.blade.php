@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<span class="col-md-4">			
			<b>Creación de Periodos</b>
		</span>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.periodo.store') }}" method="POST">
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
			<span class="col-md-5">
				<div class="input-group">
					<span class="input-group-addon" id="periodo">Periodo</span>
					<input type="text" class="form-control" name="periodo" required="" pattern="[0-9]{4}-[0-9]{4}" maxlength="9" placeholder="20xx-20xx">
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
					<span class="input-group-addon" id="status">Status</span>
					<span class="input-group-addon" id="status">
						<select name="status" id="status">
							<option value=1>Activo</option>
							<option value=0>Inactivo</option>
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

