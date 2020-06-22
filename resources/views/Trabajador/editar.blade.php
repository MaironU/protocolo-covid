@extends('layouts.app')

@section('section')

<div class="card shadow mb-4 w-95 size-card">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Editar Trabajador</h6>
      <a href="{{ route('detallesT') }}" class="border-bottom">Ver tarbajadores</a>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="{{ route('actualizarT', $trabajador->trabajador_id) }}" method="POST" 
            class="col-sm-10 col-md-9 col-lg-8 mx-auto">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control p-4" placeholder="Nombre" name="firstname" value="{{$trabajador->firstname}}">

                    @if($errors->has('firstname'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('firstname') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Apellido:</label>
                    <input type="text" class="form-control p-4" placeholder="Apellido" name="lastname" value="{{$trabajador->lastname}}">
                    @if($errors->has('lastname'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('lastname') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Edad:</label>
                    <input type="number" class="form-control p-4" placeholder="Edad" name="age" value="{{$trabajador->age}}">
                    @if($errors->has('age'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('age') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Identificación:</label>
                    <input type="number" class="form-control p-4" placeholder="Identificación" name="cc" value="{{$trabajador->cc}}">
                    @if($errors->has('cc'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('cc') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" class="form-control p-4" placeholder="Email" name="email" value="{{$trabajador->email}}">
                    @if($errors->has('email'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('email') }}</p>
                    @endif	
                </div>
                <button type="submit" class="btn btn-primary btn-block btn">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection