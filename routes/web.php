<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Carcontroller;
use Illuminate\Http\Request;
use App\Http\Controllers\Calculatorall;
use App\Http\Controllers\CalculatorRadion;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminLoginMiddldeware;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cars', Carcontroller::class);


// route này tương đương với 7 route như sau:

// 1.Route::get('cars', [CarController::class, 'index'])--> name ("cars.index");
// 2.Route::get('cars/create', [CarController::class, 'create'])--> name ("cars.create");
// 3.Route::post('cars', [CarController::class, 'store'])--> name ("cars.store");
// 4.Route::get('cars/{car}', [CarController::class, 'show']);
// 5.Route::get('cars/{car}', [CarController::class, 'delete']);
// 6.Route::put('cars/{car}', [CarController::class, 'update']);=>name('cars.update')
// 7.Route::delete('cars/{car}', [CarController::class, 'destroy']);=>name('cars.destroy')

// Route::get('ptb1',function(){
//     return view('ptb1');
// });
Route::get('Calculator', function () {
    return view('Calculator');
});

Route::post('Calculator', [Calculatorall::class,'Tinhtoan'])-> name('Calculator.post');

Route::get('CaculatorRadio', function () {
    return view('CaculatorRadio');
});
Route::post('CaculatorRadio', [CalculatorRadion::class,'Tinhtoan'])->name('CaculatorRadio.post');
Route::get('ListCar', function () {
    return view('ListCar');
});
// ----------------------------------------------------------------
Route::post('CaculatorRadio', [CalculatorRadion::class,'Tinhtoan'])->name('CaculatorRadio.post');
Route::get('ListCar', function () {
    return view('ListCar');
});


// ---------------
// Route::get('/', function () {
//     return view('ban hang.index');
// });
// Route::get('/detail', function () {
//     return view('ban hang.detail');
// });
Route::get('/', [PageController::class , 'getIndex'])->name('index');

Route::get('/add-to-cart/{id}', [PageController::class , 'addToCart'])->name('addtocart'); //lien ket voi nut gio hang de them sp vao giop hang
// Route::get('/type/{id}',[PageController::class,'productType'])->name('productType');
Route::get('del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');


Route::get('/checkout', [PageController::class , 'getCheckout'])->name('checkout');
Route::post('/checkout', [PageController::class , 'postCheckout'])->name('checkout');

Route::get('/lienhe', [PageController::class , 'getLienHe']);
Route::get('/gioithieu', [PageController::class , 'getGioiThieu']);

Route::get('/chi-tiet-sp/
{id}', [PageController::class , 'getChiTietSP'])->name('chitietsanpham');
Route::get('/type/{id}', [PageController::class , 'getLoaiSp']);
// Route::get('logout', [PageController::class, 'postLogout'])->name('logout');
Route::get('/login', [PageController::class , 'getLogin'])->name('login');
Route::post('/login', [PageController::class , 'postLogin'])->name('login');

Route::get('/singup', [PageController::class , 'getSingUp'])->name('singup');
Route::post('/singup', [PageController::class , 'postSingUp'])->name('singup');

Route::get('/logout',[PageController::class,'getLogout'])->name('logout');


// -------------------
// Lấy danh sách sản phẩm
// Route::get('cars', 'Api\CarController@index')->name('Cars.index');

// ------------------vnpay------------
Route::get('/vnpay-index', function () {
    return view('vnpay-index');
});
    //Route xử lý nút Xác nhận thanh toán trên trang checkout.blade.php
    Route::post('/vnpay/create_payment', [PageController::class,'createPayment'])->name('postCreatePayment');
    //Route để gán cho key "vnp_ReturnUrl" ở bước 6
    Route::get('/vnpay/vnpay_return', [PageController::class,'vnpayReturn'])->name('vnpayReturn');

    //Route xử lý nút Xác nhận thanh toán trên trang checkout.blade.php
Route::post('vnpay_payment', [PageController::class,'vnpay_payment'])->name('vnpay_payment');


// ---------------------------------------------------------ADMIN-----------------------------------------------------------------------------------------------


Route::get('/admin/login', [UserController::class, 'getLogin'])->name('admin.category.login');
Route::post('/admin/login', [UserController::class, 'postLogin'])->name('admin.category.login');
// Route::get('/admin/logout',[UserController::class,'getLogout'])->name('admin.category.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'], function () {
    Route::group(['prefix' => 'category'], function () {
        // admin/category/danhsach
        Route::get('/category-list', [CategoryController::class, 'getCategoryList'])->name('admin.category-list');
        // Route::get('them',[CategoryController::class,'getCateAdd'])->name('admin.getCateAdd');
        // Route::post('them',[CategoryController::class,'postCateAdd'])->name('admin.postCateAdd');
        // Route::get('xoa/{id}',[CategoryController::class,'getCateDelete'])->name('admin.getCateDelete');
        // Route::get('sua/{id}',[CategoryController::class,'getCateEdit'])->name('admin.getCateEdit');
        // Route::post('sua/{id}',[CategoryController::class,'postCateEdit'])->name('admin.postCateEdit');
    });
});
Route::get('/category-add', [CategoryController::class , 'getAdminpage'])->name('add-product');
Route::post('/category-add', [CategoryController::class , 'postAdminAdd'])->name('add-product');
Route::get('/category-list',[CategoryController::class, 'getIndexAdmin']);

// ---
Route::get('/admin-edit-form/{id}',[CategoryController::class,'getAdminEdit'])->name('get-edit-product');
Route::post('/admin-edit',[CategoryController::class,'postAdminEdit'])->name('edit-product');


Route::post('/admin-delete/{id}',[CategoryController::class,'postAdminDelete'])->name('post-delete-product');

// --------------------SEND EMAILS
Route::get('/input-email',[PageController::class,'getInputEmail'])->name('getInputEmail');
Route::post('/input-email',[PageController::class,'postInputEmail'])->name('postInputEmail');

Route::get('/send-email',[PageController::class,'getEmailBill'])->name('getSendEmailBill');
// Route::post('/input-email',[PageController::class,'postInputEmail'])->name('postInputEmail');