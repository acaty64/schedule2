@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Bienvenido</div>
        <div class="panel-body">
{{--           @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif --}}
          {{-- @foreach(auth()->user()->roles() as $rol) --}}
            {{-- @if($rol->trole->acronym == "master" || $rol->trole->acronym == "admin") --}}
{{--               Acceda a su programación de vacaciones y horarios en el siguiente enlace:
              <a href="{{ '/schedule/edit/'. Auth()->user()->id }}">
                <button>Acceso</button>
              </a> --}}
              <div>
                <a href="{{ route('app.schedule.index') }}"><button>Lista de Docentes</button></a>
              </div>
              <br>
              <div>
                <a href="{{ route('app.tmail.index') }}"><button>Correos Masivos</button></a>
              </div>
            {{-- @endif --}}
{{--             @if($rol->trole->acronym == "doc")
              Bienvenido, acceda a su programación de vacaciones y horarios en el siguiente enlace:
              <a href="{{ '/schedule/edit/'. Auth()->user()->id }}">
                <button>Docente</button>
              </a>
            @endif --}}
          {{-- @endforeach --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
