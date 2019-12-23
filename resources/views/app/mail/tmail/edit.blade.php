@extends('layouts.app')

@section('content')
<div class="container">
	<form action="{{ route('app.tmail.update') }}" method="POST">
		{{ csrf_field() }}
		<span class="row">
			<h3>Edición de molde de correos electrónicos</h3>
			<input type="hidden" name="id" value={{ $data->id }}>
			<span class="row">
				<span class="col-md-5">
					<div class="input-group">
						<span class="input-group-addon" id="name">Tipo</span>
						<input type="string" class="form-control" name="name" required value="{{ $data->name }}">
					</div>
				</span>
			</span>
			<span class="row">
				<span class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon" id="subject">Asunto</span>
						<input type="string" class="form-control" name="subject" required value="{{ $data->subject }}">
					</div>
				</span>
			</span>
			<span class="row">
				<span class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon" id="view">Vista</span>
						<input type="string" class="form-control" name="view" required value="{{ $data->view }}">
					</div>
				</span>
			</span>
			<span class="row">
				<span class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon" id="name">Fecha Límite</span>
						<input type="date" class="form-control" name="limit_date" required value="{{ $data->limit_date }}">
					</div>
				</span>
			</span>
			<span class="row">
				<span class="col-md-2">			
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-primary">Grabar</button>
					</div>
				</span>
			</span>
		</span>
	</form>
</div>
@endsection
