@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Lista de docentes a comunicar</h2>
	<h3>
		<div class="row"><b>Correo: </b>{{ $data['tmail']['name'] }}</div>
		<div class="row"><b>Fecha Límite: </b>{{ $data['tmail']['limit_date'] }}</div>
	</h3>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<form action="{{ route('app.email.send.notification', $data['tmail']['id']) }}" method="GET">
				{{ csrf_field() }}
				<span class="row">
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-primary">Enviar</button>
					</div>
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

