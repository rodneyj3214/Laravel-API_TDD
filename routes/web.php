<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageControler;
use App\Models\Post;

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

Route::get('/', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::resource('pages', UserController::class); // Genera el crud

Route::view('vista','welcome');

Route::get('test', function () {
    return 'Rodeny';
});
Route::view('home','home');
Route::view('viewpost','post');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('eloquent', function () {
    //$posts = Post::all();
    $posts = Post::where('id','>=','5')
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();
    foreach($posts as $post){
        echo "$post->id $post->title <br>";

    };
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
