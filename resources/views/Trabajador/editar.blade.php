@extends('layouts.app')

@section('section')
    <div class="row">
        <h3 class="text-center mb-4 col-lg-12">Editar trabajador</h3>
        <form action="{{ route('actualizarT', $trabajador->trabajador_id) }}" method="POST" 
        class="col-sm-9 col-md-8 col-lg-6 mx-auto">
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
@endsection