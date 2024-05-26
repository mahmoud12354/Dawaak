<?php

use App\Http\Controllers\Api\LoginContrller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AuthManager;
use Illuminate\Auth\Events\Logout;
use App\Http\Controllers\Api\dataController;
use App\Http\Controllers\Api\categoryController;
use Spatie\FlareClient\Api;
use Laravel\Sanctum\Sanctum;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//----------------------Dawaak-------------------------------------------------------------------------

Route::post('/login', [LoginContrller::class, 'login'])->name('login');

Route::post('/register', [LoginContrller::class, 'register'])->name('register');

Route::get('/logout', [LoginContrller::class, 'logout'])->name('logout');

route::get('/bestseller', [dataController::class, 'showbestseller'])->name('bestseller');

route::get('/newarrival', [dataController::class, 'shownewarrival'])->name('newarrival');

Route::post('/up', [dataController::class, 'up'])->name('up');

// ==================================add to cart=====================================================

Route::post('/addtocart/{id}', [dataController::class, 'addcart']);

//===============================Category==============================================================

Route::get('/category', [categoryController::class, 'category'])->name('category');

Route::get('/Stomach', [categoryController::class, 'Stomach'])->name('Stomach');

Route::get('/Cold', [categoryController::class, 'Cold'])->name('Cold');

Route::get('/Ear_Eye', [categoryController::class, 'Ear_Eye'])->name('Ear_Eye');

Route::get('/Painkillers', [categoryController::class, 'Painkillers'])->name('Painkillers');

Route::get('/Heart', [categoryController::class, 'Heart'])->name('Heart');

Route::get('/Diabetes', [categoryController::class, 'Diabetes'])->name('Diabetes');

Route::get('/Bones', [categoryController::class, 'Bones'])->name('Bones');

Route::get('/Dermatologic', [categoryController::class, 'Dermatologic'])->name('Dermatologic');

Route::get('/Teeth', [categoryController::class, 'Teeth'])->name('Teeth');

Route::get('/medicine_supllies', [categoryController::class, 'medicine_supllies'])->name('medicine_supllies');

Route::get('/vitamins', [categoryController::class, 'vitamins'])->name('vitamins');

Route::get('/Baby_Care', [categoryController::class, 'Baby_Care'])->name('Baby_Care');

Route::get('/Skin_Care', [categoryController::class, 'Skin_Care'])->name('Skin_Care');

Route::get('/Daily_Care', [categoryController::class, 'Daily_Care'])->name('Daily_Care');

Route::get('/all', [categoryController::class, 'all'])->name('all');
// ============================search========================================================================

Route::get('/search', [categoryController::class, 'search'])->name('search');

//-------------------------------admin-----------------------------------------------------------------------
route::post('/admin/product', [homeController::class, 'uploadbestseller'])->name('bestseller');

route::post('/admin/product1', [homeController::class, 'uploadnewarrival'])->name('newarrival');

route::post('/admin/category', [categoryController::class, 'uploadcategory'])->name('uploadcategory');

Route::post('/uploadrosheta', [dataController::class, 'uploadrosheta'])->name('uploadrosheta');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [DataController::class, 'profile']);
});