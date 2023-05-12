<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');    
    Route::group(['middleware' =>'auth'], function(){

    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    Route::get('/searchuser','App\Http\Controllers\UserController@searchuser'); 
    Route::get('User-list-excel', 'App\Http\Controllers\UserController@exportExcel')->name('User.excel');


    Route::resource('perfil', App\Http\Controllers\PerfilController::class);
    Route::resource('historial', App\Http\Controllers\HistorialController::class);
    Route::resource('permissions', App\Http\Controllers\permissionController::class);
    Route::resource('roles', App\Http\Controllers\rolesController::class);


    
    /* TIEMPO */

    Route::resource('ciclo', App\Http\Controllers\CicloController::class);
    Route::resource('ciclosalida', App\Http\Controllers\CicloSalidaController::class);
    Route::resource('ciclosalidaout', App\Http\Controllers\CicloSalidaTController::class);
    Route::resource('ciclobreakin',App\Http\Controllers\CicloBreakinController::class);
    Route::resource('ciclobreakout',App\Http\Controllers\CicloBreakoutController::class);
    Route::resource('ciclolunch',   App\Http\Controllers\CicloLunchController::class);
    Route::resource('ciclolunchout',App\Http\Controllers\CicloLunchOutController::class);
    Route::resource('ciclocapa', App\Http\Controllers\CicloCapaController::class);
    Route::resource('ciclocapout', App\Http\Controllers\CicloCapoutController::class);
    Route::resource('ciclopausas', App\Http\Controllers\CicloPausasController::class);
    Route::resource('ciclopausasout', App\Http\Controllers\CicloPausaOutController::class);
    Route::resource('cicloaveria',    App\Http\Controllers\CicloAveriaController::class);
    Route::resource('cicloaveriaout', App\Http\Controllers\CicloAveriaOutController::class);
    Route::resource('cicloeva',   App\Http\Controllers\CicloEvaController::class);
    Route::resource('cicloevaout',App\Http\Controllers\CicloEvaOutController::class);
    Route::resource('cicloretro',App\Http\Controllers\CicloRetroController::class);
    Route::resource('cicloretroout',App\Http\Controllers\CicloRetroOutController::class);
    Route::resource('cicloreunion',  App\Http\Controllers\CicloReunionController::class);
    Route::resource('cicloreunionout', App\Http\Controllers\CicloReunionOutController::class);
    Route::resource('personalgeneral', App\Http\Controllers\PersonalActivoController::class);
    Route::resource('noticias', App\Http\Controllers\NoticiasController::class);
    Route::resource('convenios', App\Http\Controllers\ConveniosController::class);

/*     Route::get('/searchbackoffice','App\Http\Controllers\BackofficeController@searchbackoffice');
 */    
    Route::get('/searchpersonalgeneral','App\Http\Controllers\PersonalActivoController@searchpersonalgeneral');

    Route::get('ciclo-list-excel', 'App\Http\Controllers\PersonalActivoController@exportExcel')->name('ciclo.excel');



 /* personal de supervisores exporte */

    Route::resource('superpersonal', App\Http\Controllers\PersonalSuperController::class);

    Route::get('/searchpersonalgeneral','App\Http\Controllers\PersonalActivoController@searchpersonalgeneral');
    Route::get('/searchsuperpersonal','App\Http\Controllers\PersonalSuperController@searchsuperpersonal');
    Route::get('/searchsuperpersonalindex','App\Http\Controllers\PersonalSuperController@searchsuperpersonalindex');

    Route::get('hora-list-excel', 'App\Http\Controllers\PersonalSuperController@exportExcel')->name('superpersonal.excel');
   
    // Rutas Mallas
    Route::resource('mallas', App\Http\Controllers\MallasController::class);
  

  
});
