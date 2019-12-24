<!DOCTYPE html>
<html lang="en">
@include('header')

<body>
    @include('masterhead')
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            @include('navbar')
            <div class="container">
                <form action="edit?id={{$khachhang->id}}" method="POST" role="form">
                    <legend>San Pham</legend>
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="">Tên khách hàng:</label>
                        <input type="text" class="form-control" placeholder="Tên khách hàng" name="name"
                            value="{{$khachhang->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại khách hàng:</label>
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="phone"
                            value="{{$khachhang->phone}}"minlength="10" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email khách hàng</label>
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{$khachhang->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Điểm tích lũy</label>
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="{{$khachhang->point}}" readonly>
                    </div>
                    <input type="hidden" name="id" value="{{$khachhang->id}}">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="" class="btn "></a>
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