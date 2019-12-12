@extends('layouts.app')

@section('content')
  <div class="container">
  	<div class="col-md-10">
	    <div class="row row1">
	    	<div class="col-md-8">
		    	<div class="col-md-1">codigo</div>
		    	<div class="col-md-5">docente</div>
		    	<div class="col-md-2">periodo</div>
		    	<div class="col-md-1">gana<br>das</div>
		    	<div class="col-md-1">pendi<br>entes</div>
		    	<div class="col-md-2">limite</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="col-md-8">programado</div>
	    		<div class="col-md-4">dias</div>
				</div>
	    </div>
    </div>
    @foreach($data as $item)
    	<div class="col-md-10">
		    <div class="row row1">
		    	<div class="col-md-8">
			    	<div class="col-md-1">{{ $item->cod_doc }}</div>
			    	<div class="col-md-5">{{ $item->name }}</div>
			    	<div class="col-md-2">{{ $item->periodo->periodo }}</div>
			    	<div class="col-md-1">{{ $item->ganada['dias'] }}</div>
			    	<div class="col-md-1">{{ $item->pendientes }}</div>
			    	<div class="col-md-2">{{ $item->rango->fecha_fin }}</div>
		    	</div>
		    	<div class="col-md-4">
			    	@foreach($item->programadas as $item2)
				    	<div class="row">
				    		<div class="col-md-4">{{ $item2->fecha_ini }}</div>
				    		<div class="col-md-4">{{ $item2->fecha_fin }}</div>
				    		<div class="col-md-4">{{ $item2->dias }}</div>
				    	</div>
						@endforeach
					</div>
		    </div>
	    </div>
		@endforeach
  </div>
@endsection

@section('style')
<style>
	.row1 {
		border-bottom-style: solid;
	}
</style>
@endsection
