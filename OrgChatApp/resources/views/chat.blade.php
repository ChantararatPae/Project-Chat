@include('templates.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        .content-body {
            display: grid;
            grid-template-columns: 300px 1fr; /* Sidebar: 300px, Content: ขยายที่เหลือ */  /* grid แบ่งเนื้อหา */
            height: auto; /* ให้ขยายตามเนื้อหา */
        }
        .content2-inchat{
            padding: 10px; /*ระยะห่างภายใน*/
            height: 74h; /* ลดความสูงลงเพื่อไม่ให้ช่องแชทตกขอบ */
        }
        .chat-sidebar {
            grid-template-columns: minmax(250px, 350px) 1fr; /* minmax(250px, 350px) หมายถึง คอลัมน์แรกจะมีขนาดขั้นต่ำ 250px และขนาดสูงสุด 350px, 1fr หมายถึง คอลัมน์ที่สองจะใช้พื้นที่ที่เหลือทั้งหมด (1 fraction) ขยายหรือย่ออัตโนมัติตามพื้นที่ที่มีอยู่*/
            background-color: #ffffff;
            border-right: 1px solid #ddd;
            height: 74vh; /* ลดความสูงลงเพื่อไม่ให้ช่องแชทตกขอบ */
            overflow-y: auto;
            padding: 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
        }
        .search-bar {
            margin-bottom: 10px;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .chat-group {
            margin-bottom: 20px;
        }
        .chat-group h4 {
            margin-bottom: 10px;
            font-size: 16px;
            color: #6c5ce7;
        }
        .chat-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .chat-item:hover {
            background-color: #f0f0f0;
        }
        .avatar {
            width: 40px;
            height: 40px;
            background-color: #ddd;
            border-radius: 50%;
            margin-right: 10px;
        }
        .chat-details {
            flex: 1;
        }
        .chat-name {
            font-size: 14px;
            font-weight: bold;
            margin: 0;
        }
        .chat-preview {
            font-size: 12px;
            color: #555;
            margin: 0;
        }
        .chat-time {
            font-size: 12px;
            color: #aaa;
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
        .people-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .people-name {
            font-size: 16px;
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
                        <div class="head-left"></div>
                        <div class="head-right">
                            <img src="{{ asset('path_to_user_image.jpg') }}" alt="User Avatar" class="user-avatar">   <!-- ต้องสร้างการเชื่อมโยงรูปโปรไฟล์ใน database -->
                            <span class="user-name">อภินันท์ โรจนประดิษฐ์</span>   <!-- ต้องสร้างการเชื่อมโยง database class="user-name -->
                        </div>
                    </div>
                    <div class="content-body">
                        <div class="chat-sidebar">
                            @include('chat.chat-list')
                        </div>
                    <div class="content2-inchat">
                        @include('chat.chat-conversation')
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>