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
        ->withServiceAccount('C:\xampp\htdocs\Project_Chat\example-app\config\firebase_credentials.json');
        //->withServiceAccount(config('firebase.projects.app.credentials')); //เปลี่ยนเป็นเชื่อมต่อ credentials ใน firebase โดยตรง - แทนที่จะใช้ credentials.file เพื่ออ่านไฟล์ JSON
        
        //$factory = (new Factory)->withServiceAccount('/path/to/firebase_credentials.json')
        //->withDatabaseUri('https://my-project-default-rtdb.firebaseio.com');
 

        $this->database = $factory->createDatabase(); //เมื่อเรียก createDatabase(), มันจะส่งกลับอินสแตนซ์ของ Kreait\Firebase\Database ที่เป็นตัวกลางในการทำงานกับฐานข้อมูล
        $this->tablename = 'employee'; // เก็บข้อมูลไว้ใน path ชื่อ employee
        //dd($this->database);
    }


    public function EmployeeTable() // เมื่อเรียกใช้ EmployeeTable ฟังก์ชันนี้จะทำการแสดงข้อมูลจาก data-management-table.EmployeeTable
    {
        return view('data-management-table.EmployeeTable');
    }

    public function CreateEmployee() // เมื่อเรียกใช้ CreateEmployee ฟังก์ชันนี้จะทำการแสดงข้อมูลจาก data-management-table.CreateEmployee
    {
        return view('data-management-table.CreateEmployee');
    }

    public function testDatabaseConnection()
    {
        try {
            $ref = $this->database->getReference('employee'); // ตรวจสอบการเข้าถึง 'employee' table
            $data = $ref->getValue(); // ดึงข้อมูลจาก Firebase Database
            dd($data); // ดูข้อมูลที่ดึงมา
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage()); // ถ้ามีข้อผิดพลาดให้แสดง error message
        }
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
