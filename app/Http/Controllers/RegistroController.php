<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Technician;
use App\Secretarie;
use App\Direction;
use App\Unit;
use App\Support;
Use App\Support_detail;
use App\Asset;
use App\Categorie;

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
        /*$soporte = new Support;
        $soporte->solicitante = $request->solicitante;
        $soporte->fec_solicitud = $request->fecha;
        $soporte->sec_id = $request->secretaria;
        $soporte->dir_id = $request->direccion;
        $soporte->uni_id = $request->unidad;
        $soporte->tec_id = $request->tecnico;
        $soporte->celular_sol = $request->celular;
        $soporte->save();
        
        
        $detalles = new Support_detail;
        $detalles->sup_id = $soporte->id;
        $detalles->cod_gamea = $request->cod_gamea_p;
        $detalles->serial_gamea = $request->serial_gamea;
        $detalles->caracteristicas = $request->caracteristicas;
        $detalles->asset_id = $request->tipo_servicio;
        $detalles->estado = $request->estado;
        $detalles->save();*/

        //return redirect('/');
        
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
