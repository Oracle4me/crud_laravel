<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
// Homepage with all data post
Route::get('/', PostController::class .'@index')->name('posts.index');
// Returns form for adding a post data
Route::get('/posts/create', PostController::class .'@create')->name('posts.create');
// Add a post to database
Route::post('/posts', PostController::class .'@store')->name('posts.store');
// returns a page that show a full post
Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
// Return to the form for editing a post
Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
// Update a post
Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
// Delete post
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');
