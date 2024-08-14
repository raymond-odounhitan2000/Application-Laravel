<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function()
{
    Route::get('/home',[ ArticleController::class, 'showAll'])->name('home');
    // Articles
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
});


Route::get('/', function () {return view('welcome');})->name('welcome');

// Login route
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');


//register route
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('register.post');

//forget password
Route::get('/forgot-password', [AuthController::class, 'forgetPassword'])->name('forget.password');
// Envoyer l'e-mail de réinitialisation du mot de passe
Route::post('/forgot-password', [AuthController::class, 'forgetPasswordPost'])->name('forget.password.post');
// Afficher le formulaire de réinitialisation du mot de passe
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset.password');
// Réinitialiser le mot de passe
Route::post('/reset-password', [AuthController::class, 'resetPasswordPost'])->name('password.update.post');

//logout

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
