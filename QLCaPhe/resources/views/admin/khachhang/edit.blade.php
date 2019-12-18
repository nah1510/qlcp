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
                <form action="edit?id={{$sanpham->id}}" method="POST" role="form">
                    <legend>San Pham</legend>
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="">Tên món:</label>
                        <input type="text" class="form-control" placeholder="Tên món" name="name"
                            value="{{$sanpham->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Giá tiền</label>
                        <input type="text" class="form-control" placeholder="Giá tiền" name="price"
                            value="{{$sanpham->price}}">
                    </div>
                    <div class="form-group">
                        <label for="=Select">Loại sản phẩm</label>
                        <select name="loaisanpham" class="form-control" id="Select">
                            @foreach($loaisanpham as $list)
                            <option {{$list->id == $sanpham->loaisanpham ? 'Selected' : ''}} value="{{$list->id}}">
                                {{$list->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tình Trạng</label>
                        <div class="radio">
                            <label><input type="radio" name="status" value="1"
                                    {{ $sanpham->status == '1' ? 'checked' : '' }}>Sẵn sàng</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="status" value="0"
                                    {{ $sanpham->status == '0' ? 'checked' : '' }}>Hết</label>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{$sanpham->id}}">
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