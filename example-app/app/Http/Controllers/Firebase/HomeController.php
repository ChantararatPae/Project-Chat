<?php


namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        // แสดงหน้า home หลังทำการเข้าสู่ระบบ
        return view('home');
    }
}
