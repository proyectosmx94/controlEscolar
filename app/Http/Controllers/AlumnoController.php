<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alumno.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $usuario =Auth::user();
        $alumno = new Alumno;
            $alumno->curp              = $request->curpAlumno;
            $alumno->primerApellido    = $request->primerApellido;
            $alumno->segundoApellido   = $request->segundoApellido;
            $alumno->nombre            = $request->nombre;
            $alumno->grado             = $request->grado;
            $alumno->grupo             = $request->grupo;
            $alumno->nombreTutor       = $request->nombreTutor;
            $alumno->telefonoTutor     = $request->telefonoTutor;
            $alumno->correoTutor       = $request->correoTutor;
            $alumno->idEscuela         = $usuario->idEscuela;
            $alumno->idRfid            = $request->idRfid;
        $alumno->save();

        return $alumno;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $usuario =Auth::user();

        $alumno = Alumno::find($request->idAlumno);
            $alumno->curp              = $request->curpAlumno;
            $alumno->primerApellido    = $request->primerApellido;
            $alumno->segundoApellido   = $request->segundoApellido;
            $alumno->nombre            = $request->nombre;
            $alumno->grado             = $request->grado;
            $alumno->grupo             = $request->grupo;
            $alumno->nombreTutor       = $request->nombreTutor;
            $alumno->telefonoTutor     = $request->telefonoTutor;
            $alumno->correoTutor       = $request->correoTutor;
            $alumno->idEscuela         = $usuario->idEscuela;
            $alumno->idRfid            = $request->idRfid;
        $alumno->save();

        return $alumno;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $alumno = Alumno::where('id', $request->id)->first();
        $alumno->delete();
        
        return $alumno;
    }

    public function getAlumnos()
    {

        $usuario =Auth::user();
        // dd($usuario->toArray());
        $alumnos = Alumno::where('idEscuela', $usuario->idEscuela)->get();
        // dd($alumnos->toArray());
        return Datatables::of($alumnos)
        ->addColumn('grado', function ($alumno){
            // dd($alumno);
            return $alumno->grado;
        })
        ->addColumn('grupo', function($alumno){
            return $alumno->grupo;
        })
        ->addColumn('nombre', function($alumno){

            return $alumno->primerApellido." ".$alumno->segundoApellido." ".$alumno->nombre;
        })
        ->addColumn('acciones', function($alumno){
            $btn = '<button id="'.$alumno->id.'"  class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" onclick="asignarAlumno(this)"><i class="fas fa-user-edit"></i></button>&nbsp;';
            $btn .= '<button id="'.$alumno->id.'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar alumno" onclick="eliminarAlumno(this)"><i class="fas fa-user-times"></i></button>&nbsp;';

            $btn .= '<button id="'.$alumno->id.'" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Notificar a tutor"><i class="fas fa-envelope" style="color:#fff;"></i></button>&nbsp;';
            return $btn;
        })
        ->rawColumns(['grado','grupo','nombre','acciones'])->make();
    }

    public function datosModalAlumno(Request $request)
    {
        $alumno = Alumno::where('id', $request->id)->first();
// dd($alumno->toArray());
        $data = array(   
            'idAlumno'          => $alumno->id, 
            'primerApellido'    => $alumno->primerApellido,
            'segundoApellido'   => $alumno->segundoApellido,
            'nombre'            => $alumno->nombre,
            'curp'              => $alumno->curp,
            'grado'             => $alumno->grado,
            'grupo'             => $alumno->grupo,
            'nombreTutor'       => $alumno->nombreTutor,
            'telefonoTutor'     => $alumno->telefonoTutor,
            'correoTutor'       => $alumno->correoTutor,
            'idRfid'       => $alumno->idRfid,
        );

        return response()->json($data); 
    }
}
