@extends('Tenislayout')

@section('title')
    - Listado de Tenis
@endsection

@section('body')
    @if($msj = Session::get('success'))
        <div class="row" id="alerta">
            <div class="col-md-4 offset-md-4">
                <div class="alert alert-success">
                    <p><i class="fa-solid fa-check"></i> {{$msj}}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>COLOR</th>
                            <th>TALLA</th>
                            <th>COSTO</th>
                            <th>MARCA</th>
                            <th>CATEGORÍA</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenis as $i => $row)
                            <tr>
                                <td>{{ ($i+1) }}</td>
                                <td>{{ $row->color }}</td>
                                <td>{{ $row->talla }}</td>
                                <td>{{ $row->costo }}</td>
                                <td>{{ $row->marca ? $row->marca->marca : 'Sin marca' }}</td>
                                <td>{{ $row->categoria }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('tenis.edit', $row->id)}}">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form id="frm_{{$row->id}}" method="POST" action="{{route('tenis.destroy', $row->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button data-bs-toggle="modal" data-bs-target="#modalConfirmacion" onclick="setInfo({{$row->id}}, '{{$row->color}} - {{$row->marca ? $row->marca->marca : 'Sin marca'}}')" type="button" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modalConfirmacion">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">¿Seguro de eliminar?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p><i class="fa-solid fa-warning fs-3 text-warning"></i>
             <label id="lbl_nombre"></label>
            </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" id="btnEliminar" class="btn btn-success">Sí, eliminar</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('js')
    @vite('resources/js/Tenis/index.js')
@endsection
