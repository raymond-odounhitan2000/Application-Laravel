<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function()
    {
        Route::get('/', function () {return view('Home');})->name('home');
        Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    });

Route::get('/', function () {return view('welcome');});

// Login route
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');


//register route
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('register.post');

//reset password
Route::get('/forgot-password', [AuthController::class, 'password_forget'])
    ->middleware('guest')->name('password.request');
// Envoyer l'e-mail de réinitialisation du mot de passe
Route::post('/forgot-password', [AuthController::class, 'password_forgetPost'])
    ->middleware('guest')->name('password.email');
// Afficher le formulaire de réinitialisation du mot de passe
Route::get('/reset-password/{token}', [AuthController::class, 'resetpassword'])
    ->middleware('guest')->name('password.reset');
// Réinitialiser le mot de passe
Route::post('/reset-password', [AuthController::class, 'resetedPassword'])
    ->middleware('guest')->name('password.update');

    //Articles

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

//logout

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/', function () {
        // ...
    });
});








