@extends('Tenis.form')

@section('formName')
    Editar a <b> {{$teni->color}} </b>
@endsection

@section('action')
    action = "{{route('tenis.update', $teni)}}"
@endsection

@section('method')
    @method('PUT')
@endsection
