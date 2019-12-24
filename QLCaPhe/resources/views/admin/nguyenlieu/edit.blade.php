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
                        <form action="edit?id={{$nguyenlieu->id}}" method="POST" role="form">
                        <legend>Nguyên liệu</legend>
                        <div class="form-group">
                            <label for="">Tên nguyên liệu:</label>
                            <input type="text" class="form-control" placeholder="Tên nguyên liệu" name="name" value="{{$nguyenlieu->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Đơn vị tính:</label>
                            <input type="number " class="form-control" placeholder="Đơn vị tính"
                                name="calculation_unit" value="{{$nguyenlieu->calculation_unit}}">
                        </div>
                            <input type="hidden" name="id" value="{{$nguyenlieu->id}}">
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