<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiCiclos extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll()
    {
        $api = new ApiConsume();
        $api->get("api/forms/ciclos");
        if($api->hasError()) { return $api->getError(); }
        $ciclos = $api->response();

        return compact('ciclos');
    }
}