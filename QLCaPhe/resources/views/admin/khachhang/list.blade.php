<!DOCTYPE html>

<html lang="en">
    @include('header')


    <body>
        @include('masterhead')
        <div class="wrapper">

            @include('sidebar')

            <div class="main-panel">
                <!-- @include('navbar') -->
                <div class="container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                @if(session('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                                @endif
                                <h4 class="card-title">Khách hàng</h4>
                                <a class="btn btn-primary" href="add">Thêm Khách Hàng</a>
                                <p class="card-category">Danh sách khách hàng</p>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Điện thoai</th>
                                        <th>Điểm tích lũy</th>
                                        <th>Email</th>
                                        <th></th>
                                    </thead>
                                    <tbody>

                                        @foreach($khachhang as $list)
                                        <tr>
                                            <td>{{$list->id}}</td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->phone}}</td>
                                            <td>{{$list->point}}</td>
                                            <td>{{$list->email}}</td>
                                            <td><a class="btn btn-info" href="edit?id={{$list->id}}">Sửa</a>
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
        </div>
    </body>

</html>
<script language='javascript'>
$('.table').DataTable({
                "language": {
                    "lengthMenu": "Hiện _MENU_ hàng",
                    "zeroRecords": "Không có dữ liệu trùng khớp",
                    "info": "Trang _PAGE_ trên _PAGES_ trang",
                    "infoEmpty": "Không có dữ liệu",
                    "infoFiltered": "(Tìm từ _MAX_ hàng)",
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