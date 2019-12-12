@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table table-striped">		
			<div class="row">
				<div class="col-md-5">
					Vacaciones Gozadas: <b>{{ $docente['name'] }}</b>
				</div>
				<div class="col-md-2">
					<a href="{{ route('app.gozada.create', $docente['cod_doc']) }}" class="btn btn-sm btn-primary">Agregar</a>
				</div>
			</div>
			<thead>
				<th class="col-md-1">Id</th>
				<th class="col-md-2">Inicio</th>
				<th class="col-md-1">Dias</th>
				<th class="col-md-2">Fin</th>
				<th class="col-md-1">Observaciones</th>
			</thead>
			<tbody>
				@foreach ($data as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->fecha_ini }}</td>
						<td>{{ $item->dias }}</td>
						<td>{{ $item->fecha_fin }}</td>
						<td>{{ $item->observaciones }}</td>
						<div class="col-md-2">
						<td>
							<a href="{{ route('app.gozada.edit', [$docente['cod_doc'], $item->id]) }}" class="btn btn-sm btn-success">Modificar</a>
							<a href="{{ route('app.gozada.destroy', [$docente['cod_doc'], $item->id]) }}" class="btn btn-sm btn-danger">Eliminar</a>							
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

