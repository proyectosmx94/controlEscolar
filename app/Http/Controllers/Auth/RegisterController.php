<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Escuela;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.usuariosIndex');
    }

    public function obtenerEscuelas()
    {
        $escuelas = Escuela::all();

        $data = "";
        foreach ($escuelas as $key) {
            $data .= "<option value='".$key->id."'>".$key->nombreEscuela."</option>";
        }
  
        return $data;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'idEscuela' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'idEscuela' => $data['idEscuela'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getUsuarios()
    {
        $usuarios = User::all();
        
        return Datatables::of($usuarios)
        ->addColumn('escuela', function ($usuario){
            // dd($usuario->idEscuela);
            $escuela = Escuela::Where('id', $usuario->idEscuela)->get();
            
            foreach ($escuela as $key) {
                $nombreEscuela = $key->nombreEscuela;
            }

            return $nombreEscuela;
        })
        ->addColumn('nombre', function($usuario){
            return $usuario->name;
        })
        ->addColumn('correo', function($usuario){

            return $usuario->email;
        })
        ->addColumn('acciones', function($usuario){
            $btn = '<button id="'.$usuario->id.'"  class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Editar usuario" onclick="editarUsuario(this)"><i class="fas fa-user-edit"></i></button>&nbsp;';
            $btn .= '<button id="'.$usuario->id.'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar usuario" onclick="eliminarUsuario(this)"><i class="fas fa-user-times"></i></button>';
            return $btn;
        })
        ->rawColumns(['escuela','nombre','correo','acciones'])->make();
    }

    public function datosModalUsuario(Request $request)
    {
        $usuario = User::where('id', $request->id)->first();

        $data = array(   
            'idUser'    => $usuario->id, 
            'name'      => $usuario->name,
            'email'     => $usuario->email,
            'password'  => $usuario->password
        );

        return response()->json($data); 
    }
}
