<?php

use App\Http\Controllers\FrontController;
use App\Http\Middleware\ExplorAuth;
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

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/login', [FrontController::class, 'login'])->name('front.login');
Route::get('/signin', [FrontController::class, 'signin'])->name('front.login');
Route::get('/search', [FrontController::class, 'search'])->name('front.search');
Route::get('/details', [FrontController::class, 'details'])->name('front.details');
Route::get('/checkout', [FrontController::class, 'checkout'])->name('front.checkout');
Route::get('/status-checkout', [FrontController::class, 'status_checkout'])->name('front.status_checkout');

Route::prefix('/admin')->middleware(ExplorAuth::class)->group(function() {
    
});
// Route::get('/services', [LandingPageController::class, 'services'])->name('landing.services');
// Route::get('/portofolio', [LandingPageController::class, 'portofolio'])->name('landing.portofolio');
// Route::get('/about', [LandingPageController::class, 'about'])->name('landing.about');
// Route::get('/contacts', [LandingPageController::class, 'contacts'])->name('landing.contacts');


// Route::get('/inventory', function () {
//     return redirect()->route('auth.login');
// });
// Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
// Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
// Route::post('/login_process', [AuthController::class, 'login_process'])->name('auth.login_process');
