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
                <form action="add" method="POST" role="form">
                    <legend>Thêm khách hàng</legend>
                    <div class="form-group">
                        <label for="">Tên khách hàng:</label>
                        <input type="text" class="form-control" placeholder="Tên khách hàng" name="name" value=""
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại khách hàng:</label>
                        <input type="text" class="form-control" placeholder="Số điện thoại" onKeyPress="return isNumberKey(event)" name="phone" value=""
                            minlength="10" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email khách hàng</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="" required>
                    </div>


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