<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Asistencia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class ReportesController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function consultaAsistencias(Request $request)
    {
    	$usuario = Auth::user();
    	$asistencias = Asistencia::where('idEscuela', $usuario->idEscuela)->get();

    	return Datatables::of($asistencias)
        ->addColumn('grado', function ($alumno){
            // dd($alumno);
            return "pendiente";
        })
        ->addColumn('grupo', function($alumno){
            return "pendiente";
        })
        ->addColumn('nombre', function($alumno){
            return "pendiente";
        })
        ->addColumn('fechaHora', function($alumno){
            return "pendiente";
        })
        ->addColumn('acciones', function($alumno){
            return "pendiente";
        })
        ->rawColumns(['grado','grupo','nombre','fechaHora','acciones'])->make();
    }
}
