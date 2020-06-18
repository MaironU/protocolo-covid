@extends('layouts.app')

@section('section')
    <div class="row">
        <a href="{{ route('detallesT') }}" class="w-100 text-right">Ver trabajadores</a>
        <h3 class="text-center mb-4 col-lg-12 mt-3">Crear trabajador</h3>
        <form action="{{ route('nuevoT') }}" method="POST" 
        class="col-sm-9 col-md-8 col-lg-6 mx-auto">
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
                <input type="text" class="form-control p-4" placeholder="Nombre" name="firstname" value="{{old('firstname')}}">

                @if($errors->has('firstname'))
                    <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('firstname') }}</p>
                @endif	
            </div>
            <div class="form-group">
                <label for="">Apellido:</label>
                <input type="text" class="form-control p-4" placeholder="Apellido" name="lastname" value="{{old('lastname')}}">
                @if($errors->has('lastname'))
                    <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('lastname') }}</p>
                @endif	
            </div>
            <div class="form-group">
                <label for="">Edad:</label>
                <input type="number" class="form-control p-4" placeholder="Edad" name="age" value="{{old('age')}}">
                @if($errors->has('age'))
                    <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('age') }}</p>
                @endif	
            </div>
            <div class="form-group">
                <label for="">Identificación:</label>
                <input type="number" class="form-control p-4" placeholder="Identificación" name="cc" value="{{old('cc')}}">
                @if($errors->has('cc'))
                    <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('cc') }}</p>
                @endif	
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="email" class="form-control p-4" placeholder="Email" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                    <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('email') }}</p>
                @endif	
            </div>
            <div class="form-group">
                <label for="">Contraseña:</label>
                <input type="password" class="form-control p-4" placeholder="Contrseña" name="password">
                @if($errors->has('password'))
                    <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('password') }}</p>
                @endif	
            </div>
            <button type="submit" class="btn btn-primary btn-block btn">Crear</button>
        </form>
    </div>
@endsection