<?php
Route::get('/login', 'Api\ApiLogin@index')->name('login');
Route::post('/login', 'Api\ApiLogin@start')->name('login');
Route::get('/logout', 'Api\ApiLogin@logout')->name('logout');

//--- Rutas con autentificacion ---//
Route::group(['middleware'=>'auth.api'],function(){
    Route::get('/', 'View\Home@index')->name('home');
    Route::get('/home', 'View\Home@index')->name('home');


    //--- Rutas de pagina ADMIN ---//
    Route::prefix('admin')->group(function () {
        Route::get('/', 'View\Admin\Admin@index')->name('admin');
        Route::resource('/users', 'View\Admin\AdminUsers');
        Route::resource('/roles', 'View\Admin\AdminRoles');
        Route::resource('/permisos', 'View\Admin\AdminPermisos');
    });

    Route::resource('inscripciones', 'View\Inscripciones');
    Route::resource('promocionados', 'View\Promocionados');
    Route::resource('repitentes', 'View\Repitentes');
    Route::resource('pases', 'View\Pases');

    Route::resource('centros', 'View\Centros');
    Route::resource('secciones', 'View\Secciones');

    Route::prefix('constancia')->group(function () {
        Route::get('/{id}', 'View\Constancias@inscripcion')->name('constancia.inscripcion');
        Route::get('/{id}/regular', 'View\Constancias@inscripcion_regular')->name('constancia.regular');
    });
});
//--- End Rutas con autentificacion ---//
