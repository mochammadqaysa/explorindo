<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login_process', [AuthController::class, 'login_process'])->name('admin.login_process');
Route::prefix('/admin')->middleware(ExplorAuth::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resources(['user' => UserController::class]);
    Route::resources(['role' => RoleController::class]);
    Route::resources(['module' => ModuleController::class]);
    Route::resources(['permission' => PermissionController::class]);
    Route::resources(['tour' => PlaceController::class]);


    Route::prefix('role')->group(function () {
        Route::get('/permission/{uid}', [RoleController::class, 'permission'])->name('role.permission');
        Route::put('/permission/{uid}', [RoleController::class, 'permission_store'])->name('role.update_permission');
    });
    Route::prefix('select2')->group(function () {
        Route::get('/role', [RoleController::class, 'select2'])->name('select2.role');
    });
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
