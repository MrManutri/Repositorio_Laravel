<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDecretoRequest;
use App\Http\Requests\PutDecretoRequest;
use App\Models\Decreto;
use App\Models\Unidad;
use App\Models\Restringido;
use App\Models\TipoDocumento;
use App\Models\Anexo;
use App\Models\Solicitud;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use ZipArchive;

class DecretoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decretos = Decreto::get();
        return view('decreto.index', ['decretos' => $decretos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = Unidad::select('centros.id', 'unidads.nombre_unidad')->join('centros', 'unidads.id', '=', 'centros.id')->where("centros.id_unidad", '!=', '' )->get();
        
        $restringidos = Restringido::pluck('id', 'nombre');
        $tipo_documentos = TipoDocumento::pluck('id', 'nombre');
        return view('decreto.create', compact('centros', 'restringidos', 'tipo_documentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDecretoRequest $request)
    {
        $codigo = $request->input('numero') . $request->input('id_tipo_documento') . $request->input('fecha');
        $firmadorArray = $request->input('firmador');
        $firmadorString = implode(', ', $firmadorArray);
        $interesadoArray = $request->input('interesado');
        $interesadoString = implode(', ', $interesadoArray);
        $creadorArray = $request->input('creador');
        $creadorString = implode(', ', $creadorArray);
        /*$vistosArray = $request->input('vistos');
        $vistosString = implode(', ', $vistosArray);
        $considerandoArray = $request->input('conciderando');
        $considerandoString = implode(', ', $considerandoArray);*/
        $anexo = null;
        if($request->anexo){
            $anexo = $request->file('anexo')->store('public');
        }
        $nombre_archivo = $request->file('nombre_archivo')->store('public');
        $data = array_merge($request->all(),['cod_decreto' => $codigo, 'nombre_archivo' => $nombre_archivo, 'firmador' => $firmadorString,
    'interesado' => $interesadoString, 'creador' => $creadorString, 'vistos' => null, 'conciderando' => null, 'anexo' => $anexo]);
        
        Decreto::create($data);
        /*$strAnexo = implode($request->input('anexo'));*/
        return to_route('decreto.index')->with('status', 'Registro Creado');
        
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Decreto  $decreto
     * @return \Illuminate\Http\Response
     */
    public function show(Decreto $decreto)
    {
        return  view('decreto.decreto', compact('decreto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decreto  $decreto
     * @return \Illuminate\Http\Response
     */
    public function edit(Decreto $decreto)
    {
     
        $centros = Unidad::select('centros.id', 'unidads.nombre_unidad')->join('centros', 'unidads.id', '=', 'centros.id')->where("centros.id_unidad", '!=', '' )->get();
        //$centros = Unidad::pluck('id', 'nombre_unidad');
        $restringidos = Restringido::pluck('id', 'nombre');
        $tipo_documentos = TipoDocumento::pluck('id', 'nombre');
        return view('decreto.edit', compact('centros', 'restringidos', 'tipo_documentos', 'decreto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Decreto  $decreto
     * @return \Illuminate\Http\Response
     */
    public function update(PutDecretoRequest $request, Decreto $decreto)
    {
        $firmadorArray = $request->input('firmador');
        $firmadorString = implode(', ', $firmadorArray);
        $interesadoArray = $request->input('interesado');
        $interesadoString = implode(', ', $interesadoArray);
        $creadorArray = $request->input('creador');
        $creadorString = implode(', ', $creadorArray);
        /*$vistosArray = $request->input('vistos');
        $vistosString = implode(', ', $vistosArray);
        $considerandoArray = $request->input('conciderando');
        $considerandoString = implode(', ', $considerandoArray);*/

        $data = array_merge($request->all(),['firmador' => $firmadorString,
        'interesado' => $interesadoString, 'creador' => $creadorString, 'vistos' => null, 'conciderando' => null]);
        $decreto->update($data);

        return to_route('decreto.index')->with('status', 'Registro Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Decreto  $decreto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decreto $decreto)
    {
        $decreto->delete();
        return to_route('decreto.index');
    }
    public function maletin(){
        return view('decreto.maletin');
    }

    public function decretoAdd($id){
        $decreto = Decreto::findOrFail($id);
        $maletin = session()->get('maletin', []);

        

            $maletin[$decreto->id] = [
                'id' => $decreto->id,
                'numero' => $decreto->numero,
                'fecha' => $decreto->fecha,
                'materia' => $decreto->materia,
                'interesado' => $decreto->interesado,
                'id_restringido' => $decreto->id_restringido,
                'nombre_archivo' => $decreto->nombre_archivo
             ];

            
            
        session()->put('maletin', $maletin);
        return redirect()->back()->with('addSuccess', 'Decreto agregado al maletin');
    }
    public function borrarMaletin(Session $request){
        Session::forget('maletin');
        return redirect()->back()->with('deleteSuccess', 'Maletin Eliminado');
    }

    public function descargarMaletin(){
        $maletin = session('maletin');
        $file = public_path();
        $zipFileName = auth()->user()->name;
        $zip = new ZipArchive;

        if($zip->open($zipFileName, ZipArchive::CREATE) === TRUE){
                foreach($maletin as $ma){
                    $images = $ma['nombre_archivo'];
                    $zip->addFile($file , $images);
                }
                $zip->close();
        }
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath=$file.'/'.$zipFileName;
        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($file,$zipFileName,$headers);
        }
    }   

 
 

}
