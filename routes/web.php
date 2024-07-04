<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\TypeBienController;
use App\Models\Client;
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

Route::get('admin', function () {
    return view('Admin.login');
});

Route::post('doAdminLogin',[AdminController::class , "auth"])->name('authAdmin');

Route::get('admin/Dashboard', function () {
    return view('Admin.dashboard');
})->name('adminDashboard');

Route::get('admin/TypeDeBien', function () {
    return view('Admin.type_bien');
})->name('formTypeDeBien');

Route::get('admin/commission',[CommissionController::class,'index'])->name('formcommission');

Route::post('createTypeBien',[TypeBienController::class,"create"])->name('createTypeBien');
Route::post('updateCommission',[CommissionController::class,'update'])->name('updateCommission');

Route::get('/', function () {
    return view('Proprio.login');
});

Route::post("authProprio",[ProprietaireController::class,"auth"])->name('authProprio');

Route::get('Propietaire/Dashboard', function () {
    return view('Proprio.dashboard');
})->name("proprioDashboard");

Route::get('Proprietaire/formBien',[ProprietaireController::class,"formBien"])->name("formBien");

Route::post("createBien",[ProprietaireController::class,"create"])->name('createBien');

Route::get('Proprietaire/mesBiens',[ProprietaireController::class,"mesBiens"])->name("mesBiens");

Route::get('Client/',function()
{
    return view("Client.login");
})->name("authClient");

Route::post("authClient",[ClientController::class,"auth"])->name('authClient');

Route::get('Client/Dashboard', function () {
    return view('Client.Home');
})->name("proprioDashboard");

Route::get('admin/Location',[LocationController::class,"index"])->name("formLocation");


Route::post("admin/ADDLocation",[LocationController::class,"create"])->name('Location');

Route::post("admin/ca",[AdminController::class,"ca"])->name('ca');
Route::post("Proprietaire/ca",[AdminController::class,"caProproprio"])->name('caProproprio');


Route::post("admin/importcsv",[AdminController::class,"importcsv"])->name('importcsv');

Route::post("admin/csvBien",[AdminController::class,"csvBien"])->name('csvBien');


Route::get('admin/reset',[AdminController::class,"reset"])->name("reset");




Route::get("admin/loyer",[AdminController::class,"loyer"])->name('loyer');

Route::post("admin/dLocations",[AdminController::class,"dLocations"])->name('dLocations');


