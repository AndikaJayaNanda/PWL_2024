<?php

use App\Http\Controllers\EventrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

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

/*Basic routing*/
Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/word', function () {
    return 'Word';
   });
   
Route::get('/selamat', function() {
    return 'Selamat Datang';
});
   
Route::get('/about', function() {
    return 'Nama : Andika Jaya Nanda <br />NIM :2341728017';
});
   
/*Route Paramteres*/    
Route::get ('/user/{name}',function($name){
    return 'Nama Saya '.$name;
});

Route::get ('/posts/{post}/comments/{comment}',function ($PostId, $commentId) {
    return 'Pos ke-'.$PostId.' Komentar ke : '.$commentId;
});

Route::get ('/articles/{articlsID}', function($ArtikelID) {
    return 'Ini adalah artike ke-'.$ArtikelID;
});

/*optional parameters*/
Route::get ('/user/{name?}', function ($name='John') {
    return 'Nama Saya '.$name;
});

/*Route Name*/
Route::get('/user/profile', function() {
    //
})->name('Profile');

/*Route Group dan Route Prefixes*/
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/',function (){
        // Uses first & second middleware
    });
    Route::get('/user/profile', function () {
        // Uses first & second middleware...
        });  
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id', function ($account, $id) {
        //
    });
});

Route::middleware('auth')->group (function() {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventrController::class, 'index']);
});

Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventrController::class, 'index']);
});

/*Redirect Routes*/
Route::redirect('/here', '/there');

/* View Routes*/
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

/*Route::prefix('Page')->group(function () {
    Route::get('/', [PageController::class,'index']);
    Route::get('/about', [PageController::class, 'about']);
    Route::get('/articles/{id}', [PageController::class, 'articles'],);
});
*/

//Single action modify
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/articles/{id}', [HomeController::class, 'articles']);

/*Resource Controller*/ 
Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
   ]);
Route::resource('photos', PhotoController::class)->except([
'create', 'store', 'update', 'destroy'
]);
   
//view
Route::get('/greeting',[WelcomeController::class, 'greeting']); 
    
