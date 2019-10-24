<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiConstancia extends Controller
{
    public $token;
    public $error;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function inscripcionPDF($inscripcion_id)
    {
        $api = new ApiConsume();
        $api->forceDownload();
        $api->get("api/v1/constancia/{$inscripcion_id}");

        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();

        return response($response)->header('Content-Type', 'application/pdf');

/*        return response()->streamDownload(function () use($response) {
            echo $response;
        }, 'test.pdf');*/
    }
    public function regularPDF($inscripcion_id)
    {
        $api = new ApiConsume();
        $api->forceDownload();
        $api->get("api/v1/constancia_regular/{$inscripcion_id}");

        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();

        return response($response)->header('Content-Type', 'application/pdf');
    }
}