@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			Programacion de vacaciones: {{ $docente['name'] }}
		</div>
		<check-component cod_doc="{{ $docente['cod_doc'] }}"></check-component>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-2">Inicio</div>
			<div class="col-md-2">Fin</div>
			<div class="col-md-1">Dias</div>
			<div class="col-md-1">Tipo</div>
		</div>


		<form action="{{ route('app.programada.store') }}" method="POST">
			{{ csrf_field() }}
			@foreach($data as $item)
				<div class="row">			
					<div class="col-md-2">					
						<input type="date" name="fini{{ $item->id }}" value="{{ $item->fecha_ini }}">
					</div>
					<div class="col-md-2">					
						<input type="date" name="ffin{{ $item->id }}" value="{{ $item->fecha_fin }}">
					</div>
					<div class="col-md-1">
						<p>{{ (new DateTime($item->fecha_fin))->diff(new DateTime($item->fecha_ini))->days + 1 }}</p>
					</div>
					<div class="col-md-2">
						<select name="select{{ $item->id }}" value="{{ $item->type }}">
							<option <?php if($item->type == 'fixed'){echo("selected ");}?> value="fixed">Fijo</option>
							<option <?php if($item->type == 'closed'){echo("selected ");}?> value="closed">Cerrado</option>
							<option <?php if($item->type == 'new'){echo("selected ");}?>value="new">Nuevo dato</option>
						</select>
					</div>					
					<div class="col-md-1">
						<button class="btn btn-sm btn-danger">Eliminar</button>
					</div>					
				</div>
			@endforeach
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-primary">Grabar modificaciones</button>
			</div>
		</form>
	</div>
@endsection

