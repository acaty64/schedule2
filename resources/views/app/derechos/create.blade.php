@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			Crear derechos del docente: <b></b>
		</div>
	</div>
</div>
<div class="container">
	<form action="{{ route('app.derecho.store') }}" method="POST">
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
			<span class="col-md-3">			
				<div class="input-group">
					<span class="input-group-addon" id="periodo">Periodo</span>
					<input type="text" class="form-control" name="periodo" required="" pattern="[0-9]{4}-[0-9]{4}" maxlength="9" placeholder="20xx-20xx">
				</div>
			</span>
		</span>
		<span class="row">				
			<span class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon" id="dias">Dias</span>
					<input type="number" max="60" min="30" class="form-control" name="dias" required>
				</div>
			</span>
		</span>
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Grabar</button>
		</div>
	</form>
</div>
@endsection

