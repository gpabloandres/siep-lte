<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiInscripciones;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiMatriculasCuantitativas;
use App\Http\Controllers\Api\ApiRepitentes;
use App\Http\Controllers\Api\ApiSecciones;
use App\Http\Controllers\Api\Util\BladeHelper;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Secciones extends Controller
{
    public function index()
    {
        $ciclo = Carbon::now()->year;

        if(request('ciclo')) {
            $ciclo =  request('ciclo');
        }


        $params = request()->all();
        $default = [
            'por_pagina' => 10,
            'ciclo' => $ciclo,
            'estado_inscripcion'=> 'CONFIRMADA',
            'division'=> 'con',
            'order'=> 'anio',
            'order_dir'=> 'asc'
        ];

        $params = array_merge($default,$params);

        $token = ApiLogin::token();
        $api = new ApiMatriculasCuantitativas($token);
        $secciones = $api->getPorSeccion($params);

        $data = compact('ciclo','secciones');
        return view('secciones.index',$data);
    }

    public function show($id)
    {
        $token = ApiLogin::token();

        $ciclo = Carbon::now()->year;
        if(request('ciclo')) {
            $ciclo = request('ciclo');
        }

        // Datos de seccion
        $api = new ApiSecciones($token);
        $params = ['with' => 'centro,titulacion'];
        $seccion = $api->getId($id,$params);

        $api = new ApiInscripciones($token);
        $params = [
            'ciclo' => $ciclo,
            'centro_id' => $seccion['centro_id'],
            'curso_id' => $seccion['id'],
            'por_pagina' => 'all'
        ];

        $inscripciones = $api->getAll($params);

        $data = compact('seccion','inscripciones','ciclo');
        return view('secciones.view',$data);
    }
}
