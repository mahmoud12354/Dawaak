<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\BotmanController;
use Laravel\Sanctum\Sanctum;

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

//---------------------------------Login & Register-----------------------------------------
Route::get('/login', [AuthManager::class, 'login'])->name('login');

Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthManager::class,'register'])->name('register');

Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthManager::class,'logout'])->name('logout');
//-------------------------------------------------------------------------------------------------

route::get('/welcome',[homeController::class,'index'])->name('home');
//----------------------------------Donations---------------------------------------------------------------

Route::get('/donation', [homeController::class, 'donation'])->name('donation');

Route::post('/up', [homeController::class, 'up'])->name('up');
// ----------------------------------roshate===================================================================4

Route::get('/roheta', [homeController::class, 'rosheta'])->name('rosheta');

Route::post('/uploadrosheta', [homeController::class, 'uploadrosheta'])->name('uploadrosheta');
//----------------------------------profile---------------------------------------------------------------

Route::get('/profile',[homeController::class, 'profile'])->name('profile');

Route::post('/updatepassword', [homeController::class, 'updatePassword'])->name('updatepassword');

Route::post('/updateimage', [homeController::class, 'updateimage'])->name('updateimage');

//--------------------------------------Add to Card-----------------------------------------------------------

route::get('/add-to-cartg/{id}',[categoryController::class,'addtocartg'])->name('add_to_cartg');

route::get('/cart',[homeController::class,'cart'])->name('cart');

Route::delete('/remove-from-cart',[homeController::class,'remove'])->name('remove_from_cart');

Route::patch('/update-cart', [homeController::class, 'update'])->name('update_cart');

route::post('/upload_to_cart',[categoryController::class,'uploadToCart'])->name('upload_to_cart');

//--------------------------------view medicine-------------------------------------------
route::get('/view/{id}',[productsController::class,'viewMedicine'])->name('viewMedicine');

//--------------------------------Category-------------------------------------------------

Route::get('/category',[categoryController::class,'category'])->name('category');

Route::get('/Stomach',[categoryController::class,'Stomach'])->name('Stomach');

Route::get('/Cold',[categoryController::class,'Cold'])->name('Cold');

Route::get('/Ear_Eye',[categoryController::class,'Ear_Eye'])->name('Ear_Eye');

Route::get('/Painkillers',[categoryController::class,'Painkillers'])->name('Painkillers');

Route::get('/Diabetes',[categoryController::class,'Diabetes'])->name('Diabetes');

Route::get('/Dones',[categoryController::class,'Dones'])->name('Dones');

Route::get('/Dermatologic',[categoryController::class,'Dermatologic'])->name('Dermatologic');

Route::get('/Teeth',[categoryController::class,'Teeth'])->name('Teeth');

Route::get('/medicine_supllie',[categoryController::class,'medicine_supllie'])->name('medicine_supllie');

Route::get('/vitamins',[categoryController::class,'vitamins'])->name('vitamins');

Route::get('/all',[categoryController::class,'all'])->name('all');

// -----------Search --------------------------------------------------------------

Route::get('/search',[categoryController::class,'search'])->name('search');

//---------------admin-------------------------------------------------------------
Route::get('admin/Dasboard',[homeController::class,'dashboard'])->name('dashboard');
Route::get('admin/product',[homeController::class,'product'])->name('product');
Route::get('admin/product1',[homeController::class,'product1'])->name('product1');
Route::get('admin/category',[homeController::class,'product2'])->name('product2');
Route::Post('admin/uploadbestseller',[homeController::class,'uploadbestseller'])->name('uploadbestseller');
route::Post('admin/uploadnewarrival',[homeController::class,'uploadnewarrival'])->name('uploadnewarrival');
Route::Post('admin/uploadcategory',[categoryController::class,'uploadcategory'])->name('uploadcategory');
Route::get('admin/Donors',[homeController::class,'Donors'])->name('Donors');
Route::get('admin/Users',[homeController::class,'Users'])->name('Users');
route::get('admin/medicines',[homeController::class,'allmedincine'])->name('allmedincine');
route::get('admin/rosheta',[homeController::class,'adminrosheta'])->name('adminrosheta');

//------------------------------cahtbot----------------------------------------------

Route::match(['get','post'],'/botman',[BotmanController::class,'handle']);

route::get('chatbot',[BotmanController::class,'chatbot'])->name('chatbot');