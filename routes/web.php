<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;

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

// Store data from compose
Route::post('/inbox/compose/store', [CommonController::class, 'store'])->name("inbox.compose.store");
Route::post('/inbox/compose/update/{id}', [CommonController::class, 'update'])->name("inbox.compose.update");

// Show data in the inbox table
Route::get('/inbox/getdata', [CommonController::class, 'get']);

//Add 
Route::get('/inbox/add',[CommonController::class, 'addData']);
// Edit
Route::post('/inbox/edit',[CommonController::class, 'editData']);
// Inbox
Route::post('/inbox/delete', [CommonController::class, 'deleteData']);
// Details
Route::post('/inbox/details', [CommonController::class, 'details']);


Route::get('/inbox', function () {
    return view('user.inbox');
});

Route::get('/inbox/compose', function () {
    return view('user.compose', [
        'datas'=>null
    ]);
});




