<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoControllerFacade;


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

Route::get('/', [HomeController::class,'index'])->name('home');
//Route::get('/todo', [TodoController::class,'index'])->name('todo');

/*
Route::prefix('/todo')->group(function(){
    Route::get('/', [TodoController::class,'index'])->name('todo');
    Route::post('/store', [TodoController::class,'store'])->name('todo.store');
    Route::get('/edit', [TodoController::class,'edit'])->name('todo.edit');
    Route::get('/{task_id}/delete', [TodoController::class,'delete'])->name('todo.delete');
    Route::get('/{task_id}/done', [TodoController::class,'done'])->name('todo.done');
    Route::get('/{task_id}/update', [TodoController::class,'update'])->name('todo.update');
});
*/


Route::prefix('/todo')->group(function(){
    Route::get('/', [TodoControllerFacade::class,'index'])->name('todo');
    Route::post('/store', [TodoControllerFacade::class,'store'])->name('todo.store');
    Route::get('/edit', [TodoControllerFacade::class,'edit'])->name('todo.edit');
    Route::get('/{task_id}/delete', [TodoControllerFacade::class,'delete'])->name('todo.delete');
    Route::get('/{task_id}/done', [TodoControllerFacade::class,'done'])->name('todo.done');
    Route::post('/{task_id}/update', [TodoControllerFacade::class,'updatee'])->name('todo.update');
});



//Route::resource('/', HomeController::class);
//Route::get('/', 'App\Http\Controllers\HomeController@index');
