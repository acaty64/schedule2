@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<b>Crear horario</b>
		</div>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.horario.store') }}" method="POST">
		{{ csrf_field() }}
		<span class="row">				
			<span class="col-md-5">			
				<div class="input-group">
					<span class="input-group-addon" id="docente">Docente</span>
					<span class="input-group-addon" id="docente">
						<select name="docente" id="docente">
							@foreach($docentes as $i)
							<option value="{{ $i['id'] }}">
								{{ $i['wdocente'] }}
							</option>
							@endforeach
						</select>
					</span>
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">			
				<div class="input-group">
					<span class="input-group-addon" id="semestre">Semestre</span>
					<span class="input-group-addon" id="semestre">
						<select name="semestre" id="semestre">
							@foreach($semestres as $s)
							<option value="{{ $s['semestre'] }}">
								{{ $s['semestre'] }}
							</option>
							@endforeach
						</select>
					</span>
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="lun">LUN</span>
					<span class="input-group-addon" id="lun">
						<select name="LUN" id="lun">
							<option value="none">Libre</option>
							<option value="dia">Diurno</option>
							<option value="noche">Nocturno</option>
							<option value="vacaciones">Vacaciones</option>
						</select>
					</span>
				</div>
			</span>
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="mar">MAR</span>
					<span class="input-group-addon" id="mar">
						<select name="MAR" id="mar">
							<option value="none">Libre</option>
							<option value="dia">Diurno</option>
							<option value="noche">Nocturno</option>
							<option value="vacaciones">Vacaciones</option>
						</select>
					</span>
				</div>
			</span>
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="mie">MIE</span>
					<span class="input-group-addon" id="mie">
						<select name="MIE" id="mie">
							<option value="none">Libre</option>
							<option value="dia">Diurno</option>
							<option value="noche">Nocturno</option>
							<option value="vacaciones">Vacaciones</option>
						</select>
					</span>
				</div>
			</span>
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="jue">JUE</span>
					<span class="input-group-addon" id="jue">
						<select name="JUE" id="jue">
							<option value="none">Libre</option>
							<option value="dia">Diurno</option>
							<option value="noche">Nocturno</option>
							<option value="vacaciones">Vacaciones</option>
						</select>
					</span>
				</div>
			</span>
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="vie">VIE</span>
					<span class="input-group-addon" id="vie">
						<select name="VIE" id="vie">
							<option value="none">Libre</option>
							<option value="dia">Diurno</option>
							<option value="noche">Nocturno</option>
							<option value="vacaciones">Vacaciones</option>
						</select>
					</span>
				</div>
			</span>
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="sab">SAB</span>
					<span class="input-group-addon" id="sab">
						<select name="SAB" id="sab">
							<option value="none">Libre</option>
							<option value="dia">Diurno</option>
							<option value="noche">Nocturno</option>
							<option value="vacaciones">Vacaciones</option>
						</select>
					</span>
				</div>
			</span>
		</span>
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar</button>
		</div>
	</form>
</div>
@endsection

