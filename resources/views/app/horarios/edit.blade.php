@extends('layouts.app')

@section('content')
<div class="container">
{{ $data['semestre'] }}
	<div class="row">
		<div class="col-md-5">
			<b>Editar Horarios de Docente: </b>{{ $docente->wdocente }} ({{ $docente->cdocente }})
		</div>
	</div>
</div>
<div class="container">

	<form action="{{ route('app.horario.update') }}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="docente_id" value="{{ $docente->id }}">
		<input type="hidden" name="semestre" value="{{ $data['semestre'] }}">
		<span>				
			<span class="row">				
				<span class="col-md-2">			
					<div class="input-group">
						<span class="input-group-addon" id="semestre">Semestre</span>
						<span class="input-group-addon" id="semestre">
							<p><b>{{ $data['semestre'] }}</b></p>
						</span>
					</div>
				</span>
			</span>
			<span class="row">				
				@foreach($semana as $dia)
					<span class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon" id={{ $dia }}>{{ $dia }}</span>
							<span class="input-group-addon" id={{ $dia }}>
								<select name={{ $dia }} id={{ $dia }} value={{ $dia }}>
									<option value="libre" 
										@if($data[$dia] == "libre")
											selected 
										@endif>
									Libre</option>
									<option value="dia"
										@if($data[$dia] == "dia")
											selected 
										@endif>
									Diurno</option>
									<option value="noche"
										@if($data[$dia] == "noche")
											selected 
										@endif>
									Nocturno</option>
									<option value="vacaciones"
										@if($data[$dia] == "vacaciones")
											selected 
										@endif>
									Vacaciones</option>
								</select>
							</span>
						</div>
					</span>
				@endforeach
		</span>
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar</button>
		</div>
	</form>
</div>
@endsection

