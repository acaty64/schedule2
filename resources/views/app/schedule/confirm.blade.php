@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		Docente: <b>{{ $data['user']['wdocente'] }}</b>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col col-md-5">Verifique su cronograma de horarios y reporte resumen.</div>
		<div class="col col-md-2">
			<a href="{{ route('schedule.crono.show', $data['user']['id']) }}" target="_blank"><button>Cronograma</button></a>
		</div>
		<div class="col col-md-2">
			<a href="{{ route('schedule.report.show' , $data['user']['id']) }}" target="_blank"><button>Reporte</button></a>
		</div>
	</div>
	<br>
	<div class="row">
		<p>Su programación de vacaciones será confirmada por la Dirección de Recursos Humanos.</p>
	</div>
	<div class="row">
		<div class="col col-md-5">Envíe su confirmación por correo electrónico.</div>
		<div class="col col-md-2">
			<a href="{{ route('email.confirm.send', ['tmail_id'=>$data['tmail_id'] ,'docente_id'=>$data['user']['id']]) }}"><button>Enviar Confirmación</button></a>
		</div>
	</div>
</div>
<br>
<div class="container">
	El envío de confirmación enviará un correo con el siguiente cuerpo.
	<br>
	<embed src="{{$data['file_pdf']}}" width="800" height="500">
</div>

@endsection
