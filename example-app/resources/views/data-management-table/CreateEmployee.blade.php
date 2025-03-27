@extends ('app')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        เพิ่มบัญชีผู้ใช้
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('add-employee') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>รหัสพนักงาน</label>
                            <input type="text" name="employee_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>ชื่อ</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>นามสกุล</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="profile_photo">รูปภาพ</label>
                            <input type="file" name="profile_photo" id="profile_photo" class="form-control" accept="image/*" onchange="previewImage(event)">
                            <img id="image_preview" src="" alt="Preview" style="max-width: 100px; display: none; margin-top: 10px;">
                        </div>

                        <script>
                            function previewImage(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    var output = document.getElementById('image_preview');
                                    output.src = reader.result;
                                    output.style.display = "block";
                                }
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>

                        <div class="form-group mb-3">
                            <label for="role">ตำแหน่ง</label>
                            <select name="role" id="role" class="form-control">
                                <option value="user">ผู้ใช้ทั่วไป</option>
                                <option value="admin">แอดมิน</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="department">แผนก</label>
                            <select name="department" id="department" class="form-control">
                                <option value="marketing">แผนกการตลาด</option>
                                <option value="accounting">แผนกการบัญชี</option>
                                <option value="sales">แผนกฝ่ายขาย</option>
                                <option value="it">แผนกไอที</option>
                                <option value="hr">แผนกบุคคล</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>อีเมล</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>เบอร์โทร</label>
                            <input type="text" name="phone_number" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>วันเดือนปีเกิด</label>
                            <input type="date" name="birthday" id="birthday" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>password</label>
                            <input type="text" name="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                            <a href="{{ url('Employee') }}" class="btn btn-sm  btn-danger float-end">ย้อนกลับ</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection