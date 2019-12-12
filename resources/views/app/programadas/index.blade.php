@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<b>Vacaciones Programadas del Docente: </b>{{ $docente->wdocente }} ({{ $docente->cdocente }})
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col" class="text-center">Id</th>
						<th scope="col" class="text-center">Inicio</th>
						<th scope="col" class="text-center">Fin</th>
						<th scope="col" class="text-center">Paso</th>
						<th scope="col" class="text-center">Maximo</th>
						<th scope="col" class="text-center">Tipo</th>
						<th scope="col" class="text-center" colspan="2">Acción</th>
					</tr>
				</thead>
				<tbody>
					@foreach($programadas as $item)
					<tr>
						<td class="text-center">{{ $item->id }}</td>
						<td class="text-center">{{ $item->fecha_ini }}</td>
						<td class="text-center">{{ $item->fecha_fin }}</td>
						<td class="text-center">{{ $item->paso }}</td>
						<td class="text-center">{{ $item->maximo }}</td>
						<td class="text-center">{{ $item->type }}</td>
						<td class="text-center"><a href="{{ route('app.programada.edit',[$docente->id, $item->id]) }}">Editar</a></td>
						<td class="text-center"><a href="{{ route('app.programada.destroy',[$docente->id, $item->id]) }}">Eliminar</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

