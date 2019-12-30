@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<h2>Lista de docentes a comunicar</h2>
		</div>
		<div class="form-group col-md-2">
			<a href="{{ route('app.email.index', $data['tmail']['id']) }}"><button class="btn btn-sm btn-primary">Atrás</button></a>
		</div>
	</div>
	<div class="row">
		<h3>
			<div class="row"><b>Correo: </b>{{ $data['tmail']['name'] }}</div>
			<div class="row"><b>Fecha Límite: </b>{{ $data['tmail']['limit_date'] }}</div>
		</h3>
	</div>
</div>
<div id="contenedor_carga">
	<div id="carga"></div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<form action="{{ route('app.email.send.notification', $data['tmail']['id']) }}" method="GET">
				{{ csrf_field() }}
				<span class="row">
					@if($data['chk_send']>0)
						<div class="form-group col-md-2">
							<button type="submit" class="btn btn-sm btn-primary">Enviar</button>
						</div>
					@endif
				</span>
				<table class="table">
					<thead>
						<tr>
							<th scope="col" class="text-center">Id</th>
							<th scope="col" class="text-center">Codigo</th>
							<th scope="col" class="text-center">Nombre</th>
							<th scope="col" class="text-center">Información</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data['users'] as $item)
						<tr>
							<td class="">{{ $item->id }}</td>
							<td class="">{{ $item->cdocente }}</td>
							<td class="">{{ $item->name }}</td>
							<td class="">{{ (is_null($item->send_date)) ? 'por enviar' : 'enviado'}}</td>
							<td class="">{{ substr($item->send_date,0,10) }}</td>
							<td class="">{{ (is_null($item->reply_date)) ? '' : 'respondido'}}</td>
							<td class="">{{ substr($item->reply_date,0,10) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{-- {{ $data->links() }} --}}
			</form>			
		</div>
	</div>
</div>
@endsection

@push('js')
<script>
	// https://www.youtube.com/watch?v=nq0vAO6SDlI
	window.onload = function () {
		var contenedor = document.getElementById('contenedor_carga');
		contenedor.style.visibility = 'hidden';
		contenedor.style.opacity = '0';
	}	
</script>
@endpush

@section('style')
 <style>
	*, *: after, *:before{
		margin:0;
		padding: 0;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	#contenedor_carga{
		background-color: rgba(250, 240, 245, 0.9);
		height: 100%;
		width: 100%;
		position: fixed;
		-webkit-transition: all 1s ease;
		-o-transition: all 1s ease;
		transition: all 1s ease;
		z-index: 10000;
	}

	#carga{
		border: 15px solid #ccc;
		border-top-color: #F4266A;
		border-top-style: groove;
		height: 100px;
		width: 100px;
		border-radius: 100%;

		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
		-webkit-transition: girar 1.5s linear infinite ;
		-o-transition: girar 1.5s linear infinite ;
		animation: girar 1.5s linear infinite ;
	}

	@keyframes girar {
		from { transform: rotate(0deg); }
		to { transform: rotate(360deg); }
	}

</style>
@endsection