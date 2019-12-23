@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Seleccione los docentes a comunicar</h2>
	<h3>
		<div class="row"><b>Correo: </b>{{ $data['tmail']['name'] }}</div>
		<div class="row"><b>Fecha Límite: </b>{{ $data['tmail']['limit_date'] }}</div>
	</h3>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<form action="{{ route('app.email.store') }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" value="{{ $data['tmail'] }}" name='tmail'>
				<span class="row">
						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary">Grabar</button>
						</div>
				</span>
				<table class="table">
					<thead>
						<tr>
							<th scope="col" class="text-center">Id</th>
							<th scope="col" class="text-center">Codigo</th>
							<th scope="col" class="text-center">Nombre</th>
							<th scope="col" class="text-center" colspan="2">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data['users'] as $item)
						<tr>
							<td class="">{{ $item->id }}</td>
							<td class="">{{ $item->cdocente }}</td>
							<td class="">{{ $item->name }}</td>
							<td>
								<input type="checkbox" name="chk[{{ $item->id }}]" ><br>
							</td>
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

