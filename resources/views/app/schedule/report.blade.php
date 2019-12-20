{{-- @extends('layouts.app') --}}
@extends((( $data['type'] == 'Screen' ) ? 'layouts.app' : 'PDF.layouts.A4_PDF' ))

@section('content')
<div class="container">
	<table>
		<thead>
			<div class='title1'>Docente: {{ $data['docente']['name'] }}</div>
		</thead>
	</table>
	<table>
		<thead>
			<div class='title2'>PERIODOS:</div>
		</thead>
	</table>
	<table>
		<thead>
			<th class='header'>Periodo</th>
			<th class='header'>Fecha Inicial</th>
			<th class='header'>Fecha Final</th>
		</thead>
		<tbody>
			@foreach($data['periodos'] as $item)
				<tr>
					<td>{{ $item['periodo'] }}</td>
					<td>{{ $item['fecha_ini'] }}</td>
					<td>{{ $item['fecha_fin'] }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<table>
		<thead>
			<div class='title2'>VACACIONES PROGRAMADAS:</div>
		</thead>
	</table>
	<table>
		<thead>
			<th class='header'>Fecha Inicial</th>
			<th class='header'>Fecha Final</th>
			<th class='header'>Días</th>
		</thead>
		<tbody>
			@foreach($data['programadas'] as $item)
				<tr>
					<td>{{ $item['fecha_ini'] }}</td>
					<td>{{ $item['fecha_fin'] }}</td>
					<td>{{ $item['dias'] }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<table>
		<thead>
			<div class='title2'>HORARIOS PROGRAMADOS:</div>
		</thead>
	</table>
	<table>
		<thead>
			<th class='header'>Semestre</th>
			<th class='header'>De:</th>
			<th class='header'>A:</th>
			<th class='header'>LUN</th>
			<th class='header'>MAR</th>
			<th class='header'>MIE</th>
			<th class='header'>JUE</th>
			<th class='header'>VIE</th>
			<th class='header'>SAB</th>
		</thead>
		<tbody>
			@foreach($data['horarios'] as $item)
				<tr>
					<td>{{ $item['semestre'] }}</td>
					<td>{{ $item['fecha_ini'] }}</td>
					<td>{{ $item['fecha_fin'] }}</td>
					<td>{{ $item['LUN'] }}</td>
					<td>{{ $item['MAR'] }}</td>
					<td>{{ $item['MIE'] }}</td>
					<td>{{ $item['JUE'] }}</td>
					<td>{{ $item['VIE'] }}</td>
					<td>{{ $item['SAB'] }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection


@section('style')
<style>
	.title1 {
		font-size: 200%;
		font-weight: bold;
	}
	.title2 {
		font-size: 150%;
		font-weight: bold;
	}
	.header {
		font-size: 125%;
		font-weight: bold;
	}
	table {
		margin-bottom: 10px;
		width: 100%;
		border-collapse: collapse;
		background-color: blue;
		color: white;
	}
	td, th {
		text-align: center;
		border: 1px solid white;
	}
</style>


@endsection