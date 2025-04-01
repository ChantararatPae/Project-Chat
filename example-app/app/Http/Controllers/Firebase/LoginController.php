<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Kreait\Firebase\Auth;
use App\Http\Controllers\Firebase\LoginFirebaseService;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // สร้างอินสแตนซ์ของ LoginFirebaseService
        $firebaseService = new LoginFirebaseService();

        // ตรวจสอบข้อมูล login
        $employee_id = $firebaseService->login($username, $password);

        if ($employee_id) {
            // ถ้า login สำเร็จ เก็บ employee_id ใน session
            session(['employee_id' => $employee_id]);
            return redirect('/home'); // เมื่อเข้าสู่ระบบให้ไปยังหน้า home
        } else {
            // หาก login ไม่สำเร็จ
            return back()->withErrors(['error' => 'Username หรือ Password ไม่ถูกต้อง']);
        }
    }
    public function logout()
    {
        // การ logout ใน Laravel ใช้ auth()->logout()
        auth()->logout();
        
        // รีเซ็ต session
        session()->flush();

        // ไปยังหน้า login
        return redirect('/');
    }
}


