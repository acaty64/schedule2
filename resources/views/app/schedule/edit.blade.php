@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<schedule-edit-component 
			docente_id={{$docente_id}} >
		</schedule-edit-component>
	</div>
</div>
@endsection

