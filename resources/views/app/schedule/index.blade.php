@extends('layouts.app')

@section('content')
<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Codigo</th>
				<th scope="col">Docente</th>
				<th scope="col">Accion</th>
			</tr>
		</thead>
		<tbody>

			@foreach($data as $docente)
			<tr>
				<td>{{ $docente['id'] }}</td>
				<td>{{ $docente['cdocente'] }}</td>
				<td>{{ $docente['name'] }}</td>
				<td>
					<a class="btn btn-sm btn-primary" role="button" href="{{ route('app.schedule.edit', $docente['id'])}}">Editar</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $data->links() }}
</div>
@endsection

