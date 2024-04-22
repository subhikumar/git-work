<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController as AdminPostController;
use App\Http\Controllers\AuthuserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\front\PostController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\CommentController as SingleCommentController;

use App\Http\Middleware\Authenticate;
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


// Route::get('/', function () {
//     return view('welcome');
// });

//<------Admin Routes----->//

//Auth
Route::get('/register',[AuthuserController::class,'register'])->name('register');
Route::post('/register/store',[AuthuserController::class,'registerstore'])->name('store.register');
Route::get('/login',[AuthuserController::class,'login'])->name('login');
Route::post('/store',[AuthuserController::class,'store'])->name('store.login');

Route::middleware(['auth'])->group(function(){

Route::get('/dashboard',[AuthuserController::class,'dashboard'])->name('dashboard');
Route::get('/logout',[AuthuserController::class,'logout'])->name('logout');

//post
Route::controller(AdminPostController::class)
->prefix('post')
->group(function () {
    Route::get('index','index')->name('index.post');
    Route::get('add','add')->name('add.post');
    Route::post('store','store')->name('store.post');
    Route::get('edit/{id}','edit')->name('edit.post');
    Route::post('update/{id}','update')->name('update.post');
    Route::get('delete/{id}','delete')->name('delete.post');
});

//page
Route::controller(PageController::class)
->prefix('page')
->group(function () {
    Route::get('index','index')->name('index.page');
    Route::get('add','add')->name('add.page');
    Route::post('store','store')->name('store.page');
    Route::get('edit/{id}','edit')->name('edit.page');
    Route::post('update/{id}','update')->name('update.page');
    Route::get('delete/{id}','delete')->name('delete.page');
});


//Contact
Route::controller(ContactController::class)
->prefix('contact')
->group(function () {
    Route::get('index','index')->name('index.contact');
    Route::get('edit/{id}','edit')->name('edit.contact');
    Route::post('update/{id}','update')->name('update.contact');
    Route::get('delete/{id}','delete')->name('delete.contact');
});

//---->Admin Comment Controller<-----//
// Route::controller(CommentController::class)
// ->prefix('comment')
// ->group(function () {
//     Route::get('index','index')->name('index.comment');
//     Route::get('delete/{id}','delete')->name('delete.comment');
// });

Route::namespace('front')->group(function () {
    Route::get('index/comment', [CommentController::class,'indexComment'])->name('index.comment');
});
Route::namespace('front')->group(function () {
    Route::get('delete/comment/{id}', [CommentController::class,'deleteComment'])->name('delete.comment');
});
});
//<------Frontend Routes----->//

Route::namespace('front')->group(function () {
    Route::get('/home', [PostController::class,'home'])->name('home');
});

Route::namespace('front')->group(function () {
    Route::get('post/{id}', [PostController::class,'post'])->name('post');
});

Route::get('about', [PostController::class,'about'])->name('about');


Route::get('contact', [PostController::class,'contact'])->name('contact');
Route::post('store/contact', [ContactController::class,'storeContact'])->name('store.contact');

//<------Comment & Like Routes----->//

Route::post('store/comment/{id}', [SingleCommentController::class,'commentstore'])->name('store.comment');
Route::post('like', [SingleCommentController::class,'like'])->name('like');
