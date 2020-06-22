@extends('layouts.app')

@section('section')
<div class="card shadow mb-4 w-95 size-card">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Editar Síntoma</h6>
      <a href="{{ route('detallesS') }}" class="border-bottom">Ver síntomas</a>
    </div>
    <div class="card-body">
        <div class="row">
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
    </div>
</div>
@endsection