@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<b>Periodos del Docente: </b>{{ $docente->wdocente }} ({{ $docente->cdocente }})
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col" class="text-center">Id</th>
						<th scope="col" class="text-center">Periodo</th>
						<th scope="col" class="text-center">Inicio</th>
						<th scope="col" class="text-center">Fin</th>
						<th scope="col" class="text-center">Status</th>
						<th scope="col" class="text-center" colspan="2">Accion</th>
					</tr>
				</thead>
				<tbody>
					@foreach($periodos as $item)
					<tr>
						<td class="text-center">{{ $item->id }}</td>
						<td class="text-center">{{ $item->periodo }}</td>
						<td class="text-center">{{ $item->fecha_ini }}</td>
						<td class="text-center">{{ $item->fecha_fin }}</td>
						<td class="text-center">{{ $item->status }}</td>
						<td class="text-center"><a href="{{ route('app.periodo.edit',[$docente->id, $item->id]) }}">Editar</a></td>
						<td class="text-center"><a href="{{ route('app.periodo.destroy',[$docente->id, $item->id]) }}">Eliminar</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

