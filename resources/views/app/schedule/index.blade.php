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
					<a role="button"
						class="btn btn-sm btn-success glyphicon glyphicon-pencil" 
						href="{{ route('app.schedule.edit', $docente['id'])}}" 
						title="Editar Cronograma"></a>
					
					<a role="button" 
						class="btn btn-sm btn-info glyphicon glyphicon-calendar" 
						href="{{ route('api.schedule.crono.show', $docente['id'])}}" 
						title="Ver Cronograma">Ver</a>
					<a role="button" 
						class="btn btn-sm btn-primary glyphicon glyphicon-show" 
						href="{{ route('api.schedule.crono.pdf', $docente['id'])}}" 
						title="Ver en PDF">Crono</a>
					<a role="button" 
						class="btn btn-sm btn-success glyphicon glyphicon-download" 
						href="{{ route('api.schedule.crono.download', $docente['id'])}}" 
						title="Descargar PDF">Crono</a>

					<a role="button" 
						class="btn btn-sm btn-info glyphicon glyphicon-list" 
						href="{{ route('api.schedule.report.show', $docente['id'])}}"
						title="Ver reporte">Ver</a>
					<a role="button" 
						class="btn btn-sm btn-primary glyphicon glyphicon-show" 
						href="{{ route('api.schedule.report.pdf', $docente['id'])}}"
						title="Ver PDF">Reporte</a>
					<a role="button" 
						class="btn btn-sm btn-success glyphicon glyphicon-download" 
						href="{{ route('api.schedule.report.download', $docente['id'])}}"
						title="Descargar PDF">Reporte</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $data->links() }}
</div>
@endsection

@section('style')
<style>
	.glyphicon-show {
		display:inline-block;
		width:60px;
		height:30px;
		text-align:center;
		font-size:12px;
		border:1px solid #007095;
		border-radius:5px;
		cursor:pointer;
		color:white;
		padding:5px 0 5px 20px;
		background-image: url('/icons/pdf.svg');
		background-repeat:no-repeat;
		
	    background-size:20px 20px;
		background-position:10px 5px;	
		background-color:#008CBA;
	}
</style>

@endsection