<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminController;
use App\Http\Controllers\MicroserviceController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PeminController::class)->prefix('pemin')->group(function () {
    Route::get('distributor', 'getDistributors');
    Route::get('product', 'getProducts');
    Route::get('sale', 'getSales');
    Route::get('distributor/{id}', 'findDistributor');
    Route::get('product/{id}', 'findProduct');
    Route::get('sale/{id}', 'findSale');
    Route::post('sale', 'storeSale');
});