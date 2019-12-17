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
					<a class="btn btn-sm btn-primary" role="button" 
						href="{{ route('api.schedule.edit', $docente['id'])}}">Editar</a>
					<a class="btn btn-sm btn-primary" role="button" 
						href="{{ route('api.schedule.crono.show', $docente['id'])}}">Ver Crono</a>
					<a class="btn btn-sm btn-primary" role="button" 
						href="{{ route('api.schedule.crono.pdf', $docente['id'])}}">Crono PDF</a>
					<a class="btn btn-sm btn-primary" role="button" 
						href="{{ route('api.schedule.crono.download', $docente['id'])}}">Crono Download</a>
					<a class="btn btn-sm btn-primary" role="button" 
						href="{{ route('api.schedule.report.pdf', $docente['id'])}}">Reporte PDF</a>
					<a class="btn btn-sm btn-primary" role="button" 
						href="{{ route('api.schedule.report.download', $docente['id'])}}">Reporte Download</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $data->links() }}
</div>
@endsection

