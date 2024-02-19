<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $persona = DB::table('personas')
        // ->join('tipos_personas','personas.tipo_id','=','tipo_id')
        // ->select('personas.id', 'personas.nombre', 'personas.apellido', 'personas.edad', 'personas.email', 'personas.telefono', 'personas.direccion', 'tipos_personas.tipo')
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([

            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'correo' => 'required|unique:personas,correo',
            'telefono' => 'required|unique:personas,telefono',
            'tipo_id' => 'required',
            'especialidad' => 'nullable'
        ]);

        $persona = Persona::create($validatedData);
        return response()->json(['message' => 'Persona creada', 'persona' => $persona], 201);
    }

    public function search(Request $request)
{
    $especialidad = $request->input('especialidad');

    $persona = Persona::where('especialidad', $especialidad)->where('tipo_id', 1)->get();

    return response()->json(['data' => $persona], 200);
}

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
