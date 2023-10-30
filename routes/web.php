<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\PostsController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\AboutusController;
use App\Http\Controllers\Dashboard\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


/*================Frontend=========================*/

Route::get('/',[HomeController::class,'index'])->name('homePage');
Route::get('/about-us',[AboutusController::class,'index'])->name('aboutus');
Route::get('/posts',[CategoryController::class,'index'])->name('category'); 


Route::get('/post/{id}',[PostController::class,'index'])->name('post'); 








/*================Admin=========================*/
//===========Auth==============//
Route::get('/login',[Auth::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('/register',[Auth::class,'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/login',[Auth::class,'userLogin'])->name('userLogin');
Route::post('/register',[Auth::class,'userRegister'])->name('userRegister');
Route::get('/logout',[Auth::class,'logout'])->name('logout');
Route::get('/admin',[Auth::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');


 
//===========User==============//
Route::get('/admin/users',[UserController::class,'index'])->name('user')->middleware('isLoggedIn');
Route::get('/userAdd',[UserController::class,'create'])->name('userAdd')->middleware('isLoggedIn');
Route::post('/userStore',[UserController::class,'store'])->name('userStore')->middleware('isLoggedIn');
Route::get('/userEdit/{id}',[UserController::class,'edit'])->name('userEdit')->middleware('isLoggedIn');
Route::get('/userDelete/{id}',[UserController::class,'destroy'])->name('userDelete')->middleware('isLoggedIn');
Route::post('/userUpdate/{id}',[UserController::class,'update'])->name('userUpdate')->middleware('isLoggedIn');


//===========Slider==============//
Route::get('/admin/sliders',[SliderController::class,'index'])->name('sliders');
Route::get('/sliderAdd',[SliderController::class,'create'])->name('sliderAdd');
Route::post('/sliderStore',[SliderController::class,'store'])->name('sliderStore');
Route::get('/sliderDelete/{id}',[SliderController::class,'destroy'])->name('sliderDelete');
Route::get('/sliderEdit/{id}',[SliderController::class,'edit'])->name('sliderEdit');
Route::post('/sliderUpdate/{id}',[SliderController::class,'update'])->name('sliderUpdate');
Route::get('/slider/{id}', [SliderController::class, 'updateStatus'])->name('updateStatus');

//===========Post==============//
Route::get('/admin/posts',[PostsController::class,'index'])->name('posts')->middleware('isLoggedIn');
Route::get('/postAdd',[PostsController::class,'create'])->name('postAdd')->middleware('isLoggedIn');
Route::post('/postStore',[PostsController::class,'store'])->name('postStore')->middleware('isLoggedIn');
Route::get('/postDelete/{id}',[PostsController::class,'destroy'])->name('postDelete')->middleware('isLoggedIn');
Route::get('/postEdit/{id}',[PostsController::class,'edit'])->name('postEdit')->middleware('isLoggedIn');
Route::get('/galleryDelete/{id}',[PostsController::class,'galleryDelete'])->name('galleryDelete')->middleware('isLoggedIn');
Route::post('/postUpdate/{id}',[PostsController::class,'update'])->name('postUpdate')->middleware('isLoggedIn');





//===========Setting==============//
Route::get('/admin/settings', function () {
    return view('dashboard.settings');
})->name('dashboard.settings')->middleware('isLoggedIn');

Route::post('dashboard/settings/update/{settings}',[SettingController::class,'update'])->name('settings.update');

