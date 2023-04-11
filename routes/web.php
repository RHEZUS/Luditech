<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\DashboardAuth;
use App\Http\Controllers\ProfileController;

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

    ## create article
    
    Route::get('/dashboard/form',[ArticleController::class, 'create'])->name('create_article');
    Route::post('/dashboard/form',[ArticleController::class, 'store'])->name('store_article');

    ## update article
    
    Route::get('/dashboard/edit/{id}',[ArticleController::class, 'edit'])->name('edit_article');
    Route::post('/dashboard/update',[ArticleController::class, 'update'])->name('update_article');


    ##display the list of articles
    
    Route::get('/dashboard/articles',[ArticleController::class, 'list'])->name('list_article');

    ## delete article
    Route::get('/dashboard/delete/{id}',[ArticleController::class, 'delete']);
    
    ## Log out
    
    Route::get('dashboard/logout', [AuthController::class, 'logout'])->name('logoutu');

    ##create a new  user

    Route::get('/dashboard/profile/profile_form', [ProfileController::class, 'get_page'])->name('get_create_user');
    Route::post('/dashboard/profile/profile_form', [ProfileController::class, 'create'])->name('create_user');
    Route::get('/dashboard/profile/profile_list/', [ProfileController::class, 'list_profile'])->name('list_profile');

    Route::get('dashboard/user/delete/{id}', [ProfileController::class, 'delete']);
    Route::get('dashboard/user/edit/{id}', [ProfileController::class, 'edit']);
    Route::post('dashboard/user/update', [ProfileController::class, 'update'])->name('update_user');
    
});

Route::get('dashboard/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('dashboard/login', [AuthController::class, 'login'])->name('postLogin');

Auth::routes(); // why is this displaying undefined type Auth

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
