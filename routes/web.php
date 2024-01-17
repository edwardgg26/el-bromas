<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', HomeController::class)->name('home');

//Registro de usuarios
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Manejo de sesiones
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Rutas para perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

//Manejo de perfiles y memes
Route::get('/{user:username}', [MemeController::class, 'index'])->name('memes.index');
Route::get('/memes/create', [MemeController::class, 'create'])->name('memes.create');
Route::post('/memes', [MemeController::class, 'store'])->name('memes.store');
Route::get('/{user:username}/meme/{meme}', [MemeController::class, 'show'])->name('memes.show');
Route::delete('/meme/{meme}', [MemeController::class, 'destroy'])->name('memes.destroy');
//Likes de memes
Route::post('/meme/{meme}/likes', [LikeController::class, 'store'])->name('meme.likes.store');
Route::delete('/meme/{meme}/likes', [LikeController::class, 'destroy'])->name('meme.likes.destroy');

//Seguimiento de usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');

//Comentarios
Route::post('/{user:username}/meme/{meme}', [ComentarioController::class, 'store'])->name('comentarios.store');

//Manejo de imagenes
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');