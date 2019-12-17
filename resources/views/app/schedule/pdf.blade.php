@extends('PDF.layouts.A4_PDF')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			Calendario del docente: <b>{{ $data['docente']['wdocente'] }}</b>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="mes col-xs-2">
			Leyenda
		</div>
		<div class="col-xs-8">
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Domingo o Feriado</title>feriado</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="gozadas"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Gozadas</title>gozada</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="vacaciones"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Vacaciones</title>vacacs</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="dia"></rect>
				<text class="texto" x="{{ $data['param']['width']/4 }}" y="{{ 25/5*3 }}" fill="white"><title>Turno Diario</title>dia</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="noche"></rect>
				<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white"><title>Turno Nocturno</title>noche</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="libre"></rect>
				<text class="texto" x="{{ $data['param']['width']/4 }}" y="{{ 25/5*3 }}" fill="white"><title>Día Libre</title>libre</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="habil"></rect>
				<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>No Programado</title>No Prog.</text>
			</svg>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="mes col-xs-2">
		</div>
		<div class="col-xs-8">
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">DOM</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">LUN</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">MAR</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">MIE</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">JUE</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">VIE</text>
			</svg>
			<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
				<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
				<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">SAB</text>
			</svg>
		</div>
	</div>
</div>

<div class="container">
	@foreach($data['data'] as $data['item'])
	<div class="row">
		<div class="mes col-xs-2">
			{{ $data['item']['mes'] }}
		</div>
		<div class="col-xs-8">
			@foreach($data['item']['semana'] as $data['dia'])
				<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
					<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="{{ $data['dia']['status'] }}"></rect>
					<text class="texto" x="{{ $data['param']['width']/3 }}" y="{{ 25/5*3 }}" fill="white"><title>{{ $data['dia']['status'] }}</title>{{ date('d',strtotime($data['dia']['fecha'])) }}</text>
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