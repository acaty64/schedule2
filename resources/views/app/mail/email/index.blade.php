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
				<input type="hidden" value="{{ $data['tmail']['id'] }}" name='tmail_id'>
				<span class="row">
						<div class="form-group">
							<button id="btnSave" type="submit" class="btn btn-sm btn-primary">Grabar</button>
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
								@if($item->reply == 'on')
									respondido
								@else
									@if($item->sended == 'on')
										enviado
									@else
										@if($item->chk == 'on')
											seleccionado
										@else
											por seleccionar
										@endif
									@endif
								@endif
							</td>
							<td>
								<input type="checkbox" 
									name="chk[{{ $item->id }}]" 
									value="{{ $item->chk }}" 
									{{ ($item->chk == 'on') ? 'checked' : '' }} 
									{{ ($item->sended == 'on') ? 'disabled' : '' }}>
								<br>
							</td>
							<td>
								<input type="checkbox" 
									name="sended[{{ $item->id }}]" 
									value="{{ $item->sended }}"
									{{ ($item->sended == 'on') ? 'checked' : '' }} 
									{{ ($item->chk == 'on') ? 'disabled' : '' }} 
									{{ ($item->chk == 'off') ? 'disabled' : '' }} 
									{{ ($item->sended == 'on') ? 'disabled' : '' }}>
								<br>
							</td>
							<td>
								<input type="checkbox" 
									name="reply[{{ $item->id }}]" 
									value="{{ $item->reply }}"
									{{ ($item->reply == 'on') ? 'checked' : '' }}  disabled="disabled">
								<br>
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

