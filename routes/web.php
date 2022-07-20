<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Carcontroller;
use Illuminate\Http\Request;
// use App\Http\Controllers\Giaiptb1;
use App\Http\Controllers\Calculatorall;
use App\Http\Controllers\CalculatorRadion;
use App\Http\Controllers\PageController;

// use App\Http\Controllers\Carcontroller;

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

Route::resource('cars',Carcontroller::class);


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
Route::get('Calculator',function(){
    return view('Calculator');
});

Route::post('Calculator',[Calculatorall::class,'Tinhtoan'])-> name('Calculator.post'); 

Route::get('CaculatorRadio',function(){
    return view('CaculatorRadio');
});
Route::post('CaculatorRadio',[CalculatorRadion::class,'Tinhtoan'])->name('CaculatorRadio.post');
Route::get('ListCar', function () {
    return view('ListCar');
});
// ----------------------------------------------------------------
Route::post('CaculatorRadio',[CalculatorRadion::class,'Tinhtoan'])->name('CaculatorRadio.post');
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
Route::get('/', [PageController::class , 'getIndex']);
Route::get('/add-to-cart/{id}', [PageController::class , 'addToCart'])->name('addtocart'); //lien ket voi nut gio hang de them sp vao giop hang
Route::get('/type/{id}',[PageController::class,'productType'])->name('productType');
// -------------------
// Lấy danh sách sản phẩm
// Route::get('cars', 'Api\CarController@index')->name('Cars.index');

