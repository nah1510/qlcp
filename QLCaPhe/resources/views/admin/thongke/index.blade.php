<!DOCTYPE html>
<html lang="en">
@include('header')

<body>
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            @include('navbar')
            <div class="container">
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <legend>Sản phẩm</legend>
                <div class="form-group">
                    <label for="">Tên món:</label>
                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                </div>
                <div class="form-group">
                    <label for="">Tên món:</label>
                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
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