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
                            <div class="form-group">
                                <label for="">Họ và tên:</label>
                                <input type="text" class="form-control" placeholder="Họ và tên" name="name"
                                    value="{{$nhanvien->name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    value="{{$nhanvien->email}}">
                            </div>
                            <div class="form-group">
                                <label for="">CMND:</label>
                                <input type="number" class="form-control" placeholder="Chứng minh nhân dân"
                                    name="identity_card_number" value="{{$nhanvien->identity_card_number}}">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại:</label>
                                <input type="number " class="form-control" placeholder="Số điện thoại"
                                    name="phone" value="{{$nhanvien->number}}">
                            </div>
                            <div class="form-group">
                                <label for="">Lương cơ bản:</label>
                                <input type="number " class="form-control" placeholder="Lương cơ bản"
                                    name="salary" value="{{$nhanvien->salary}}">
                            </div>
                                <input type="hidden" name="role" value="cashier"   class="custom-control-input" >
                            <input type="hidden" name="id" value="{{$nhanvien->id}}">
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