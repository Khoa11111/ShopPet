<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/checkout', [CheckOutController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/detail/{id}', [DetailController::class, 'index']);

Route::post('/add_cart/{id}', [CartController::class, 'add_cart']);

Route::get('/show_cart', [CartController::class, 'show_cart']);

Route::get('/remove_cart/{id}', [CartController::class, 'remove_cart']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/detail/{id}', [DetailController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('forget-passord',[ForgetPasswordController::class, 'index'])->name('forget-password');
Route::post('forget-passord',[ForgetPasswordController::class, 'forgetPasswordPost'])->name('forget-password.post');

Route::get('reset-password/{token}',[ForgetPasswordController::class,  'resetPassword'])->name('reset.password');
Route::post('reset-password',[ForgetPasswordController::class,  'resetPasswordPost'])->name('reset.password.post');