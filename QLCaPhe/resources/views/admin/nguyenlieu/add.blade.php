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
                        <legend>Nguyên liệu</legend>
                        <div class="form-group">
                            <label for="">Tên nguyên liệu:</label>
                            <input type="text" class="form-control" placeholder="Tên nguyên liệu" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Đơn vị tính:</label>
                            <input type="number " class="form-control" placeholder="Đơn vị tính"
                                name="calculation_unit" value="">
                        </div>
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </body>

</html>