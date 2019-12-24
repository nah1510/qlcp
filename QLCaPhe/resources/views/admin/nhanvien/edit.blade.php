<!DOCTYPE html>
<html lang="en">

@include('header')

<body>
    @include('masterhead')
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="edit?id={{$nhanvien->id}}" method="POST" role="form">
                            <legend>Nhân Viên</legend>
                            @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                            @endif
                            @if(session('fail'))
                            <div class="alert alert-danger">
                                {{session('fail')}}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="">Họ và tên:</label>
                                <input type="text" class="form-control" placeholder="Họ và tên" name="name"
                                    value="{{$nhanvien->name}}"required >
                            </div>
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    value="{{$nhanvien->email}}"required >
                            </div>
                            <div class="form-group">
                                <label for="">CMND:</label>
                                <input type="number" class="form-control" placeholder="Chứng minh nhân dân"
                                    name="identity_card_number" value="{{$nhanvien->identity_card_number}}"required >
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại:</label>
                                <input type="number " class="form-control" placeholder="Số điện thoại"
                                    name="phone" value="{{$nhanvien->phone}}"required >
                            </div>
                            <div class="form-group">
                                <label for="">Lương cơ bản:</label>
                                <input type="number " class="form-control" placeholder="Lương cơ bản"
                                    name="salary" value="{{$nhanvien->salary}}"required >
                            </div>
                                <input type="hidden" name="role" value="cashier"   class="custom-control-input" >
                            <input type="hidden" name="id" value="{{$nhanvien->id}}"required >
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>