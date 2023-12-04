<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ApiInscripciones extends Controller
{
    public $token;
    public $error;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll($params=[])
    {
        $default = [
            'ciclo' => Carbon::now()->year,
            'estado_inscripcion' => 'CONFIRMADA'
        ];

        $api = new ApiConsume();
        $params= array_merge($default,$params);
        $api->get("api/v1/inscripcion/lista",$params);

        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function getId($id,$params=[])
    {
        $api = new ApiConsume();
        $api->get("api/v1/inscripcion/id/{$id}",$params);

        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();

        return $response;
    }
}