<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiPromocionados extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll($ciclo)
    {
        $api = new ApiConsume();
        $params['ciclo'] = $ciclo;
        $params['page'] = request('page');
        $api->get("api/v1/promocion",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}