<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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

Route::get('/', [PagesController::class, 'index']);


Route::middleware('is_user')->group(function (){
    Route::get('/about', [PagesController::class, 'about']);
    Route::get('/services', [PagesController::class, 'services']);
    Route::get('post', [PostsController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('post/create', [PostsController::class, 'create']);
    Route::post('post', [PostsController::class, 'store']);
    Route::get('post/{id}', [PostsController::class, 'show']);
    Route::get('post/{id}/edit', [PostsController::class, 'edit']);
    Route::post('post/{id}', [PostsController::class, 'update']);
    Route::get('/post/delete/{id}', [PostsController::class, 'destroy']);
});


//Route::resource('/post', PostsController::class);


Auth::routes();

