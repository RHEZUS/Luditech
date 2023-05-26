<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\DashboardAuth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CauseController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;

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
    return view('Website/home');
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
    


    ## event

    Route::get('dashboard/event-form', [EventController::class, 'eventForm'])->name('eventForm');
    Route::Post('dashboard/event-form', [EventController::class, 'storeEvent'])->name('store_event');
    ## event list
    Route::get('dashboard/event-list', [EventController::class, 'eventList'])->name('event_list');

    ## update event
    Route::get('dashboard/event/edit/{id}', [EventController::class, 'editEvent'])->name('event_get_update');
    Route::Post('dashboard/event/update', [EventController::class, 'updateEvent'])->name('update_event');

    ## delete event

    Route::get('dashboard/event/delete/{id}', [EventController::class, 'deleteEvent']);


    ## Create new cause
    Route::get('dashboard/causes/form',[CauseController::class, 'causeForm'])->name('cause_form');
    Route::post('dashboard/causes/form',[CauseController::class, 'store'])->name('store_cause');

    ##
    Route::get('dashboard/causes/list',[CauseController::class, 'causeList'])->name('cause-list');

    ##
    Route::get('/dashboard/causes/edit/{id}',[CauseController::class, 'editCause']);
    Route::post('dashboard/causes/edit/',[CauseController::class, 'causeUpdate'])->name('cause-update');
    Route::get('/dashboard/causes/delete/{id}',[CauseController::class, 'causeDelete']);

    ##products

    Route::get('/dashboard/products/form',[ProductController::class,'productForm'])-> name('product_form');
    Route::post('/dashboard/products/form',[ProductController::class,'storeProduct'])-> name('store_product');
    Route::get('/dashboard/products/list',[ProductController::class,'productList'])-> name('product_list');

    ## delete product
    Route::get('/dashboard/products/delete/{id}',[ProductController::class,'deleteProduct']);

    ## update a product
    Route::get('/dashboard/products/edit/{id}',[ProductController::class,'editProduct']);
    Route::post('/dashboard/products/update',[ProductController::class,'updateProduct'])->name('update_product');
    
    ## delete product image
    Route::get('/dashboard/products/image/delete/{id}',[ProductController::class,'deleteProductImage']);
});

Route::get('dashboard/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('dashboard/login', [AuthController::class, 'login'])->name('postLogin');

Auth::routes(); 

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blog',[BlogController::class,'getBlog'])->name('blog');
Route::get('/causes',[CauseController::class,'causes'])->name('causes');
Route::get('/events',[EventController::class,'events'])->name('events');
