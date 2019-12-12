@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<b>Docente: </b>{{ $docente->wdocente }} ({{ $docente->cdocente }}) ({{ $docente->id }})
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col" class="text-center" >Id</th>
						<th scope="col" class="text-center">Periodo</th>
						<th scope="col" class="text-center">Dias</th>
						<th scope="col" class="text-center" colspan="2">Acción</th>
					</tr>
				</thead>
				<tbody>
					@foreach($derechos as $item)
					<tr>
						<td class="text-center">{{ $item->id }}</td>
						<td class="text-center">{{ $item->periodo }}</td>
						<td class="text-center">{{ $item->dias }}</td>
						<td class="text-center"><a href="{{ route('app.derecho.edit',[$docente->id, $item->id]) }}">Editar</a></td>
						<td class="text-center"><a href="{{ route('app.derecho.destroy',[$docente->id, $item->id]) }}">Eliminar</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

