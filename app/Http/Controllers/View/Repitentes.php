<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiRepitentes;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Repitentes extends Controller
{
    public function index()
    {
        $ciclo = Carbon::now()->year;

        if(request('ciclo')) {
            $ciclo =  request('ciclo');
        }

        $params = request()->all();
        $default = [
            'ciclo' => $ciclo,
            'estado_inscripcion' => 'CONFIRMADA'
        ];
        $params = array_merge($default,$params);

        $token = ApiLogin::token();
        $api = new ApiRepitentes($token);
        $repitentes = $api->getAll($ciclo);

        // Todos los ciclos
        $apiCiclos = new ApiCiclos($token);
        $ciclos = $apiCiclos->getAll();
        $ciclos =  $ciclos['ciclos'];

        $data = compact('repitentes','ciclo','ciclos');
        $data['estado_inscripcion'] = $params['estado_inscripcion'];

        return view('repitentes.index',$data);
    }
}
