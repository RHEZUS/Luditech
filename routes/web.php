<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\DashboardAuth;

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

Route::group(['middleware'=> ['admin_auth']],function(){

    Route::get('/dashboard',function(){
        return view('dashboard/dashboard');
    })->name('dashboard');
    
    Route::get('/dashboard/form',[ArticleController::class, 'create'])->name('create_article');
    Route::post('/dashboard/form',[ArticleController::class, 'store'])->name('store_article');
    
    Route::get('/dashboard/edit/{id}',[ArticleController::class, 'edit'])->name('edit_article');
    Route::post('/dashboard/update',[ArticleController::class, 'update'])->name('update_article');
    
    Route::get('/dashboard/list',[ArticleController::class, 'list'])->name('list_article');
    Route::get('/dashboard/delete/{id}',[ArticleController::class, 'delete']);
    
    
    
    Route::get('dashboard/logout', [AuthController::class, 'logout'])->name('logoutu');
    
});

Route::get('dashboard/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('dashboard/login', [AuthController::class, 'login'])->name('postLogin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
