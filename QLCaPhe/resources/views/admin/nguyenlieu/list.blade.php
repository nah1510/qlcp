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
                                <h4 class="card-title">Nguyên liệu</h4>
                                <a class="btn btn-primary" href="add">Thêm Nguyên Liệu</a>
                                <p class="card-category">Danh sách Nguyên Liệu</p>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Số lượng tồn</th>
                                        <th>Đơn vị tính</th>
                                        <th>Email</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>

                                        @foreach($nguyenlieu as $list)
                                        <tr>
                                            <td>{{$list->id}}</td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->amount}}</td>
                                            <td>{{$list->calculation_unit}}</td>
                                            <td><button type="button" class="btn btn-secondary">Secondary</button></td>
                                            <td><a class="btn btn-info" href="edit?id={{$list->id}}">Edit</a>
                                            </td>
                                            <td><a class="btn btn-danger" href="delete/{{$list->id}}">Delete</a>
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