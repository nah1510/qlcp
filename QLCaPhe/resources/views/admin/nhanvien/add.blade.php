<!DOCTYPE html>
<html lang="en">
@include('header')
<body>
    @include('masterhead')
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            <div class="container">
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
                <form action="add" method="POST" role="form">
                    <legend>Nhân viên</legend>
                    <div class="form-group">
                        <label for="">Họ và tên:</label>
                        <input type="text" class="form-control" placeholder="Họ và tên" name="name" value=""required >
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value=""required >
                    </div>
                    <div class="form-group">
                        <label for="">CMND:</label>
                        <input type="text " class="form-control" placeholder="Chứng minh nhân dân"
                            name="identity_card_number"  minlength="9" maxlength="10" onKeyPress="return isNumberKey(event)" value=""required >
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại:</label>
                        <input type="text " class="form-control"  minlength="10" maxlength="11" onKeyPress="return isNumberKey(event)" placeholder="Số điện thoại"
                            name="phone" value=""required >
                    </div>
                    <div class="form-group">
                        <label for="">Lương cơ bản:</label>
                        <input type="number " class="form-control" placeholder="Lương cơ bản"
                            name="salary" value=""required >
                    </div>
                        <input type="hidden" name="role" value="cashier"  class="custom-control-input" >
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>

            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
            </div>
        </footer>
    </div>
    </div>
</body>

</html>
<script>

function isNumberKey(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
    total_bill();
}
</script>
