@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<schedule-edit 
			docente_id={{$docente_id}} >
		</schedule-edit>
	</div>
</div>
@endsection
