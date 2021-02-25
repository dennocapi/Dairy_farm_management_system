<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::resource('/','App\Http\Controllers\CowsController');
Route::resource('cows','App\Http\Controllers\CowsController');
Route::resource('milk','App\Http\Controllers\MilkController');
Route::resource('health','App\Http\Controllers\HealthController');
Route::resource('inventory','App\Http\Controllers\InventoryController');
Route::resource('staff','App\Http\Controllers\StaffController');
Route::resource('dairy','App\Http\Controllers\DairyController');
Route::resource('pregnancy','App\Http\Controllers\PregnancyController');

Route::get('/milk/{cow_id}/show_all', [App\Http\Controllers\MilkController::class, 'show_all']);
Route::get('/health/{cow_id}/show_all', [App\Http\Controllers\HealthController::class, 'show_all']);

Route::post('/cow/search', ['uses' => 'App\Http\Controllers\CowsController@search']);
Route::post('/dairy/search', ['uses' => 'App\Http\Controllers\DairyController@search']);
Route::post('/health/search', ['uses' => 'App\Http\Controllers\HealthController@search']);
Route::post('/inventory/search', ['uses' => 'App\Http\Controllers\InventoryController@search']);
Route::post('/milk/search', ['uses' => 'App\Http\Controllers\MilkController@search']);
Route::post('/pregnancy/search', ['uses' => 'App\Http\Controllers\PregnancyController@search']);
Route::post('/staff/search', ['uses' => 'App\Http\Controllers\StaffController@search']);

Auth::routes();
