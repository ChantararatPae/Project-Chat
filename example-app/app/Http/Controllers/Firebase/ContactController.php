<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;

class ContactController extends Controller //คลาส ContactController จัดการข้อมูลที่เกี่ยวข้องกับหน้า employee
{
    public function __construct()
    {
        $factory = (new Factory) //สร้างอินสแตนซ์ของ Kreait\Firebase\Factory ใช้สำหรับตั้งค่าการเชื่อมต่อ Firebase
        ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
        ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
 
        $this->database = $factory->createDatabase(); //เมื่อเรียก createDatabase(), มันจะส่งกลับอินสแตนซ์ของ Kreait\Firebase\Database ที่เป็นตัวกลางในการทำงานกับฐานข้อมูล
        $this->tablename = 'employee'; // เก็บข้อมูลไว้ใน path ชื่อ employee

    }


    public function __EmployeeTable()
    {
        $reference = $this->database->getReference('employee'); // Path ของข้อมูล
        $snapshot = $reference->getSnapshot();
        $data = $snapshot->getValue(); // ดึงข้อมูลเป็น array

        return view('employee', compact('data')); // ส่งข้อมูลไปที่ @forelse ($data as $item) ใน EmployeeTable.blade --โดยผ่าน employee.blade ซึ่งเป็นหน้าหลัก เพื่อเรียกใช้ @include
        //return view('data-management-table.EmployeeTable', compact('data'));
    }


    public function CreateEmployee()
    {
        return view('data-management-table.CreateEmployee');
    }


    public function store(Request $request)
    {
        $postData = [
            'employee_id' => $request -> employee_id,
            'first_name' => $request -> first_name, //'fname' → เป็น Key ของอาร์เรย์ $postData //$request->first_name → เป็นค่าที่รับมาจาก ฟอร์ม
            'last_name' => $request -> last_name,
            'profile_photo' => $request -> profile_photo,
            'role' => $request -> role,
            'department' => $request -> department,
            'email' => $request -> email,
            'phone_number' => $request -> phone_number,
            'birthday' => $request -> birthday,
            'username' => $request -> username,
            'password' => bcrypt($request->password),
        ];

        $postRef = $this->database->getReference($this->tablename)->push($postData);

        if($postRef) //แสดงสถานะการเพิ่มบัญชี
        {
            return redirect('employee')->with('status','เพิ่มบัญชีสำเร็จ');
        }
        else
        {
            return redirect('employee')->with('status','เพิ่มบัญชีไม่สำเร็จ');
        }
    }
}
