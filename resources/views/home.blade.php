@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    {{-- {{ auth()->user()->roles() }} --}}
                    @foreach(auth()->user()->roles() as $rol)
{{-- {{ $rol->trole->name }} --}}
                        @if($rol->trole->name == "Master" || $rol->trole->name == "Administrador")
                            <a href="route('/schedule/index')">Ver Lista</a>
                        @endif
                        @if($rol->trole->name == "Docente")
                            <a href="route('/schedule/edit/'.{{ Auth()->user()->id }})">Editar</a>
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
