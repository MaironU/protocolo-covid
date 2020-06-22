<?php

namespace App\Http\Controllers\Reporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reporte;
use App\Trabajador;

class ReporteController extends Controller
{

    public function index(){
        return view('Reporte.detalles');
    }

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

    public function agregarSintomas(Request $request, $id){

        $data = request()->validate([
            'temperatura' => 'required'
        ],[
            'temperatura.required' => 'Ingresa una temperatura'  
        ]);

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

        return redirect()->back()->with('agregado', 'Sintomas actualizados');
    }
}
