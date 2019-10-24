<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiTrayectoria extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function get($personaId,$params=[]) {
        $api = new ApiConsume();
        $api->get("api/v1/personas/{$personaId}/trayectoria",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}