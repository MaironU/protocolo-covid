@extends('layouts.app')

@section('section')
    @if($sintomas->isEmpty())
        <div class="h-75 d-flex justify-content-center">
            <div class="w-auto d-flex flex-column justify-content-center">
                <img height="300px" src="{{asset('logos/sintoma.png')}}" alt="">
                <h3 class="text-center">No hay Sintomas</h3>
                <a href="{{ route('crearS') }}" class="btn btn-primary btn-block">Crear</a>
            </div>
        </div>

    @else
      <div class="card shadow mb-4 w-95">
          <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Sintomas</h6>
            <a href="{{ route('crearS') }}" class="btn btn-success">Crear</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                @if(session('actualizado'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>El Síntoma {{session('actualizado')}} ha sido actualizado</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                @if(session('eliminado'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>El Síntoma {{session('eliminado')}} ha sido eliminado</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Nombre</th>
                  <th class="text-center">Descripción</th>
                  <th class="text-center">Editar</th>
                  <th class="text-center">Eliminar</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($sintomas as $sintoma)
                    <tr>
                        <td>{{$sintoma->name}}</td>
                        @if($sintoma->descripcion == '')
                            <td class="text-center text-danger font-weight-bold">Sin descripción</td>
                        @else
                            <td class="text-center"><a href="" class="btn btn-primary" data-toggle="modal" data-target="#openmodal" onclick="verDescripcion('{{$sintoma->name}}', '{{$sintoma->descripcion}}')">Descripción</a></td>
                        @endif
                        <td class="text-center"><a href="{{ route('editarS', $sintoma->sintoma_id) }}" class="btn btn-warning">Editar</a></td>
                        <td class="text-center">
                        <form action="{{ route('eliminarS',$sintoma->sintoma_id) }}" method="POST">
                          {{ method_field('DELETE') }}
                          {!! csrf_field() !!}
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    @include('../modal')
    @endif
@endsection
