<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageControler;
use App\Models\Post;
use App\Models\User;

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

Route::get('postsdata', function () {
    $posts = Post::get();
    
    foreach($posts as $post){
        echo "$post->id <strong>{$post->user->name }</strong> $post->get_title <br>";

    };
});

Route::get('users', function () {
    $users = User::get();
    
    foreach($users as $user){
        echo "$user->id <strong>{$user->get_name }</strong> {$user->posts->count()} <br>";

    };
});
Route::get('collections', function () {
    $users = User::get();
    //dd($users);
    //dd($users->contains(5));
    //dd($users->except([1,2,3,4]));
    //dd($users->only(4));
    //dd($users->find(4));
    dd($users->load('posts'));
});
Route::get('serialization', function () {
    $users = User::get();
    //dd($users);
    //dd($users->contains(5));
    //dd($users->except([1,2,3,4]));
    //dd($users->only(4));
    //dd($users->find(4));
    dd($users->load('posts'));
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
