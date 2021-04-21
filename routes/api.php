<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('articles', [ArticleController::class, 'index'])->name('article.index');
*/

//Route::resource('articles', ArticleController::class)->names('articles');
//Route::resource('users', UserController::class)->names('user');


Route::post('register', [UserController::class, 'register'])->name('users.register');
Route::post('login', [UserController::class, 'authenticate'])->name('login.authenticate');
Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('users', [UserController::class, 'getAuthenticatedUser'])->name('users.getAuthenticatedUser'); //good

    //Articles
    Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show'); //good
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store'); //good
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update'); //good
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.delete');

    //Comment
    Route::get('articles/{article}/comments', [CommentController::class, 'index'])->name('comments.index'); //good
    Route::get('articles/{article}/comments/{comment}', [CommentController::class, 'show'])->name('comments.show'); //good
    Route::post('articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store'); //good
    Route::put('articles/{article}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update'); //good
    Route::delete('articles/{article}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');


});
