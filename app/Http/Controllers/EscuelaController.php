<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escuela.index');
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
        $escuela = new Escuela;
            $escuela->nombreEscuela     = $request->nombreEscuela;
            $escuela->clave             = $request->clave;
            $escuela->turno             = $request->turno;
            $escuela->nivel             = $request->nivel;   
        $escuela->save();

        return $escuela;
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

    public function getEscuelas()
    {
        $escuelas = Escuela::all();
        // dd($alumnos->toArray());
        return Datatables::of($escuelas)
        ->addColumn('clave', function ($escuela){
            return $escuela->clave;
        })
        ->addColumn('nombre', function($escuela){
            return $escuela->nombreEscuela;
        })
        ->addColumn('turno', function($escuela){
            return $escuela->turno;
        })
        ->addColumn('nivel', function($escuela){
            return $escuela->nivel;
        })
        ->addColumn('acciones', function($escuela){
            $btn = '<button id="'.$escuela->id.'"  class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" onclick="asignarAlumno(this)"><i class="fas fa-edit"></i></button>&nbsp;';
            $btn .= '<button id="'.$escuela->id.'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar escuela" onclick="eliminarAlumno(this)"><i class="fas fa-trash-alt"></i></button>&nbsp;';
            return $btn;
        })
        ->rawColumns(['clave','nombre','turno','nivel','acciones'])->make();
    }
}
