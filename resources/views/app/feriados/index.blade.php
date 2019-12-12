@extends('layouts.app')

@section('content')
<div class="container">
	<button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url("feriado/create") }}'">Crear Nuevo</button>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<table class="table">
				<thead>
					<tr>
						<th scope="col" class="text-center">Id</th>
						<th scope="col" class="text-center">Fecha</th>
						<th scope="col" class="text-center">Feriado</th>
						<th scope="col" class="text-center" colspan="2">Acción</th>
					</tr>
				</thead>
				<tbody>
					@foreach($feriados as $item)
					<tr>
						<td class="text-center">{{ $item->id }}</td>
						<td class="text-center">{{ $item->fecha }}</td>
						<td class="text-center">{{ $item->wferiado }}</td>
						<td class="text-center"><a href="{{ route('app.feriado.edit', $item->id) }}">Editar</a></td>
						<td class="text-center"><a href="{{ route('app.feriado.destroy', $item->id) }}">Eliminar</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

