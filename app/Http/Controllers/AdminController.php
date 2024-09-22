<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decreto;
use App\Models\User;
use App\Models\Solicitud;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decretos = Decreto::all();
        $cuenta = count($decretos);
        $usuarios = User::all();
        $cuentau = count($usuarios);
        return view('admin.dashboard', ['cuenta' => $cuenta, 'cuentau' => $cuentau]);
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
        //
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

    public function solicitudes(){
        $solicitud = User::all()->where("activo", '=', 0 );
        $nsolicitudes = $solicitud->count();
        return view('admin.solicitudes', compact('solicitud', 'nsolicitudes'));
    }

    public function solicitudDecreto($id){
        $id_user = auth()->user()->id;
        $array = [
            'id_decreto' => $id,
            'id_usuario' => $id_user,
            'estado' => 0

        ];
        $data = array_merge($array);
        Solicitud::create($data);
        return redirect()->back()->with('solicitudSuccess', 'Solicitud enviada existosamente');
    }
    public function viewSolicitudDecreto(){
        $solicitudes = Solicitud::select('solicituds.id', 'solicituds.created_at', 'solicituds.id_usuario', 'solicituds.id_decreto', 'solicituds.estado', 'users.name', 'users.apellido', 'decretos.numero', 'decretos.fecha', 'decretos.nombre_archivo')
        ->join('decretos', 'solicituds.id_decreto', '=', 'decretos.id')->join('users', 'solicituds.id_usuario', '=', 'users.id')
        ->where('solicituds.estado', '=', 0)->get();
        $numero_solicitudes = count($solicitudes);
        $solicitudt = Solicitud::all();
        return view('admin.viewSolicitudDecreto', compact('solicitudes', 'numero_solicitudes', 'solicitudt'));
    }
    


}
