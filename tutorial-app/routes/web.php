<?php

use App\Http\Controllers\RegisterForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
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

