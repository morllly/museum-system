<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ExhibitController;
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

Route::view('/', 'welcome');


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'admin.'], function () {
    Route::get('/', HomeController::class)->name('home');

    Route::resource('/exhibits', ExhibitController::class);
    Route::post('/exhibits/import', [ExhibitController::class, 'import']);
    });
});


require __DIR__ . '/auth.php';
