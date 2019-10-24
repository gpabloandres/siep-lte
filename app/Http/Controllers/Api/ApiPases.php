<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiPases extends Controller
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
        $api->get("api/v1/pases",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function store($params=[]) {
        $api = new ApiConsume();
        // Agrega user_id al request
        $params['user_id'] = ApiLogin::user('id');
        $api->post("api/v1/pases",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}