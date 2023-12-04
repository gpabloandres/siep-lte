<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiRoles extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll($params=[]) {
        $api = new ApiConsume(env('SIEP_AUTH_API'),$this->token);
        $api->get("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
    
    public function add($name) {
        $params['name'] = $name;

        $api = new ApiConsume(env('SIEP_AUTH_API'),$this->token);
        $api->post("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function del($id) {
        $params['id'] = $id;
        $api = new ApiConsume(env('SIEP_AUTH_API'),$this->token);
        $api->delete("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
   }
}