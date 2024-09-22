<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Mail\MailRespuesta;
use Illuminate\Support\Facades\Mail;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitud::select('solicituds.id', 'solicituds.created_at', 'solicituds.id_usuario', 'solicituds.id_decreto', 'solicituds.estado', 'users.name', 'users.apellido', 'decretos.numero', 'decretos.fecha', 'decretos.nombre_archivo')
        ->join('decretos', 'solicituds.id_decreto', '=', 'decretos.id')->join('users', 'solicituds.id_usuario', '=', 'users.id')
        ->where('solicituds.estado', '=', 0)->get();
        $numero_solicitudes = count($solicitudes);
        $solicitudt = Solicitud::all();
        return view('admin.viewsolicituddecreto', compact('solicitudes', 'numero_solicitudes', 'solicitudt'));
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
    public function edit(Solicitud $solicitud)
    {
        return view('admin.responder', compact('solicitud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        $data = array_merge($request->all());
        $solicitud->update($data);
        $receptor = Solicitud::select('users.email')->join('users', 'solicituds.id_usuario', '=', 'users.id')->limit('1')->get();
        
        
        
        return to_route('viewSolicitudDecreto')->with('status', 'Solicitud Respondida');
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
}
