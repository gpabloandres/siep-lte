<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiPromocionados;
use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Promocionados extends Controller
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
        $api = new ApiPromocionados($token);
        $promocionados = $api->getAll($ciclo);

        // Todos los ciclos
        $apiCiclos = new ApiCiclos($token);
        $ciclos = $apiCiclos->getAll();
        $ciclos =  $ciclos['ciclos'];

        $data = compact('promocionados','ciclo','ciclos');
        $data['estado_inscripcion'] = $params['estado_inscripcion'];

        return view('promocionados.index',$data);
    }
}
