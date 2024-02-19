<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function CreateCitas(request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_persona'=>'required',
            'id_medico'=>'required',
            'fecha_hora'=>'required'
            ]);

            if( $validator->fails() ) {
                return response()->json(['error' => $validator->errors()], 401);
            }

                $cita = Cita::create([
                    'id_persona' => $request->input('id_persona'),
                    'id_medico' => $request->input('id_medico'),
                    'fecha_hora' => $request->input('fecha_hora')
                ]);
                return response()->json(['creada'=> true],200);
    }


    /**
     * Display the specified resource.
     */
    public function mostrarCitas(request $request)
    {
        // $especialidad = $request ->input(especialidad);

        // $id_medico = Person::where('especialidad', $especialidad)
        // ->where('', $id_medico)
        // ->get();

        $citas = DB::table('citas')     
        ->join('personas','citas.id_persona','=','personas.id')
        ->select( 'personas.nombre', 'personas.apellido', 'citas.fecha_hora')
        ->get();

        return response()->json(['citas'=> $citas],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
