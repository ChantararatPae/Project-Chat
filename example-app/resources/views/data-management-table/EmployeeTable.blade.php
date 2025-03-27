@extends ('app')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            @if(session('statuc'))
                <h4 class="alert alert-warning mb-2">{{session('statuc')}}</h4>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Employee List
                        <!--<a href="{{ url('add-employee') }}" class="btn btn-sm  btn-primary float-end">แก้ไข</a>-->
                    </h4>
                </div>
                <div class="card-body">
                    <h1>Contact List</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection