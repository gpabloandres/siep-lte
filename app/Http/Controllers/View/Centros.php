<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCentros;
use App\Http\Controllers\Api\ApiInscripciones;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiMatriculasCuantitativas;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Centros extends Controller
{
    public function index()
    {
        $token = ApiLogin::token();

        $ciclo = Carbon::now()->year;
        if(request('ciclo')) {
            $ciclo = request('ciclo');
        }

        // Datos de seccion
        $api = new ApiCentros($token);
        $centros = $api->getAll();

        $data = compact('centros','ciclo');
        return view('centros.index',$data);
    }

    public function show($id)
    {
        $token = ApiLogin::token();

        $ciclo = Carbon::now()->year;
        if(request('ciclo')) {
            $ciclo = request('ciclo');
        }

        // Centro
        $api = new ApiCentros($token);
        $centro = $api->getId($id);

        // Secciones
        $params = request()->all();
        $default = [
            'centro_id' => $id,
            'por_pagina' => 'all',
            'ciclo' => Carbon::now()->year,
            'estado_inscripcion'=> 'CONFIRMADA',
            'division'=> 'con',
            'order'=> 'anio',
            'order_dir'=> 'asc'
        ];
        $params = array_merge($default,$params);

        $api = new ApiMatriculasCuantitativas($token);
        $secciones = $api->getPorSeccion($params);
        $secciones = collect($secciones);

        // Lista de inscripciones del centro
        $apiInscripciones = new ApiInscripciones($token);
        $paramsInscripciones = [
            'ciclo' => $ciclo,
            'centro_id' => $id,
            'with' => 'inscripcion.pase',
            'page' => request('tab_ins_page')
        ];

        $inscripciones = $apiInscripciones->getAll($paramsInscripciones);


        // Render
        $data = compact('centro','secciones','ciclo','inscripciones');
        return view('centros.view',$data);
    }
}
