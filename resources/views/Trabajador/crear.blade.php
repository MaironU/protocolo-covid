@extends('layouts.app')

@section('section')
<div class="card shadow mb-4 w-95 size-card">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Crear Trabajador</h6>
      <a href="{{ route('detallesT') }}" class="border-bottom">Ver tarbajadores</a>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="{{ route('nuevoT') }}" method="POST" 
            class="col-sm-10 col-md-9 col-lg-8   mx-auto">
            @csrf
                @if(session('creado'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Trabajador {{session('creado')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control p-4" placeholder="Introduzca un nombre" name="firstname" value="{{old('firstname')}}">

                    @if($errors->has('firstname'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('firstname') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Apellido:</label>
                    <input type="text" class="form-control p-4" placeholder="Introduzca un apellido" name="lastname" value="{{old('lastname')}}">
                    @if($errors->has('lastname'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('lastname') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Edad:</label>
                    <input type="number" class="form-control p-4" placeholder="Introduzca un edad" name="age" value="{{old('age')}}">
                    @if($errors->has('age'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('age') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Identificación:</label>
                    <input type="number" class="form-control p-4" placeholder="Introduzca un identificación" name="cc" value="{{old('cc')}}">
                    @if($errors->has('cc'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('cc') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" class="form-control p-4" placeholder="Introduzca un email" name="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('email') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Contraseña:</label>
                    <input type="password" class="form-control p-4" placeholder="Introduzca un contrseña" name="password">
                    @if($errors->has('password'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('password') }}</p>
                    @endif	
                </div>
                <button type="submit" class="btn btn-primary btn-block btn">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection