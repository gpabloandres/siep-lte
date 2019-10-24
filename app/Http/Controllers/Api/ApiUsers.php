<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiUsers extends Controller
{
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getAll($params=[])
    {
        $api = new ApiConsume(env('SIEP_AUTH_API'));
        $api->tokenHeader(ApiLogin::token());
        $api->get("acl/users",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function getId($id,$params=[])
    {
        $api = new ApiConsume(env('SIEP_AUTH_API'));
        $api->tokenHeader(ApiLogin::token());
        $api->get("acl/users/{$id}",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}