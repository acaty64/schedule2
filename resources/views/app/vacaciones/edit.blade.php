@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
<vacaciones-edit-component cod_doc={{$cod_doc}} ></vacaciones-edit-component>
        </div>
    </div>
@endsection

