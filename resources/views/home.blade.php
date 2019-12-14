@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
        <example-component></example-component>
                    {{-- {{ auth()->user()->roles() }} --}}
                    @foreach(auth()->user()->roles() as $rol)
{{-- {{ $rol->trole->name }} --}}
                        @if($rol->trole->name == "Master" || $rol->trole->name == "Administrador")
                            <a href="{{ route('app.schedule.index') }}">Ver Lista</a>
                        @endif
                        @if($rol->trole->name == "Docente")
                            <a href="{{ '/schedule/edit/'. Auth()->user()->id }}">Editar</a>
                        @endif
                    @endforeach
{{--                     @if(!is_null({{ $roles }}))
                    {{ $roles }}
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
