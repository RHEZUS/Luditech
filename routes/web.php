<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dasboard',function(){
    return view('dashboard/dashboard');
})->name('dashboard');

Route::get('/dasboard/form',[ArticleController::class, 'create'])->name('create_article');
Route::post('/dasboard/form',[ArticleController::class, 'store'])->name('store_article');

Route::get('/dasboard/edit/{id}',[ArticleController::class, 'edit'])->name('edit_article');
Route::post('/dasboard/update',[ArticleController::class, 'update'])->name('update_article');

Route::get('/dasboard/list',[ArticleController::class, 'list'])->name('list_article');
Route::get('/dasboard/delete/{id}',[ArticleController::class, 'delete']);

