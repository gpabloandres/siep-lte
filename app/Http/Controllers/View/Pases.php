<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiInscripciones;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiPases;
use App\Http\Controllers\Api\ApiTrayectoria;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Pases extends Controller
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
        $api = new ApiPases($token);
        $pases = $api->getAll($ciclo);

        // Todos los ciclos
        $apiCiclos = new ApiCiclos($token);
        $ciclos = $apiCiclos->getAll();
        $ciclos =  $ciclos['ciclos'];

        $data = compact('pases','ciclo','ciclos');
        $data['estado_inscripcion'] = $params['estado_inscripcion'];

        return view('pases.index',$data);
    }

    public function create() {
        $ciclo = Carbon::now()->year;

        // Numeros de pasos del Wizard
        $pasos = 4;
        $paso = request('paso');
        if(!is_numeric($paso)) { $paso = 1; }

        switch ($paso){
            case '2':
                $persona_id = request('persona_id');
                $apiTrayectoria = new ApiTrayectoria(ApiLogin::token());
                $trayectoria = $apiTrayectoria->get($persona_id);
            break;
            case '3':
                $inscripcion_id = request('inscripcion_id');
                $apiInscripciones= new ApiInscripciones(ApiLogin::token());
                $inscripcion = $apiInscripciones->getId($inscripcion_id,['with'=>'inscripcion.alumno.familiares.familiar.persona']);
            break;
        }

        $data = compact('ciclo','paso','pasos','persona_id','trayectoria','inscripcion');
        return view('pases.create',$data);
    }

    public function store() {
        $api = new ApiPases(ApiLogin::token());
        $params = request()->all();
        if(isset($params['nota_pase_tutor']) && $params['nota_pase_tutor'] == 'on') {
            $params['nota_pase_tutor'] = true;
        } else {
            $params['nota_pase_tutor'] = false;
        }
        $params['fecha_vencimiento'] = Carbon::parse($params['fecha_vencimiento'])->format('Y-m-d');
        $store = $api->store($params);
        return $store;
    }
}
