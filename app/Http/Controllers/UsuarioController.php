<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\Unidad;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\Inicio_sesion;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

//use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

//use Dotenv\Exception\ValidationException;
use App\Http\Requests\PutUsuarioRequest;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\StoreSolicitudRequest;
use App\Models\Centro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all()->where("activo", '=', 1 )->where('id_rol', '!=', 1);
        return view('usuario.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = Unidad::select('centros.id', 'unidads.nombre_unidad')->join('centros', 'unidads.id', '=', 'centros.id')->where("centros.id_unidad", '!=', '' )->orderBy('nombre_unidad', 'asc')->get();
        $rol = Rol::all();
        //dd($centros);
        return view('usuario.create', compact('centros' ,'rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $pass = Hash::make($request->password);
        $data = array_merge($request->all(),['password' => $pass]);
        
        User::create($data);
        
        //$user = User::create($request->validated());
       
        return to_route('usuario.index')->with('status', 'Registro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {   
        $centros = Unidad::select('nombre_unidad')->where('id', '=', $usuario->id_centro)->get();    
        $datos = User::select('rols.nombre_rol')->join('rols', 'rols.id', '=', 'users.id_rol')->where('users.id', '=', $usuario->id)->get();
        return  view('usuario.usuario', compact('usuario', 'datos', 'centros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $centros = Unidad::select('centros.id', 'unidads.nombre_unidad')->join('centros', 'unidads.id', '=', 'centros.id')->where("centros.id_unidad", '!=', '' )->get();
        $rol = Rol::all();
        $selectCentro = Centro::select('centros.id_unidad', 'unidads.nombre_unidad')->join('unidads', 'centros.id_unidad', '=', 'unidads.id')->where('unidads.id', '=' , $usuario->id_centro)->get();
        $selectRol = Rol::select('id', 'nombre_rol')->where('id', '=', $usuario->id_rol)->get();
        return view('usuario.edit', compact('centros', 'rol', 'selectCentro', 'selectRol', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(PutUsuarioRequest $request, User $usuario)
    {
        if(is_null($request->password)){
            
            $usuario->update($request->validated());
        }else{
            $password = bcrypt($request->password);
            $usuario->password = $password;
            $usuario->save();
            
        }
        
        
    
        
        return to_route('usuario.index')->with('status', 'Registro Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return to_route('usuario.index');
    }

    public function login()
    {
        return view('usuario.login');
    }

    public function validatelogin(Request $request)
    {
        $credentials = request()->validate([
        'email' => ['required', 'email', 'string'], 
        'password'=> ['required', 'string']]);
        $remember = request()->filled('remember');
        
        if(Auth::attempt($credentials, $remember)){
            request()->session()->regenerate();
            $a = auth()->user()->activo;
            if($a == 0){
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->intended('login')->with('status', 'Su cuenta aun no esta activa');;
            }
           
            return redirect()->intended('decreto');
        }
        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
        
        
    }

    public function logout(Request $request ,Redirector $redirect){
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return $redirect->to('/');
    }

    public function solicitud(){
        $centros = Unidad::select('centros.id', 'unidads.nombre_unidad')->join('centros', 'unidads.id', '=', 'centros.id')->where("centros.id_unidad", '!=', '' )->get();
        return view('usuario.solicitud', compact('centros'));
    }
    public function solicitudStore(StoreSolicitudRequest $request){
        $data = array_merge($request->all(),['id_rol' => 3, 'activo' => 2]);
        
        User::create($data);
        return to_route('login')->with('status', 'Solicitud enviada');
    }
    public function perfil(){
        $id_usuario = auth()->user()->id;
        $datos_usuario = User::select('users.name', 'users.apellido', 'users.email', 'users.telefono', 'users.rut', 'unidads.nombre_unidad', 'rols.nombre_rol')
        ->join('unidads', 'unidads.id', '=', 'users.id_centro')
        ->join('rols', 'rols.id', '=', 'users.id_rol')->where('users.id', '=', $id_usuario)->get();

        $solicitud_pendiente = Solicitud::select('solicituds.id', 'solicituds.created_at', 'decretos.numero', 'decretos.materia', 'decretos.fecha')
        ->join('decretos', 'decretos.id', '=','solicituds.id_decreto')->where('id_usuario', '=', $id_usuario)->where('solicituds.estado', '=', 0)->get();

        $solicitud_aceptada = Solicitud::select('solicituds.id', 'solicituds.updated_at', 'decretos.numero', 'decretos.materia', 'decretos.fecha', 'decretos.nombre_archivo', 'decretos.cod_decreto')
        ->join('decretos', 'decretos.id', '=','solicituds.id_decreto')->where('id_usuario', '=', $id_usuario)->where('solicituds.estado', '=', 1)->get();

        $solicitud_rechazada = Solicitud::select('solicituds.id', 'solicituds.updated_at', 'decretos.numero', 'decretos.materia', 'decretos.fecha', 'decretos.nombre_archivo', 'decretos.cod_decreto')
        ->join('decretos', 'decretos.id', '=','solicituds.id_decreto')->where('id_usuario', '=', $id_usuario)->where('solicituds.estado', '=', 2)->get();

        return view('usuario.perfil', compact('datos_usuario', 'solicitud_pendiente', 'solicitud_aceptada', 'solicitud_rechazada'));
    }
}
