@extends('layouts.app')

@section('content')
<div class="container">
	<form action="{{ route('app.tmail.store') }}" method="POST">
		{{ csrf_field() }}
		<span class="row">
			<h3>Creación de moldes de correos electrónicos</h3>
			<span class="row">
				<span class="col-md-5">
					<div class="input-group">
						<span class="input-group-addon" id="name">Tipo</span>
						<input type="string" class="form-control" name="name" required>
					</div>
				</span>
			</span>
			<span class="row">
				<span class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon" id="subject">Asunto</span>
						<input type="string" class="form-control" name="subject" required>
					</div>
				</span>
			</span>
			<span class="row">
				<span class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon" id="view">Vista</span>
						<input type="hidden" name="view" value="app.mail.email.notification">
						<span class="form-control" id="view">app.mail.email.notification</span>
					</div>
				</span>
			</span>
			<span class="row">
				<span class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon" id="limit_date">Fecha Límite</span>
						<input type="date" class="form-control" name="limit_date" required>
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
