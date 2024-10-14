@extends('Tenis.form')

@section('formName')
    Crear
@endsection

@section('action')
    action = "{{route('tenis.store')}}"
@endsection

@section('method')
    <!-- Este campo está vacío porque el método por defecto es POST -->
@endsection