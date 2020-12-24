<?php

use App\Http\Controllers\ContactController;
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

Route::get('/test', function () {
    return view('admin.index');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('contacts')->group(function (){
    Route::get('/all', [ContactController::class, 'getAllContacts']);
    Route::get('/create', [ContactController::class, 'createContact'])->middleware('admin');
    Route::post('/store', [ContactController::class, 'storeContacts'])->middleware('admin');
});
