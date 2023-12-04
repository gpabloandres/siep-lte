<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiMatriculasCuantitativas;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        $user = ApiLogin::user();

        $route_centro_show = route('centros.show',$user['centro']['id']);
        return redirect($route_centro_show);
    }
}
