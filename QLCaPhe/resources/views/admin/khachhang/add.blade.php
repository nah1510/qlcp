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
                    <legend>Sản phẩm</legend>
                    <div class="form-group">
                        <label for="">Tên khách hàng:</label>
                        <input type="text" class="form-control" placeholder="Tên khách hàng" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại khách hàng:</label>
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Email khách hàng</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="">
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