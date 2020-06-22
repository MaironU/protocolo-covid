@extends('layouts.app')

@section('section')
<div class="card shadow mb-4 w-95">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary mr-3">Reporte</h6>
        <div class="d-flex align-items-center">
            <span class="mr-2">Fecha: </span>
            <span class="text-gray-500">20-06-2020</span>
        </div>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Identificación</th>
            <th>Temperatura</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Identificación</th>
            <th>Temperatura</th>
            </tr>
        </tfoot>
        <tbody>  
            <tr>
                <td>Mayron</td>
                <td>Urieles</td>
                <td>23</td>
                <td>1083022258</td>
                <th>33°</th>
            </tr>
            <tr>
                <td>Mayron</td>
                <td>Urieles</td>
                <td>23</td>
                <td>1083022258</td>
                <th>33°</th>
            </tr>
            <tr>
                <td>Mayron</td>
                <td>Urieles</td>
                <td>23</td>
                <td>1083022258</td>
                <th>33°</th>
            </tr>
            <tr>
                <td>Mayron</td>
                <td>Urieles</td>
                <td>23</td>
                <td>1083022258</td>
                <th>33°</th>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</div>
@include('../modalsintomas')

@endsection