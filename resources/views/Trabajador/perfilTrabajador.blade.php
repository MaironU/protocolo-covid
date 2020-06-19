@extends('layouts.app')

@section('section')
<div class="card shadow mb-4 size">
    <div class="card-body d-flex flex-column justify-content-center align-items-center bg-dark">
        <img class="rounded-circle p-2 bg-primary" src="{{ asset('logos/profile.svg') }}" alt="" width="100px" height="100px">
        <span class="h5 text-light mt-3">{{$trabajador->firstname}} {{$trabajador->lastname}}</span>
    </div>
    <div class="border-bottom border-primary">
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
                    <i class="fa fa-address-card text-primary" aria-hidden="true"></i>
                    <span class="text-dark font-weight-bold ml-2">Apellido</span>
                </div>
                <span>{{$trabajador->lastname}}</span>
            </div>
            <div class="d-flex pb-3 pt-3 border-bottom">
                <div class="d-flex align-items-center" style="min-width: 110px">
                    <i class="fa fa-envelope text-primary" aria-hidden="true"></i>
                    <span class="text-dark font-weight-bold ml-2">Email</span>
                </div>
                <span class="text-truncate">{{$trabajador->email}}</span>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <h3 class="text-center">Síntomas</h3>
        <form class="mb-2 p-3" action="{{ route('agregarS', $trabajador->trabajador_id) }}" method="POST" >
            @csrf
            <div class="d-flex pb-3 pt-3 border-bottom">
                <div class="d-flex align-items-center" style="min-width: 110px">
                    <i style="width: 16px" class="fa fa-thermometer-empty text-primary text-center" aria-hidden="true"></i>
                    <span class="text-dark font-weight-bold ml-2">Temperatura</span>
                    @if($trabajadorConSintomas->isEmpty())
                        <input type="hidden" name="temperatura" value="" id="add-temperatura-hidden">
                        <span class="text-danger ml-3" id="add-temperatura">No tiene</span>
                        <i class="fa fa-plus-circle ml-2 pointer" aria-hidden="true" data-toggle="modal" data-target="#openmodal" onclick="agregarTemperatura()"></i>
                    @else
                        <input type="hidden" name="temperatura" value="{{$trabajadorConSintomas[0]->temperatura}}" id="add-temperatura-hidden">
                        <span class="text-primary ml-3">{{$trabajadorConSintomas[0]->temperatura}}°</span>
                        <i class="fa fa-edit ml-2 pointer" aria-hidden="true" data-toggle="modal" data-target="#openmodal"></i>
                    @endif
                </div>
            </div>

            <div class="d-flex pb-3 pt-3 border-bottom">
                <div class="d-flex  d-flex flex-column" style="min-width: 110px">
                    <div class="mb-3">
                        <i style="width: 16px" class="fa fa-thermometer-empty text-primary text-center" aria-hidden="true"></i>
                        <span class="text-dark font-weight-bold ml-2">Sintomas</span>
                    </div>
                    @if(!$trabajadorConSintomas->isEmpty())
                        @if($trabajadorConSintomas[0]->sintoma->isEmpty())
                            <div class="d-flex flex-wrap justify-content-between">
                                @foreach($sintomas as $sintoma)
                                    <div class=" d-flex align-items-center form-control justify-content-between w-45 mb-2">
                                        <span class="text-truncate">{{$sintoma->name}}</span>
                                        <input name="check[]" value="{{$sintoma->sintoma_id}}" type="checkbox" />
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="d-flex flex-wrap justify-content-between">
                                @foreach($sintomas as $sintoma)
                                    @foreach($trabajadorConSintomas as $Tsintomas)
                                        @foreach($Tsintomas->sintoma as $miSintoma)
                                            @if($miSintoma->sintoma_id == $sintoma->sintoma_id)
                                                <div class=" d-flex align-items-center form-control justify-content-between w-45 mb-2">
                                                    <span class="text-truncate">{{$sintoma->name}}</span>
                                                    <input name="check[]" value="{{$sintoma->sintoma_id}}" type="checkbox" checked/>
                                                </div>
                                                @break
                                            @else
                                                <div class=" d-flex align-items-center form-control justify-content-between w-45 mb-2">
                                                    <span class="text-truncate">{{$sintoma->name}}</span>
                                                    <input name="check[]" value="{{$sintoma->sintoma_id}}" type="checkbox" />
                                                </div>
                                            @endif
                                            @break
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @else
                    <div class="d-flex flex-wrap justify-content-between">
                        @foreach($sintomas as $sintoma)
                            <div class=" d-flex align-items-center form-control justify-content-between w-45 mb-2">
                                <span class="text-truncate">{{$sintoma->name}}</span>
                                <input name="check[]" value="{{$sintoma->sintoma_id}}" type="checkbox" />
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-center pb-3 pt-3 border-bottom">
                <button type="submit" class="btn btn-success btn-block">Guardar</button>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-center">
        <a href="" class="btn btn-outline-primary"><i class="fa fa-edit text-primary mr-2" aria-hidden="true"></i>Editar</a>
    </div>
</div>
@include('../modalTemperatura')
@endsection