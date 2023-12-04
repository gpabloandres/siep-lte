<?php

namespace App\Http\Controllers\Api\Util;

use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BladeHelper extends Controller
{
    public static function bladeRol($rol) {
        $user = ApiLogin::user();
        $roles = $user['acl']['roles'];
        $access = collect($roles)->contains($rol);
        return $access;
    }

    public static function bladePermiso($permiso) {
        $user = ApiLogin::user();
        $permisos = $user['acl']['permisos'];
        $access = collect($permisos)->contains($permiso);
        return $access;
    }

    public static function bladeUser() {
        if(ApiLogin::user() === null) {
            return false;
        } else {
            return true;
        }
    }

    public static function bladeGitBuild() {
        $master_commit = 'local';
        $dev_commit = 'local';

        if(Storage::disk('public')->exists('master.json'))
        {
            $master = Storage::disk('public')->get('master.json');
            $master  = json_decode($master);
            $master_commit = substr($master->sha,0,7);
        }

        if(Storage::disk('public')->exists('developer.json')) {
            $dev = Storage::disk('public')->get('developer.json');
            $dev = json_decode($dev);
            $dev_commit = substr($dev->sha, 0, 7);
        }

        return "Master: $master_commit -  Developer: $dev_commit";
    }
}