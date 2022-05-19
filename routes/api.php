<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::prefix('note')->name('note.')->group(function(){

    Route::post('create', [NoteController::class, 'create'])->name('create');
    Route::get('/', [NoteController::class, 'show'])->name('show');
    Route::get('/{id}', [NoteController::class, 'index'])->name('index');
    Route::put('/update/{id}', [NoteController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [NoteController::class, 'delete'])->name('delete');
});
