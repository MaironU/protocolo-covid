@extends('layouts.app')

@section('section')
    <div class="row">
        <h3 class="text-center mb-4 col-lg-12">Editar sintoma</h3>
        <form action="{{ route('actualizarS', $sintoma->sintoma_id) }}" method="POST" 
        class="col-sm-9 col-md-8 col-lg-6 mx-auto">
        {{ method_field('PUT') }}
        {!! csrf_field() !!}
            <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" class="form-control p-4" placeholder="Nombre" name="name" value="{{$sintoma->name}}">

                @if($errors->has('name'))
                    <p class="text-danger mt-2 font-weight-bold">{{ $errors->first('name') }}</p>
                @endif	
            </div>
            <div class="form-group">
                <label for="">Descripcion:</label>
                <textarea type="text" class="form-control p-4" placeholder="Descripcion" name="descripcion" value="{{$sintoma->descripcion}}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn">Guardar</button>
        </form>
    </div>
@endsection