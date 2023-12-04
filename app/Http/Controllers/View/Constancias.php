<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiConstancia;
use App\Http\Controllers\Api\ApiInscripciones;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiMatriculasCuantitativas;
use App\Http\Controllers\Api\ApiRepitentes;
use App\Http\Controllers\Api\ApiSecciones;
use App\Http\Controllers\Api\Util\BladeHelper;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Constancias extends Controller
{
    public function inscripcion($id)
    {
        $api = new ApiConstancia(ApiLogin::token());
        return $api->inscripcionPDF($id);
    }

    public function inscripcion_regular($id)
    {
        $api = new ApiConstancia(ApiLogin::token());
        return $api->regularPDF($id);
    }
}
