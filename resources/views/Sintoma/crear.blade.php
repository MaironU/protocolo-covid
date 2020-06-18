@extends('layouts.app')

@section('section')
    <div class="row">
        <a href="{{ route('detallesS') }}" class="w-100 text-right">Ver sintomas</a>
        <h3 class="text-center mb-4 col-lg-12 mt-3">Crear sintoma</h3>
        <form action="{{ route('nuevoS') }}" method="POST" 
        class="col-sm-9 col-md-8 col-lg-6 mx-auto">
            @csrf
            @if(session('creado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sintoma {{session('creado')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" class="form-control p-4" placeholder="Nombre" name="name" value="{{old('name')}}">

                @if($errors->has('name'))
                    <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('name') }}</p>
                @endif	
            </div>
            <div class="form-group">
                <label for="">Descripcion:</label>
                <textarea class="form-control p-4" placeholder="Descripcion" name="descripcion"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn">Crear</button>
        </form>
    </div>
@endsection