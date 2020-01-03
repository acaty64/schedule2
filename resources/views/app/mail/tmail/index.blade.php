@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<b>Lista de Envíos Masivos: </b>
			<div class="form-group">
				<a href="{{ route('app.tmail.create') }}">
					<button id="btnCreate" class="btn btn-sm btn-primary">Nuevo</button>
				</a>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col" class="text-center">Id</th>
						<th scope="col" class="text-center">Asunto</th>
						<th scope="col" class="text-center">Vista</th>
						<th scope="col" class="text-center">Fecha Límite</th>
						<th scope="col" class="text-center" colspan="2">Acción</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $item)
					<tr>
						<td class="text-center">{{ $item->id }}</td>
						<td class="text-center">{{ $item->subject }}</td>
						<td class="text-center">{{ $item->view }}</td>
						<td class="text-center">{{ $item->limit_date }}</td>
						<td class="text-center"><a href="{{ route('app.email.index', $item->id) }}">Correos</a></td>
						<td class="text-center"><a href="{{ route('app.tmail.edit', $item->id) }}">Editar</a></td>
						<td class="text-center"><a href="{{ route('app.tmail.destroy', $item->id) }}">Eliminar</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $data->links() }}
		</div>
	</div>
</div>
@endsection

