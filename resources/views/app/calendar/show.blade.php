@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			Calendario del docente: <b></b>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="mes col-xs-2">
			Referencia
		</div>
		<div class="col-xs-8">
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Domingo o Feriado</title>feriado</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="gozadas"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Gozadas</title>goza</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="vacaciones"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Vacaciones</title>vacs</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="dia"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Turno Diario</title>dia</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="noche"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Turno Nocturno</title>noche</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="libre"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Día Libre</title>libre</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="habil"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>No Programado</title>NP</text>
			</svg>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="mes col-xs-2">
		</div>
		<div class="col-xs-8">
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white">DOM</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white">LUN</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white">MAR</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white">MIE</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white">JUE</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white">VIE</text>
			</svg>
			<svg width="{{ 25 }}" height="{{ 25 }}">
				<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white">SAB</text>
			</svg>
		</div>
	</div>
</div>

<div class="container">
	@foreach($data as $item)
	<div class="row">
		<div class="mes col-xs-2">
			{{ $item['mes'] }}
		</div>
		<div class="col-xs-8">
			@foreach($item['semana'] as $dia)
				<svg width="{{ 25 }}" height="{{ 25 }}">
					<rect  width="{{ 25 }}" height="{{ 25 }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="{{ $dia['status'] }}"></rect>
					<text class="texto" x="{{ 25/4 }}" y="{{ 25/5*3 }}" fill="white"><title>{{ $dia['status'] }}</title>{{ date('d',strtotime($dia['fecha'])) }}</text>
				</svg>
			@endforeach
		</div>
	</div>
	@endforeach
</div>
@endsection
@section('style')
<style>
	.texto {
		font-size: smaller;
		font-weight: bold;
	}
	#boton {
		width: 25px
	}	
	.mes {
		text-align: right;
		color: blue;
		font-style: bold;
	}	
	.blanco {
		fill: white
	}	
	.dia {
		fill: lime
	}	
	.noche {
		fill: blue
	}	
	.libre {
		fill: aqua
	}	
	.feriado {
		fill: red
	}	
	.domingo {
		fill: red
	}	
	.vacaciones {
		fill: orange
	}	
	.gozadas {
		fill: fuchsia
	}	
</style>
@endsection