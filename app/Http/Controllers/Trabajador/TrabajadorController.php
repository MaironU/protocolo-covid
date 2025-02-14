<?php

namespace App\Http\Controllers\Trabajador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trabajador;
use App\Reporte;
use App\Sintoma;

class TrabajadorController extends Controller
{
    public function index(){
        $trabajadores = Trabajador::all();
        
        //print_r(json_encode($trabajadores));
        return view('Trabajador.detalles', compact('trabajadores'));
    }

    public function mostrar($id){
        $trabajador = Trabajador::findOrFail($id);
        $sintomas = Sintoma::all();
        $data = Reporte::select('trabajador_id', 'temperatura')
                        ->where('trabajador_id', '=', $id)
                        ->groupBy('trabajador_id', 'temperatura')
                        ->get()->toArray();


        $arraySintomas = Reporte::select('sintoma_id')
                            ->groupBy('sintoma_id')
                            ->where('trabajador_id', '=', $id)
                            ->get();

        if(!empty($data)){
            $trabajadorConSintomas = array_merge($data[0], ["sintomas" => $arraySintomas]);
        }else{
            $trabajadorConSintomas = null;
        }

        return view('Trabajador.perfilTrabajador', compact('trabajador', 'trabajadorConSintomas', 'sintomas'));
    }

    public function store(){
        return view('Trabajador.crear');
    }

    public function crear(Request $request){

        $data = request()->validate([
    		'firstname' => 'required',
    		'lastname' => 'required',
            'age' => 'required',
            'cc' => 'required|unique:trabajadors,cc',
            'email' => 'required|email|unique:trabajadors,email',
            'password' => 'required'
    	],[
    		'firstname.required' => 'El campo nombre es obligatorio',
            'lastname.required' => 'El campo apellido es obligatorio',
   			'age.required' => 'El campo edad es obligatorio',
            'cc.required' => 'El campo identificaciónn es obligatorio',
            'cc.unique' => 'El campo identificaciónn ya está en uso',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'El campo email ya está en uso',
            'password.required' => 'El campo contraseña es obligatorio',
    	]);

        $trabajador = new Trabajador;
        $trabajador->firstname = $request->firstname;
        $trabajador->lastname = $request->lastname;
        $trabajador->age = $request->age;
        $trabajador->cc = $request->cc;
        $trabajador->email = $request->email;
        $trabajador->password = $request->password;
        $trabajador->empresa_id = 1;
        $trabajador->save();

        return redirect()->route('crearT')->with('creado', 'creado con exito');
    }

    public function editar($id){
        $trabajador = Trabajador::findOrFail($id);
        return view('Trabajador.editar', compact('trabajador'));
    }

    public function actualizar(Request $request, $id){

        $trabajador = Trabajador::findOrFail($id);

        $data = request()->validate([
    		'firstname' => 'required',
    		'lastname' => 'required',
            'age' => 'required',
            'cc' => 'required|unique:trabajadors,cc,'.$trabajador->cc.',cc',
            'email' => 'required|email|unique:trabajadors,email,'.$trabajador->trabajador_id.',trabajador_id',
    	],[
    		'firstname.required' => 'El campo nombre es obligatorio',
            'lastname.required' => 'El campo apellido es obligatorio',
   			'age.required' => 'El campo edad es obligatorio',
            'cc.required' => 'El campo identificaciónn es obligatorio',
            'cc.unique' => 'El campo identificaciónn ya está en uso',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'El campo email ya está en uso',
    	]);
        
        $trabajador->firstname = $request->firstname;
        $trabajador->lastname = $request->lastname;
        $trabajador->age = $request->age;
        $trabajador->cc = $request->cc;
        $trabajador->email = $request->email;

        $trabajador->save();

    	return redirect()->route('detallesT')->with('actualizado', $trabajador->firstname.' '.$trabajador->lastname);
    } 

    public function eliminar($id){
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();
    	return redirect()->back()->with('eliminado', $trabajador->firstname.' '.$trabajador->lastname);
    }

    public function buscar($palabra){
        $datos = Trabajador::select('trabajador_id','firstname', 'lastname')
                            ->where('lastname', 'like', $palabra.'%')
                            ->take(5)
                            ->get();
        
        if(count($datos) == 0){
            return response()->json([]);
        }

        return response()->json($datos);
    }
}
