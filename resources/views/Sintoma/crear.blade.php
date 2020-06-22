@extends('layouts.app')

@section('section')
<div class="card shadow mb-4 w-95 size-card">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Crear Síntoma</h6>
      <a href="{{ route('detallesS') }}" class="border-bottom">Ver síntomas</a>
    </div>
    <div class="card-body">
        <div class="row">
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
                    <input type="text" class="form-control p-4" placeholder="Introduzca un nombre" name="name" value="{{old('name')}}">

                    @if($errors->has('name'))
                        <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('name') }}</p>
                    @endif	
                </div>
                <div class="form-group">
                    <label for="">Descripcion:</label>
                    <textarea class="form-control p-4" placeholder="Introduzca una descripción" name="descripcion"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection