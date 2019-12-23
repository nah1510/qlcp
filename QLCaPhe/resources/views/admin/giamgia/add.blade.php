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
                        <legend>Mã Giảm Giá</legend>
                        <div class="form-group">
                            <label for="">Mã giảm giá:</label>
                            <input type="text" class="form-control" placeholder="Mã giảm giá" name="code" maxlength="20"
                                value="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Loại giảm giá:</label>
                            <select class="form-control" name="type">
                                <option value="1">Khấu trừ theo phần trăm hóa đơn</option>
                                <option value="2">Khấu trừ trực tiếp</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số tiền giảm giá hoặc phần trăm giảm giá:</label>
                            <input type="number" class="form-control"
                                placeholder="Số tiền giảm giá hoặc phần trăm giảm giá" name="discount" value="" min="1"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Tổng hóa đơn tối thiểu:</label>
                            <input type="number" class="form-control" placeholder="Tổng hóa đơn tối thiểu"
                                name="min_bill" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Số tiền giảm giá tối đa:</label>
                            <input type="number" class="form-control" placeholder="Số tiền giảm giá tối đa"
                                name="max_discount" min="1" value="">
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