<?php


use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->posts()->latest()->get();
    }
 
    return view('home', ['posts' => $posts ]);
});

Route::post('/register', [UserController::class, 'register']);


Route::post('/logout', [UserController::class, 'logout']);

Route::post('/login',[UserController::class,'login']);


//Blog post relater routes

Route::post('/create-post',[PostController::class,'createPost']);