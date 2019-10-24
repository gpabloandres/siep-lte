<?php

namespace App\Http\Controllers\View\Admin;

use App\Http\Controllers\Api\ApiCiclos;
use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiPermisos;
use App\Http\Controllers\Api\ApiRoles;
use App\Http\Controllers\Api\ApiUsers;
use App\Http\Controllers\Controller;

class Admin extends Controller
{
    public function index() {
        $token = ApiLogin::token();

        $reqUsers = new ApiUsers($token);
        $reqRoles = new ApiRoles($token);
        $reqPermisos = new ApiPermisos($token);
        $reqCiclos = new ApiCiclos($token);

        $users = $reqUsers->getAll([
            'page' => request('users_table_page'),
            'find' => request('users_table_search')
        ]);

        $roles = $reqRoles->getAll();
        $permisos = $reqPermisos->getAll();
        $ciclos = $reqCiclos->getAll();
        $ciclos = $ciclos['ciclos'];

        $render = compact('users','roles','permisos','ciclos');

        return view('admin.index',$render);
    }
}