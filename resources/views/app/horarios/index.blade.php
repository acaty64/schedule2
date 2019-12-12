@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<b>Horarios del Docente: </b>{{ $docente->wdocente }} ({{ $docente->cdocente }})
	</div>
	<br>
	<div class="row">
		<b>
			<div class="col-md-1">Semestre</div>
			<div class="col-md-1 text-center">LUN</div>
			<div class="col-md-1 text-center">MAR</div>
			<div class="col-md-1 text-center">MIE</div>
			<div class="col-md-1 text-center">JUE</div>
			<div class="col-md-1 text-center">VIE</div>
			<div class="col-md-1 text-center">SAB</div>
			<div class="col-md-2 text-center">Acción</div>
		</b>
	</div>

	@foreach($data as $item)
	<div class="row">
		<div class="col-md-1 text-center">{{ $item['semestre'] }}</div>
		<div class="col-md-1 text-center">{{ $item['LUN'] }}</div>
		<div class="col-md-1 text-center">{{ $item['MAR'] }}</div>
		<div class="col-md-1 text-center">{{ $item['MIE'] }}</div>
		<div class="col-md-1 text-center">{{ $item['JUE'] }}</div>
		<div class="col-md-1 text-center">{{ $item['VIE'] }}</div>
		<div class="col-md-1 text-center">{{ $item['SAB'] }}</div>
		<div class="col-md-1 text-center">
			<a href="{{ route('app.horario.edit',[$docente->id, $item['semestre']]) }}">Editar</a>
		</div>
		<div class="col-md-1">
			<a href="{{ route('app.horario.destroy',[$docente->id, $item['semestre']]) }}">Eliminar</a>
		</div>
	</div>
	<br>
	@endforeach
</div>
@endsection

