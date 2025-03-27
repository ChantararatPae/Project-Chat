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
            min-height: 100vh; /* ครอบคลุมทั้งหน้าจอ */ 
            /*border: 1px solid red; /* เอาไว้ลองดูว่า element ไหนกินพื้นที่ผิดปกติ */
            width: 100vw !important; /* ขยายให้เต็มหน้าจอ */
            max-width: 100% !important; /* ไม่ให้ Bootstrap จำกัดขนาด */
            margin: 0 !important; /* ลบ margin ที่ Bootstrap กำหนดมา */
            padding: 0 !important; /* ลบ padding ที่ Bootstrap กำหนดมา ไม่ให้มีช่องว่างด้านข้าง */
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
            min-height: fit-content; /* ปรับขนาดตามเนื้อหา */
            overflow: hidden;    /* ซ่อนเนื้อหาที่เกิน */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
        }
        .content-body { /* เนื้อหาตรงกลาง */
            height: 70vh;
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
        .Footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            border-top: 1px solid #ddd;
            padding: 10px 0;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.05);
        }
        .Footer-left {
            font-size: 18px;
            font-weight: bold;
            padding-left: 30px;
        }
        .Footer-right {
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
        .table-wrapper {
            width: 100%;

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
                            สมาชิก
                        </div>
                    </div>
                    <div class="content-body">
                        <div class="table-wrapper">
                            @include('data-management-table.EmployeeTable')
                        </div>
                    </div>
                    <div class="Footer">
                        <div class="Footer-left">
                            <div class="search-bar">
                                    123456
                            </div>
                        </div>
                        <div class="Footer-right">
                            <!-- ปุ่ม จัดการบัญชี -->
                            <a href="#" id="manage-account-btn" class="btn btn-primary custom-btn" class="btn custom-btn" onclick="toggleButtons()">จัดการบัญชี</a>

                            <!-- ปุ่ม เพิ่มบัญชีผู้ใช้ และ เสร็จสิ้น (เริ่มต้นซ่อน) -->
                            <div id="account-options" style="display: none;">
                                <a href="{{ url('add-employee') }}" class="btn btn-primary custom-btn" class="btn custom-btn">เพิ่มบัญชีผู้ใช้</a>
                                <a href="#" class="btn custom-btn btn-secondary" onclick="toggleButtons()">เสร็จสิ้น</a>
                            </div>
                        </div>

                        <style>
                            .custom-btn {
                                width: 150px; /* ขนาดปุ่ม */
                                text-align: center;
                                margin: 0 5px; /* ระยะห่างระหว่างปุ่ม */
                                padding: 7px 15px;
                                font-size: 14px;
                            }
                        </style>

                        <script>
                            function toggleButtons() {
                                var manageBtn = document.getElementById("manage-account-btn");
                                var optionsDiv = document.getElementById("account-options");

                                if (manageBtn.style.display === "none") {
                                    manageBtn.style.display = "inline-block"; // แสดงปุ่ม "จัดการบัญชี"
                                    optionsDiv.style.display = "none"; // ซ่อนปุ่ม "เพิ่มบัญชีผู้ใช้" และ "เสร็จสิ้น"
                                } else {
                                    manageBtn.style.display = "none"; // ซ่อนปุ่ม "จัดการบัญชี"
                                    optionsDiv.style.display = "block"; // แสดงปุ่ม "เพิ่มบัญชีผู้ใช้" และ "เสร็จสิ้น"
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>