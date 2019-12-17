@extends((( $data['type'] == 'Screen' ) ? 'layouts.app' : 'PDF.layouts.A4_PDF' ))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			Cronograma del docente: <b>{{ $data['docente']['wdocente'] }}</b>
		</div>
	</div>
</div>
<br>
<div class="container">
	<table>
		<thead>
		</thead>
		<tbody>
			<td>
				<svg width="{{ $data['param']['width'] * 1.2 }}" height="{{ $data['param']['height'] }}">
					<rect width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="mes"></rect>
					<text class="texto" x="0" y="{{ 25/5*3 }}" fill="black"><title></title>Leyenda</text>
				</svg>
			</td>
			<td>
				<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
					<rect width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
					<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Domingo o Feriado</title>feriado</text>
				</svg>
			</td>
			<td>
				<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
					<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="gozadas"></rect>
					<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Gozadas</title>gozada</text>
				</svg>
			</td>
			<td>
				<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
					<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="vacaciones"></rect>
					<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>Vacaciones</title>vacacs</text>
				</svg>
			</td>
			<td>
				<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
					<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="dia"></rect>
					<text class="texto" x="{{ $data['param']['width']/4 }}" y="{{ 25/5*3 }}" fill="white"><title>Turno Diario</title>dia</text>
				</svg>
			</td>
			<td>
				<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
					<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="noche"></rect>
					<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white"><title>Turno Nocturno</title>noche</text>
				</svg>
			</td>
			<td>
				<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
					<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="libre"></rect>
					<text class="texto" x="{{ $data['param']['width']/4 }}" y="{{ 25/5*3 }}" fill="white"><title>Día Libre</title>libre</text>
				</svg>
			</td>
			<td>
				<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
					<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="habil"></rect>
					<text class="texto" x="0" y="{{ 25/5*3 }}" fill="white"><title>No Programado</title>No Prog.</text>
				</svg>
			</td>
			<tr>
				<td>
					<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
						<rect width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="mes"></rect>
						<text class="texto" x="0" y="{{ 25/5*3 }}" fill="black"><title></title>Días</text>
					</svg>
				</td>
				<td>
					<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
						<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
						<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">DOM</text>
					</svg>
				</td>
				<td>
					<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
						<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
						<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">LUN</text>
					</svg>
				</td>
				<td>
					<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
						<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
						<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">MAR</text>
					</svg>
				</td>
				<td>
					<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
						<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
						<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">MIE</text>
					</svg>
				</td>
				<td>
					<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
						<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
						<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">JUE</text>
					</svg>
				</td>
				<td>
					<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
						<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
						<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">VIE</text>
					</svg>
				</td>
				<td>
					<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
						<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="feriado"></rect>
						<text class="texto" x="{{ $data['param']['width']/5 }}" y="{{ 25/5*3 }}" fill="white">SAB</text>
					</svg>
				</td>
			</tr>

			@foreach($data['data'] as $data['item'])
				<tr>
					<td>
						<svg width="{{ $data['param']['width'] * 1.2 }}" 
									height="{{ $data['param']['height'] }}">
							<rect width="{{ $data['param']['width'] }}" 
										height="{{ $data['param']['height'] }}" 
										rx="{{ 25/5 }}" ry="{{ 25/5 }}" 
										class="mes">
							</rect>
							<text class="texto" x="0" y="{{ 25/5*3 }}" fill="black">
								<title></title>{{ $data['item']['mes'] }}
							</text>
						</svg>
					</td>
					@foreach($data['item']['semana'] as $data['dia'])
						<td>
							<svg width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}">
								<rect  width="{{ $data['param']['width'] }}" height="{{ $data['param']['height'] }}" rx="{{ 25/5 }}" ry="{{ 25/5 }}" class="{{ $data['dia']['status'] }}"></rect>
								<text class="texto" x="{{ $data['param']['width']/3 }}" y="{{ 25/5*3 }}" fill="white"><title>{{ $data['dia']['status'] }}</title>{{ date('d',strtotime($data['dia']['fecha'])) }}</text>
							</svg>
						</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
@section('style')
<style>
	th {
		width: 60px
	}
	td {
		width: 60px;
	}
	.texto {
		font-size: smaller;
		font-weight: bold;
	}
	#boton {
		width: 25px
	}	
	.mes {
		/*text-align: center;*/
		/*color: black;*/
		/*font-style: bold;*/
		fill: white;
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