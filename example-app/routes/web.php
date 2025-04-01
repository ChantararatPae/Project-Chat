<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseAuthController;
use App\Http\Controllers\Firebase\ContactController;
use App\Http\Controllers\Firebase\LoginController;
use App\Http\Controllers\Firebase\HomeController;
use App\Http\Controllers\Firebase\LoginFirebaseService;

use App\Http\Controllers\Firebase\TestFirebaseController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/home', [HomeController::class, 'home']);

Route::get('/่forget-password', function () {
    return view('forget-password');
});

Route::get('/press-release', function () {
    return view('press-release');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/test', function () {
    return view('test');
});

Route::post('/', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::get('/EmployeeTable', [ContactController::class, '__EmployeeTable']); ไม่ต้องการให้แสดง
Route::get('/employee', [ContactController::class, '__EmployeeTable']);

Route::get('add-employee', [ContactController::class, 'CreateEmployee']);
Route::post('add-employee', [ContactController::class, 'store']);



