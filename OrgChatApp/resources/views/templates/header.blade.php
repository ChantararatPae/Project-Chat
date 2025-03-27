<!-- resources/views/layouts/header.blade.php -->
<div class="header">
    <div class="header-left"> 
        <span class="company-name">บริษัท ABC (ประเทศไทย) จำกัด</span>  <!-- ต้องสร้างการเชื่อมโยง class="company-name" -->
    </div>
    <div class="header-right">
        <img src="{{ asset('path_to_user_image.jpg') }}" alt="User Avatar" class="user-avatar">
        <span class="user-name">อภินันท์ โรจนประดิษฐ์</span>   <!-- ต้องสร้างการเชื่อมโยง class="company-name" -->
    </div>
</div>

<style>
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0px;
    background-color: #ffffff;
    border-bottom: 1px solid #ddd;
    position: fixed; /* Fixed header */
    top: 0;
    left: 0;
    width: 100%; /* Full width */
    z-index: 1000; /* Ensures header is on top */
}
.header-left {
    font-size: 18px;
    font-weight: bold;
    padding-left: 30px;
}
.header-right {
    display: flex;
    align-items: center;
    padding-right: 30px;
}
.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}
.user-name {
    font-size: 16px;
}
</style>
