<?php

namespace App\Http\Controllers\View\Admin;

use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiRoles;
use App\Http\Controllers\Controller;

class AdminRoles extends Controller
{
    public function index() {
        abort(503);
    }

    public function show() {
        abort(503);
    }

    public function store() {
        $api = new ApiRoles(ApiLogin::token());
        $response = $api->add(request('name'));
        if(isset($response['error'])) {
            return redirect(route('admin'))->withErrors(['admin.api.error'=>$response['error']]);
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id) {
        $api = new ApiRoles(ApiLogin::token());
        $response = $api->del($id);
        if(isset($response['error'])) {
            return redirect(route('admin'))->withErrors(['admin.api.error'=>$response['error']]);
        } else {
            return redirect()->back();
        }
    }
}