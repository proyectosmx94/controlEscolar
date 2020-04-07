<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Asistencia;
use Carbon\Carbon;
use App\Imports\AlumnosImport;

class ControlController extends Controller
{
    public function index()
    {
        return view('control.control');
    }

    public function store(Request $request)
    {
        $alumno = Alumno::where('idRfid', $request->curp)->first();

        $date = Carbon::now();

        $estado="";

        if ($alumno) {
            $asistencia = new Asistencia;
            $asistencia->idAlumno   = $alumno->id;
            $asistencia->idEscuela  = $alumno->idEscuela;
            $asistencia->dateTime   = $date;
            $asistencia->save();

            $estado = "registrado";

            $alumno = $alumno->nombre." ".$alumno->primerApellido." ".$alumno->segundoApellido;

            // return $estado;

            return  [$estado, $alumno];
        }else{
            $estado = "invalido";

            return $estado;
        }
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
