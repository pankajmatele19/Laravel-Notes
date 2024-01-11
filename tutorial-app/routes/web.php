<?php

use App\Http\Controllers\RegisterForm;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\CustomerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/demo',function() {
//     return view('hello');
// });

// Route::get('/array/{name}/{id}',function($name,$id) {
//     echo $name ." ".$id;
// });

// Route::get('/array/{name}/{id}',function($name,$id) {
//     $data = compact('name','id');
//     return view('hello')->with($data);
// });

// Route::get('/test/{uname?}',function($uname = null) {
//     $data = compact('uname');
//     return view('hello')->with($data);
// });

// Route::get('test1/{name}',function($name) {
//     $u  = '<h2>name</h2>';
//     $data = compact('u');
//     return view('hello')->with($data);
// });

// Route::get("/", function() {
//     return view('home');
// });

Route::get('/',[DemoController::class,'index']);

Route::get('/register',[RegisterForm::class, 'index']);

Route::post('/register',[RegisterForm::class, 'register']);

Route::get('/customer', function() {
    $customer = Customer::all();

    echo "<pre>";
    print_r($customer);
});

Route::get("/customer/regform",[CustomerController::class,"index"]);

Route::post("/customer/regform",[CustomerController::class,"store"]);

Route::get("/customer/view",[CustomerController::class,"view"]);

Route::get("/customer/delete/{customerid}",[CustomerController::class,"delete"]);

Route::post("/customer/update/{customerid}",[CustomerController::class,"update"]);

Route::get("/customer/edit/{customerid}",[CustomerController::class,"edit"]);

Route::get('/customer/login',[CustomerController::class,'loginform']);

Route::post('/customer/login',[CustomerController::class,'auth']);