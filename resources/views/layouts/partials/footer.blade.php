<div class="container">
<div class="row">
	<span  class="nav navbar-nav list-group-item list-inline" style="color:blue; font-size:75%">
		<div>Universidad Católica Sedes Sapientiae</div>
		<div>Facultad de Ciencias Económicas y Comerciales</div>
		<div>Tfno. 533-0008 anexo 250</div>
	</span>	
	@if(env('APP_ENV')=='local')
		<span  class="nav navbar-nav list-group-item list-inline" style="color:blue; font-size:75%">
			<div>Laravel v6.0</div>
			<div>Vue js v2.5</div>
			<div>Vuex v3.1</div>
		</span>	
	    <div class="nav navbar-nav list-group-item list-inline" id="userType" style="color:red; font-size:75%">
	    	<div>ID de usuario: {{ \Auth::user()->id }}</div>
	    	<div>Tipo de usuario: {{ \Session::get('rol') }}</div>
		</div>
	@endif
</div>