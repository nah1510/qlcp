<!DOCTYPE html>

<html lang="en">
    @include('header')

    <body>
        @include('masterhead')
        <div class="wrapper">
            @include('sidebar')
            <div class="main-panel">
                <div class="container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                @if(session('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                                @endif
                                <h4 class="card-title">Sản phẩm</h4>
                                <a class="btn btn-primary" href="add">Thêm sản phẩm</a>
                                <p class="card-category">Danh sách sản phẩm</p>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Tình Trạng</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>

                                        @foreach($sanpham as $list)
                                        <tr>
                                            <td>{{$list->id}}</td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->price}} VND</td>
                                            <td>{{$list->status == '1' ? 'Sẵn sàng' : 'Hết'}}</td>
                                            <td><a class="btn btn-info" href="edit?id={{$list->id}}">Sửa</a>
                                            </td>
                                            <td><a class="btn btn-danger" href="delete/{{$list->id}}">Xóa</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <footer class="footer">
                <div class="container-fluid">
                </div>
            </footer>
        </div>
    </body>

</html>
<script language='javascript'>
$('.table').DataTable({
                "language": {
                    "lengthMenu": "Hiện _MENU_ cột",
                    "zeroRecords": "Không có dữ liệu trùng khớp",
                    "info": "Trang _PAGE_ trên _PAGES_ trang",
                    "infoEmpty": "Không có dữ liệu",
                    "infoFiltered": "(Tìm từ _MAX_ cột)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": "Sau",
                        "previous": "Trước"
                    },
                }
            });
</script>