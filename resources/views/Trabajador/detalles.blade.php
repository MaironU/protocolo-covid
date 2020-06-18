@extends('layouts.app')

@section('section')
    @if($trabajadores->isEmpty())
        <div class="h-75 d-flex justify-content-center">
            <div class="w-auto d-flex flex-column justify-content-center">
                <img height="300px" src="{{asset('logos/person.svg')}}" alt="">
                <h3 class="text-center">No hay trabajadores</h3>
                <a href="{{ route('crearT') }}" class="btn btn-primary btn-block">Crear</a>
            </div>
        </div>

    @else
      <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Trabajadores</h6>
            <a href="{{ route('crearT') }}" class="btn btn-success">Crear</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                @if(session('actualizado'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>El trabajador {{session('actualizado')}} ha sido actualizado</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                @if(session('eliminado'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>El trabajador {{session('eliminado')}} ha sido eliminado</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Identificación</th>
                    <th class="text-center">Síntomas</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Edad</th>
                  <th>Identificación</th>
                  <th class="text-center">Síntomas</th>
                  <th class="text-center">Editar</th>
                  <th class="text-center">Eliminar</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($trabajadores as $trabajador)
                    <tr>
                      <td>{{$trabajador->firstname}}</td>
                      <td>{{$trabajador->lastname}}</td>
                      <td>{{$trabajador->age}}</td>
                      <td>{{$trabajador->cc}}</td>
                      <td class="text-center">
                        <a href="" class="btn btn-info">Asociar</a>
                      </td>
                      <td style="text-align: center;"><a href="{{ route('editarT', $trabajador->trabajador_id) }}" class="btn btn-warning">Editar</a></td>
                      <td style="text-align: center;">
                        <form action="{{ route('eliminarT',$trabajador->trabajador_id) }}" method="POST">
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
    @endif
@endsection