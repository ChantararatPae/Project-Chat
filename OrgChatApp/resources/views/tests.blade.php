@include('templates.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <script type="module" src="/app.js"></script>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        .container {
            display: flex;
            height: 100vh; /* ครอบคลุมทั้งหน้าจอ */ 
            /*border: 1px solid red; /* เอาไว้ลองดูว่า element ไหนกินพื้นที่ผิดปกติ */
        }
        .content {
            flex: 1;  /* ขยายตัวและใช้พื้นที่ว่างที่เหลือทั้งหมดที่มีในกล่อง */
            margin-left: 260px; /* ระยะห่างจาก menu */
            margin-top: 60px; /* ระยะห่างจาก head */
            padding: 50px; /*ระยะห่างภายใน*/
            background-color: #f9f9f9;
            max-height: 100%;
        }
        .content2 {
            border-radius: 10px;  /*ความโค้ง*/
            background-color: #ffffff;
            max-height: 100%;
            width: 100%; /* ขยายเต็มพื้นที่ของ .content */
            overflow: hidden;    /* ซ่อนเนื้อหาที่เกิน */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
        }
        .content-body {
            height: 75vh;
            width: 100%;

        }
        .head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
            top: 0;
            left: 0;
            padding: 10px 0;
            width: 100%; /* Full width */
            z-index: 1000; /* Ensures header is on top */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        .head-left {
            font-size: 18px;
            font-weight: bold;
            padding-left: 30px;
        }
        .head-right {
            display: flex;
            align-items: center;
            padding-right: 30px;
        }
        .search-bar {}
        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
    </style> 
</head>
<body>
    <div class="container">
        <div class="menu">
            @include('templates.menu') <!-- เมนู -->
        </div>
            <div class="content">
                <div class="content2">
                    <div class="head">
                        <div class="head-left">
                            <div class="search-bar">
                                    <input type="text" placeholder="ค้นหา..."> <!-- ต้องทำให้ค้นหาได้จริง -->
                            </div>
                        </div>
                        <div class="head-right">
                            <img src="{{ asset('path_to_user_image.jpg') }}" alt="User Avatar" class="user-avatar">   <!-- ต้องสร้างการเชื่อมโยงรูปโปรไฟล์ใน database -->
                            <span class="user-name">อภินันท์ โรจนประดิษฐ์</span>   <!-- ต้องสร้างการเชื่อมโยง database class="user-name -->
                        </div>
                    </div>
                    <div class="content-body">
                        hello
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>