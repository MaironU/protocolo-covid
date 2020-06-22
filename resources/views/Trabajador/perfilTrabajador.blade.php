@extends('layouts.app')

@section('section')
<div class="card shadow mb-4 size pb-4">
    <div class="card-body d-flex flex-column justify-content-center align-items-center bg-dark">
        <img class="rounded-circle p-2 bg-primary" src="{{ asset('logos/profile.svg') }}" alt="" width="100px" height="100px">
        <span class="h5 text-light mt-3">{{$trabajador->firstname}} {{$trabajador->lastname}}</span>
    </div>
    <div class="border-bottom">
        <div class="d-flex flex-column justify-content-center p-4">
            <div class="d-flex pb-3 pt-3 border-bottom">
                <div class="d-flex align-items-center" style="min-width: 110px">
                    <i style="width: 16px" class="fa fa-user text-primary" aria-hidden="true"></i>
                    <span class="text-dark font-weight-bold ml-2">Nombre</span>
                </div>
                <span>{{$trabajador->firstname}}</span>
            </div>
            <div class="d-flex pb-3 pt-3 border-bottom">
                <div class="d-flex align-items-center" style="min-width: 110px">
                    <i style="width: 16px" class="fa fa-address-card text-primary" aria-hidden="true"></i>
                    <span class="text-dark font-weight-bold ml-2">Apellido</span>
                </div>
                <span>{{$trabajador->lastname}}</span>
            </div>
            <div class="d-flex pb-3 pt-3 border-bottom">
                <div class="d-flex align-items-center" style="min-width: 110px">
                    <i style="width: 16px" class="fa fa-sticky-note text-primary" aria-hidden="true"></i>
                    <span class="text-dark font-weight-bold ml-2">C.C</span>
                </div>
                <span>{{$trabajador->cc}}</span>
            </div>
            <div class="d-flex pb-3 pt-3">
                <div class="d-flex align-items-center" style="min-width: 110px">
                    <i style="width: 16px" class="fa fa-envelope text-primary" aria-hidden="true"></i>
                    <span class="text-dark font-weight-bold ml-2">Email</span>
                </div>
                <span class="text-truncate">{{$trabajador->email}}</span>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <h3 class="text-center">Síntomas</h3>
        @if($errors->has('temperatura'))
            <div class="alert alert-danger alert-dismissible fade show w-85 mx-auto" role="alert">
                <strong>{{$errors->first('temperatura')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif	
        <form class="mb-2 px-4 pb-4" action="{{ route('agregarS', $trabajador->trabajador_id) }}" method="POST" >
            @csrf
            <div class="d-flex pb-3 pt-3 border-bottom">
                <div class="d-flex align-items-center" style="min-width: 110px">
                    <i style="width: 16px" class="fa fa-thermometer-empty text-primary text-center" aria-hidden="true"></i>
                    <span class="text-dark font-weight-bold ml-2">Temperatura</span>
                    @if($trabajadorConSintomas == null)
                        <input type="hidden" name="temperatura" value="" id="add-temperatura-hidden">
                        <span class="text-danger ml-3" id="add-temperatura">No tiene</span>
                        <i class="fa fa-plus-circle ml-2 pointer" aria-hidden="true" data-toggle="modal" data-target="#openmodal" onclick="agregarTemperatura()"></i>
                    @else
                        <input type="hidden" name="temperatura" value="{{$trabajadorConSintomas['temperatura']}}" id="add-temperatura-hidden">
                        <span class="text-primary ml-3" id="add-temperatura">{{$trabajadorConSintomas['temperatura']}}°</span>
                        <i class="fa fa-edit ml-2 pointer" aria-hidden="true" data-toggle="modal" data-target="#openmodal" onclick="agregarTemperatura()"></i>
                    @endif
                </div>
            </div>

            <div class="d-flex pb-3 pt-3 border-bottom">
                <div class="d-flex  d-flex flex-column" style="min-width: 110px">
                    <div class="mb-3">
                        <i style="width: 16px" class="fa fa-user-secret text-primary text-center" aria-hidden="true"></i>
                        <span class="text-dark font-weight-bold ml-2">Sintomas</span>
                    </div>
                    @if(session('agregado'))
                        <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                            <strong>{{session('agregado')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if($trabajadorConSintomas != null)
                        @if($trabajadorConSintomas['sintomas']->isEmpty())
                            <div class="d-flex flex-wrap justify-content-between">
                                @foreach($sintomas as $sintoma)
                                    <div class=" d-flex align-items-center form-control justify-content-between w-45 mb-2">
                                        <span class="text-truncate">{{$sintoma->name}}</span>
                                        <input class="check" name="check[]" value="{{$sintoma->sintoma_id}}" type="checkbox" />
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="d-flex flex-wrap justify-content-between">
                                @foreach($sintomas as $sintoma)
                                    @php ($i = 0)
                                    @php ($sw = false)
                                    @foreach($trabajadorConSintomas['sintomas'] as $miSintoma)
                                        @if($miSintoma->sintoma_id == $sintoma->sintoma_id)
                                            @php ($sw = true)
                                            @break
                                        @endif
                                    @endforeach

                                    <div class=" d-flex align-items-center form-control justify-content-between w-45 mb-2">
                                        <span class="text-truncate">{{$sintoma->name}}</span>
                                        @if($sw == true)
                                            <input class="check" name="check[]" value="{{$sintoma->sintoma_id}}" type="checkbox"  checked/>
                                        @else
                                            <input class="check" name="check[]" value="{{$sintoma->sintoma_id}}" type="checkbox" />
                                        @endif
                                    </div>                                    
                                @endforeach
                            </div>
                        @endif
                    @else
                    <div class="d-flex flex-wrap justify-content-between">
                        @foreach($sintomas as $sintoma)
                            <div class=" d-flex align-items-center form-control justify-content-between w-45 mb-2">
                                <span class="text-truncate">{{$sintoma->name}}</span>
                                <input class="check" name="check[]" value="{{$sintoma->sintoma_id}}" type="checkbox" />
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-center pb-3 pt-3 border-bottom">
                <button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-save text-success mr-2" aria-hidden="true"></i>Guardar</button>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-center pl-4 pr-4">
        <a href="{{ route('editarT', $trabajador->trabajador_id) }}" class="btn btn-outline-primary btn-block"><i class="fa fa-edit text-primary mr-2" aria-hidden="true"></i>Editar</a>
    </div>
</div>
@include('../modalTemperatura')
@endsection