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
                    <form action="edit?id={{$giamgia->id}}" method="POST" role="form">
                        <legend>Mã Giảm Giá</legend>
                        @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="">Mã giảm giá:</label>
                            <input type="text" class="form-control" placeholder="Mã giảm giá" name="code" maxlength="20"
                                value="{{$giamgia->code}}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Loại giảm giá:</label>
                            <select class="form-control" name="type">
                                <option  {{ $giamgia->type == '1' ? 'selected' : '' }} value="1">Khấu trừ theo phần trăm hóa đơn</option>
                                <option {{ $giamgia->type == '2' ? 'selected' : '' }} value="2">Khấu trừ trực tiếp</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số tiền giảm giá hoặc phần trăm giảm giá:</label>
                            <input type="number" class="form-control"
                                placeholder="Số tiền giảm giá hoặc phần trăm giảm giá" name="discount" value="{{$giamgia->discount}}" min="1"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Tổng hóa đơn tối thiểu:</label>
                            <input type="number" class="form-control" placeholder="Tổng hóa đơn tối thiểu"
                                name="min_bill" value="{{$giamgia->min_bill}}">
                        </div>
                        <div class="form-group">
                            <label for="">Số tiền giảm giá tối đa:</label>
                            <input type="number" class="form-control" placeholder="Số tiền giảm giá tối đa"
                                name="max_discount" min="1" value="{{$giamgia->max_discount}}">
                        </div>
                        <div class="form-group">
                        <label for="">Trạng thái</label>
                            <div class="radio">
                                <label><input type="radio" name="status" value="1"
                                        {{ $giamgia->status == '1' ? 'checked' : '' }}>Kích hoạt</label>
                            </div>

                            <div class="radio">
                                <label><input type="radio" name="status" value="0"
                                        {{ $giamgia->status == '0' ? 'checked' : '' }}>Không kích hoạt</label>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$giamgia->id}}">
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