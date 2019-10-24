<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiSecciones extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll($params=[])
    {
        $api = new ApiConsume();
        $default = [
          'with' => 'centro'
        ];
        $params = array_merge($default,$params);
        $api->get("api/v1/cursos",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function getId($id,$params=[])
    {
        $api = new ApiConsume();
        $default = [
          'with' => 'centro'
        ];
        $params = array_merge($default,$params);

        $api->get("api/v1/cursos/{$id}",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}