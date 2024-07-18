<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', [TaskController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/dashboard/creartask', [TaskController::class, 'create'])
    ->middleware(['auth'])
    ->name('create');

Route::post('/dashboard/guardartask', [TaskController::class, 'store'])
    ->middleware(['auth'])
    ->name('nuevotask');

    Route::get('/dashboard/editartask/{task}', [TaskController::class, 'edit'])
    ->middleware(['auth'])
    ->name('editar');

    Route::put('/dashboard/actualizartask/{id}', [TaskController::class, 'update'])
    ->middleware(['auth'])
    ->name('actualizar');

    Route::delete('/dashboard/eliminartask/{id}', [TaskController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('eliminar');

    Route::post('/dashboard/buscartask', [TaskController::class, 'buscarTareas'])
    ->middleware(['auth'])
    ->name('buscarTareas');
   
require __DIR__.'/auth.php';
