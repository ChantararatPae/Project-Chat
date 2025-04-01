@extends ('app')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            @if(session('status'))
                <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Employee List
                        <!--<a href="{{ url('add-employee') }}" class="btn btn-sm  btn-primary float-end">แก้ไข</a>-->
                    </h4>
                </div>
                <div class="card-body">
                    <h1>Contact List</h1>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>รหัสพนักงาน</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>แผนก</th>
                                <th>อีเมล</th>
                                <th>รายละเอียด</th>
                                <th>แชท</th>

                                <!--<th>แก้ไข</th>
                                <th>ลบ</th>-->
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item['employee_id'] }}</td>
                                <td>{{ $item['first_name'] }}</td>
                                <td>{{ $item['last_name'] }}</td>
                                <td>{{ $item['department'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td><a href="" class="btn btn-sm btn-secondary">รายละเอียด</a></td>
                                <td><a href="" class="btn btn-sm btn-primary">แชท</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">ไม่พบข้อมูล</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection