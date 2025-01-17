<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {

    $path = file_get_contents(resource_path("posts/{$slug}.html"));

    if(!file_exists($path)) {
        abort(404);
    }

    return view('post', [
        'post' => $path
    ]);
});