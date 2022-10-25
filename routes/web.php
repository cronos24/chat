<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\ChatsController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', [MensajesController::class, 'index'])->middleware(['auth', 'verified'])->name('about');


Route::get('/chat', [ChatsController::class, 'index'])->middleware(['auth', 'verified'])->name('chat');
Route::get('/messages', [ChatsController::class, 'fetchMessages'])->middleware(['auth', 'verified']);
Route::post('/messages', [ChatsController::class, 'sendMessage'])->middleware(['auth', 'verified']);
Route::delete('/messages/{id}', [ChatsController::class, 'destroy'])->middleware(['auth', 'verified']);



require __DIR__.'/auth.php';
