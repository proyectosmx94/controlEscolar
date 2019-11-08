<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Asistencia;
use Carbon\Carbon;
use App\Imports\AlumnosImport;


class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('control.control');
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
        $curp = $request->curp;
    
        $alumno = Alumno::where('curp', $curp)->first();

        $date = Carbon::now();

        $estado="";
// dd($alumno->toArray());

        if ($alumno) {
            $asistencia = new Asistencia;
            $asistencia->idAlumno   = $alumno->id;
            $asistencia->idEscuela  = $alumno->idEscuela;
            $asistencia->dateTime   = $date;
            $asistencia->save();

            $estado = "registrado";

            return $estado;
        }else{
            $estado = "invalido";

            return $estado;
        }
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
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function importExportView()
    {
       return view('control.import');
    }

    public function export() 
    {
        // return Excel::download(new AlumnosImport, 'users.xlsx');
    }

    public function import() 
    {
        \Excel::import(new AlumnosImport,request()->file('file'));
           
        return back();
    }
}
