<?php

namespace App\Http\Controllers\Reporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reporte;
use App\Trabajador;

class ReporteController extends Controller
{
    public function agregarTemperatura(Request $request){
        $trabajador = Reporte::where('trabajador_id', $request->id)->get();
        if(empty($trabajador)){
            $reporte = new Reporte;
            $reporte->trabajador_id = $request->id;
            $reporte->temperatura = $request->temperatura;
            $reporte->save();
        }
        return 'agregado';
    }

    public function traSin($id){
        $data = Reporte::select('temperatura')->with(array('sintoma'))->get();

        $data = Reporte::with('sintoma')
                        ->where('trabajador_id', '=', $id)
                        ->get();


        return response()->json($data);
    }

    public function agregarSintomas(Request $request, $id){

        $trabajadores = Reporte::where('trabajador_id', $id);

        if(!empty($request->check)){
            if(empty($trabajadores)){
                foreach($request->check as $check){
                    $reporte = new Reporte;
                    $reporte->trabajador_id = $id;
                    $reporte->sintoma_id = $check;
                    $reporte->temperatura = $request->temperatura;
                    $reporte->save();
                }
            }else{
                $trabajadores->delete();

                foreach($request->check as $check){
                    $reporte = new Reporte;
                    $reporte->trabajador_id = $id;
                    $reporte->sintoma_id = $check;
                    $reporte->temperatura = $request->temperatura;
                    $reporte->save();
                }
            }
        }else{
            if(empty($trabajadores)){
                $reporte = new Reporte;
                $reporte->trabajador_id = $id;
                $reporte->temperatura = $request->temperatura;
                $reporte->save();
            }else{
                $trabajadores->delete();
                $reporte = new Reporte;
                $reporte->trabajador_id = $id;
                $reporte->temperatura = $request->temperatura;
                $reporte->save();
            }
        }

        return 'correcto';
    }
}
