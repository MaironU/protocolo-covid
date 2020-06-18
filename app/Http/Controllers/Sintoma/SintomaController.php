<?php

namespace App\Http\Controllers\Sintoma;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sintoma;

class SintomaController extends Controller
{
    public function index(){
        $sintomas = Sintoma::all();
        return view('Sintoma.detalles', compact('sintomas'));
    }

    public function store(){
        return view('Sintoma.crear');
    }

    public function crear(Request $request){

        $data = request()->validate([
            'name' => 'required|unique:sintomas,name',
        ],[
            'name.required' => 'El campo nombre es obligatorio',
    		'name.unique' => 'El campo nombre ya está en uso',
            
    	]);

        $sintoma = new Sintoma;
        $sintoma->name = $request->name;
        $sintoma->descripcion = $request->descripcion;
        $sintoma->save();

        return redirect()->route('crearS')->with('creado', 'creado con exito');
    }

    public function editar($id){
        $sintoma = Sintoma::findOrFail($id);
        return view('Sintoma.editar', compact('sintoma'));
    }

    public function actualizar(Request $request, $id){

        $sintoma = Sintoma::findOrFail($id);

        $data = request()->validate([
            'name' => 'required|unique:sintomas,name,'.$sintoma->sintoma_id.',sintoma_id',
        ],[
            'name.required' => 'El campo nombre es obligatorio',
    		'name.unique' => 'El campo nombre ya está en uso',
            
    	]);
        
        $sintoma->name = $request->name;
        $sintoma->descripcion = $request->descripcion;
        $sintoma->save();

    	return redirect()->route('detallesS')->with('actualizado', $sintoma->name);
    } 

    public function eliminar($id){
        $sintoma = Sintoma::findOrFail($id);
        $sintoma->delete();
    	return redirect()->back()->with('eliminado', $sintoma->name);
    }
}
