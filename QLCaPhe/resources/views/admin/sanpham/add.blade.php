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

                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <form action="add" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Sản phẩm</legend>
                    <div class="form-group">
                        <label for="">Tên món:</label>
                        <input type="text" class="form-control" placeholder="Tên món" name="name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="=Select">Loại sản phẩm</label>
                        <select name="loaisanpham" class="form-control" id="Select">
                            @foreach($loaisanpham as $list)
                            <option value="{{$list->id}}">{{$list->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá tiền</label>
                        <input type="text" class="form-control" placeholder="Giá tiền" name="price" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Hình ảnh:</label>
                        <input type="file" class="form-control" name="image">

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