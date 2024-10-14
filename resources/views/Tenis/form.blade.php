@extends('Tenislayout')

@section('title')
- @yield('formName')
@endsection

@section('body')
@if($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <p><b><i class="fa-solid fa-times"></i> Errores </b></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">@yield('formName')</div>
                <div class="card-body">
                    <form @yield('action') method="POST">
                        @yield('method')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-copyright"></i></span>
                            <input type="text" name="color" class="form-control" placeholder="Color" 
                             @isset($teni) value="{{$teni->color}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-ruler"></i></span>
                            <input type="number" name="talla" class="form-control" placeholder="Talla" 
                             @isset($teni) value="{{$teni->talla}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-money-bill"></i></span>
                            <input type="number" name="costo" class="form-control" placeholder="Costo" 
                             @isset($teni) value="{{$teni->costo}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-tag"></i></span>
                            <input type="text" name="categoria" class="form-control" placeholder="Categoría" 
                             @isset($teni) value="{{$teni->categoria}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-industry"></i></span>
                            <select name="marca_id" class="form-control" required>
                                <option value="" disabled selected>Seleccione una marca</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}"
                                        @isset($teni)
                                            @if($teni->marca_id == $marca->id) selected @endif
                                        @endisset>
                                        {{ $marca->marca }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-success" type="submit"> Guardar </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
