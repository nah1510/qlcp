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
                                @if(session('fail'))
                                <div class="alert alert-danger">
                                    {{session('fail')}}
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
                                        <th></th>
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
                                            <td><button onclick="showModal({{$list->id}})"  class="btn btn-secondary">Kiểm kê</button></td>
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
        </div>
    </body>

</html>
<div id="Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kiểm kê nguyên liệu</h4>
      </div>
      <div class="modal-body">
        <form action="kiemke" method="POST" role="form">
                        <div class="form-group">
                            <label>Hành động:</label>
                            <select class="form-control" name="type">
                                <option value="1">Kiểm kê</option>
                                <option value="0">Nhập hàng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="number" class="form-control" placeholder="Số lượng" name="change" min="0" required>
                        </div>
                        <input type="hidden" id="id_nguyen_lieu" name="id" >
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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
function showModal(id){
    $("#id_nguyen_lieu").val(id);
    $('#Modal').modal('show');
}
</script>