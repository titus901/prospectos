<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Prospecto;
use App\ProspectoArchivo;

class PageController extends Controller
{
    public function index(){
    	return view('pages.home');
    }

    public function agregarView(){
    	return view('pages.agregarView');
    }

    public function agregarViewEnviar(Request $request){
		$rules = [
            'nombre'                => 'required|max:255',
            'Apaterno'              => 'required|max:255',
            'calle'                 => 'required|max:255',
            'numero'                => 'required|max:255',
            'colonia'               => 'required|max:255',
            'codigo'                => 'required|max:255',
            'telefono'              => 'required|max:255',
            'rfc'                   => 'required|max:255',
            'filename.*'            => 'required|max:2048',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $datos = array(
            'nombre' => $request->nombre,
            'Apaterno' => $request->Apaterno,
            'Amaterno' => $request->Amaterno,
            'calle' => $request->calle,
            'numero' => $request->numero,
            'colonia' => $request->colonia,
            'codigo' => $request->codigo,
            'telefono' => $request->telefono,
            'rfc' => $request->rfc,
            'estatus_id' => 1,
            'observaciones' => "",
        );

        $prospecto = Prospecto::create($datos);

        for ($i=0; $i < count($request->file("filename")); $i++) {
            $request->file("filename")[$i]->store("prospectos");
            $nameFile = $request->nombre.'-'.$i.'.'.$request->filename[$i]->getClientOriginalExtension();
            $request->filename[$i]->move(public_path('documentos/prospectos'), $nameFile);
            $RutaArchivo = public_path('documentos/prospectos')."/".$nameFile;
            $RutaFinal = "/documentos/prospectos/".$nameFile;
            $datosArchivo = array(
                'prospecto_id' => $prospecto->id,
                'nombre' => $nameFile,
                'ruta_file' => $RutaArchivo,
                'ruta' => $RutaFinal
            );
            ProspectoArchivo::create($datosArchivo);
        }

    	return redirect('/listadoView')->with("success", "Se ha registrado satisfactoriamente, nos pondremos en contacto.");
    }

    public function listadoView(){
        $prospectos = Prospecto::paginate(30);
    	return view('pages.listadoView' ,compact('prospectos'));
    }

    public function EvaluacionView($id){
        $prospecto = Prospecto::findOrFail($id);
    	return view('pages.evaluacionView', compact('prospecto'));
    }

    public function EvaluacionViewEnviar(Request $request, $id){
        $prospecto = Prospecto::findOrFail($id);
        $prospecto->estatus_id = $request->estatus;
        $prospecto->observaciones = $request->observaciones;
        $prospecto->save();
        return redirect('/listadoView')->with("success", "Evaluacion Confirmada.");
    }
}
