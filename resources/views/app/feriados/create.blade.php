@extends('layouts.app')

@section('content')
<div class="container">
	<form action="{{ route('app.holiday.store') }}" method="POST">
		{{ csrf_field() }}
		<span class="row">
			<h3>Creación de feriados predeterminados</h3>
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="year">Año</span>
					<input type="number" class="form-control" min="2020" max="2050" name="year" required>
				</div>
			</span>
			<span class="col-md-2">			
				<div class="form-group">
					<button type="submit" class="btn btn-sm btn-primary">Generar</button>
				</div>
			</span>
		</span>
	</form>
</div>
<div class="container">
	<h3>Creación de feriados adicionales (Semana Santa y otros)</h3>
	<form action="{{ route('app.feriado.store') }}" method="POST">
		{{ csrf_field() }}
		<span class="row">				
			<span class="col-md-3">			
				<div class="input-group">
					<span class="input-group-addon" id="fecha">Fecha</span>
					<input type="date" class="form-control" name="fecha" required>
				</div>
			</span>
			<span class="col-md-2">			
				<div class="form-group">
					<button type="submit" class="btn btn-sm btn-primary">Grabar</button>
				</div>
			</span>
		</span>
		<span class="row">
			<span class="col-md-5">
				<div class="input-group">
					<span class="input-group-addon" id="wferiado">Descripción</span>
					<input type="text" class="form-control" name="wferiado" required>
				</div>
			</span>
		</span>
	</form>
</div>
@endsection
