<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiInscripciones;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiTrayectoria;
use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Inscripciones extends Controller
{
    public function __construct()
    {
        //$this->middleware('jwt');
    }

    public function index()
    {
        $token = ApiLogin::token();

        $api = new ApiInscripciones($token);
        $inscripciones = $api->getAll(request()->all());

        // Todos los ciclos
        $apiCiclos = new ApiCiclos($token);
        $ciclos = $apiCiclos->getAll();
        $ciclos =  $ciclos['ciclos'];

        $data = compact('inscripciones','ciclos','params');
        $data['ciclo'] = request('ciclo');
        $data['estado_inscripcion'] = request('estado_inscripcion');

        return view('inscripciones.index',$data);
    }

    public function show($id)
    {
        $token = ApiLogin::token();

        $relaciones = [
            'inscripcion.alumno.familiares.familiar.persona.ciudad'
        ];
        $params = request()->all();
        $default['with'] = join(',',$relaciones);
        $params = array_merge($params,$default);

        $api = new ApiInscripciones($token);
        $data = $api->getId($id,$params);

        if($api->error) {
            return view('error',[
                'error' => $api->error
            ]);
        } else {
            $inscripcion = $data['inscripcion'];

            $centro = $inscripcion['centro'];
            $alumno= $inscripcion['alumno'];
            $persona= $alumno['persona'];
            $familiares = $alumno['familiares'];

            $api = new ApiTrayectoria($token);
            $trayectoria_alumno = $api->get($persona['id']);

            $data = compact('inscripcion','centro','alumno','persona','familiares','trayectoria_alumno');
        }

        return view('inscripciones.view',$data);
    }
}
