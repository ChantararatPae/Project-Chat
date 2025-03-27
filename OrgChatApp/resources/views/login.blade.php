<?php

// ตรวจสอบการส่งข้อมูล
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ตัวอย่างการตรวจสอบข้อมูล (ควรเชื่อมต่อฐานข้อมูลแทน)
    if ($email === "admin@example.com" && $password === "123456") {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php"); // เปลี่ยนเส้นทางไปหน้าหลัก
        exit();
    } else {
        $error = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>



<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif; /*ฟอนต์เป็น Arial สำรองคือ sans-serif*/
            background: linear-gradient(to bottom, #d3d3d3, #ffffff), #fff;
            margin: 0; /*ระยะขอบ 0*/
            padding: 0; /*ระยะห่างภายใน 0*/
            display: flex; /*จัดเนื้อหาให้อยู่ตรงกลาง display*/
            justify-content: center; /*จัดเนื้อหาให้อยู่ตรงกลาง display (แนวนอน)*/
            align-items: center; /*จัดเนื้อหาให้อยู่ตรงกลาง display (แนวตั้ง)*/
            height: 100vh; /*ความสูงหน้าจอ 100*/
        }/*กำหนดเนื้อหาให้อยู่ตรงกลาง*/
        @media (min-width: 768px){
            .content {
                width: 91%;
                height: 84%;
                background-color: #f8f8f8; /* ขาวล้วนภายใน */
                display: grid;
                grid-template-columns: 1fr 1fr; /* สองคอลัมน์เท่ากัน */
                justify-content: center; /* จัดตรงกลางแนวนอน */
                align-items: center; /* จัดตรงกลางแนวตั้ง */
            }
        }
        .objectcontent {
            display: flex;
            flex-direction: column; /* จัดเรียงแนวตั้งในแต่ละกล่อง */
            align-items: center; /* จัดเนื้อหาภายในกล่องให้อยู่ตรงกลาง */
        }
        .header-section {
            text-align: center;
        }
        .content .main-title {
            font-size: 4em; /* ขนาดตัวอักษรใหญ่ */
            background: linear-gradient(to right, #7b5be6, #f06292);
            -webkit-background-clip: text;
            color: transparent; /* ใช้ gradient เป็นสีตัวอักษร */
        }
        .subtitle {
            font-size: 1.2em;
            color: #555;
            margin-top: 10px;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;  /*ความโค้ง*/
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  /*เงา*/
            padding: 30px 75px;
            width: 100%;
            max-width: 400px;
        }/*กล่อง login*/
        h1 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {  /*กรอบในช่องอีเมลพาส*/
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 0.9em;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc; /* ขอบของ input */
            border-radius: 5px; /* ความโค้งของขอบ */
            box-sizing: border-box; /* รวม padding และ border ใน width */
        }
        .btn {
            width: 100%;
            padding: 10px;
            background: linear-gradient(to right, #7b5be6, #f06292);  /*ไล่ระดับสี*/
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
        .btn:hover {  /*:hover กำหนดการแสดงผลเมื่อวางเมาท์*/
            background: linear-gradient(to right, #6a4dc6, #e04872);
        }
        .error {
            color: red;
            font-size: 0.9em;
            text-align: center;
            margin-bottom: 15px;
        }
        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 0.9em;
            color: #555;
            text-decoration: none;
        }
        .forgot-password:hover {  /*:hover กำหนดการแสดงผลเมื่อวางเมาท์*/
            color: #333;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="objectcontent">
            <div class="header-section">
                <h1 class="main-title">ยินดีต้อนรับ</h1>
                <p class="subtitle">เริ่มต้นการใช้งานเพื่อการสื่อสารภายในองค์กรของคุณ</p>
            </div>
        </div>
        <div class="objectcontent">
            <div class="container">
                <h1>เข้าสู่ระบบ</h1>
                <?php if (!empty($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">อีเมล</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group input">
                        <label for="password">รหัสผ่าน</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn">เข้าสู่ระบบ</button>
                    <a href="#" class="forgot-password">ลืมรหัสผ่าน?</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
