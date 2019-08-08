<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;

use App\Technician;
use App\Secretarie;
use App\Direction;
use App\Unit;
use App\Support;
Use App\Support_detail;
use App\Asset;
use App\Categorie;
use function GuzzleHttp\json_decode;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnico = Technician::all();
        $secretaria = Secretarie::all();
        $direccion = Direction::all();
        $unidad = Unit::all();
        $soporte = Support::all();
        $categoria = Categorie::all();
        $activos = Asset::all();
        return view("registro.soporte", 
                    ['tecnicos' => $tecnico, 
                    'secretarias' => $secretaria, 
                    'direcciones' => $direccion, 
                    'unidades' => $unidad,
                    'categorias' => $categoria,
                    'activo' => $activos,
                    'soporte' => $soporte,
                    ]);
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
        
        
        $soporte = new Support;
        $soporte->solicitante = trim(strtoupper($request->solicitante));
        $soporte->fec_solicitud = $request->fecha;
        $soporte->sec_id = trim($request->secretaria);
        $soporte->dir_id = trim($request->direccion);
        $soporte->uni_id = trim($request->unidad);
        $soporte->tec_id = trim($request->tec_id);
        $soporte->celular_sol = trim($request->celular);
        $soporte->codigo_gamea = trim($request->codigo_gamea);
        $soporte->save();
        
        $a = count($request->activos);
        for ($i=0; $i < $a ; $i++) { 
            $detalles = new Support_detail;
            $detalles->sup_id = $soporte->id;
            $detalles->cod_gamea_p = trim($request->activos[$i]['cod_gamea_p']);
            $detalles->asset_id = trim($request->activos[$i]['tipo_servicio']);
            $detalles->serial_gamea = trim($request->activos[$i]['serial_gamea']);
            $detalles->caracteristicas = trim(strtoupper($request->activos[$i]['caracteristicas']));
            $detalles->estado = trim($request->activos[$i]['estado']);
            $detalles->save();
        }
        
        return response()->json($request->all());
        
    }

    public function storeajax(Request $request){
        if($request->ajax()){
            return response()->json([

            ]);
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
}
