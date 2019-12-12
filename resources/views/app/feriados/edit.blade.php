@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<span class="col-md-4">			
			<b>Edición de Feriado</b>
		</span>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.feriado.update') }}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $data->id }}">
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="periodo">Fecha</span>
					<input type="date" class="form-control" name="fecha" value="{{ $data->fecha }}">
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-5">
				<div class="input-group">
					<span class="input-group-addon" id="wferiado">Descripción</span>
					<input type="text" class="form-control" name="wferiado" value="{{ $data->wferiado }}">
				</div>
			</span>
		</span>
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar modificaciones</button>
		</div>
	</form>
</div>
@endsection

