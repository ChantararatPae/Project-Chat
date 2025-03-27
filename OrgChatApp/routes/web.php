<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseAuthController;
use App\Http\Controllers\Firebase\ContactController;


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
});

Route::get('/่forget-password', function () {
    return view('forget-password');
});

Route::get('/press-release', function () {
    return view('press-release');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/employee', function () {
    return view('employee');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/EmployeeTable', function () {
    return view('data-management-table.EmployeeTable');
});

//Route::get('data-management-table', [ContactController::class, 'EmployeeTable']); //เมื่อผู้ใช้เข้าถึง URL yourdomain.com/data-management-table ระบบจะเรียกใช้ฟังก์ชันที่ระบุ
//ไม่จำเป็น เพราะเราไม่ได้ต้องการให้ใครเข้าถึง data-management-table แต่ต้องการให้เข้าถึง Employee.blade

Route::get('add-employee', [ContactController::class, 'CreateEmployee']);
Route::post('add-employee', [ContactController::class, 'store']);



