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
                                <h4 class="card-title">Nhân viên</h4>
                                <a class="btn btn-primary" href="add">Thêm nhân viên</a>
                                <p class="card-category">Danh sách nhân viên</p>
                                <table id="DataTable" class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Chứng minh nhân dân</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>

                                        @foreach($nhanvien as $list)
                                        <tr id="{{$list->id}}">
                                            <td>{{$list->id}}</td>
                                            <td class="name">{{$list->name}}</td>
                                            <td class="email">{{$list->email}}</td>
                                            <td class="card_number">{{$list->identity_card_number }}</td>
                                            <td><button onclick="showModal({{$list->id}})" type="button"
                                                    class="btn btn-secondary ">Báo Nghỉ</button>
                                            </td>
                                            <td><a class="btn btn-info" href="edit?id={{$list->id}}">Sửa</a>
                                            </td>
                                            <td><button class="btn btn-danger" onclick='checkdelete("delete/{{$list->id}}")'>Xóa</button>
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
    <div id="Modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Báo Nghỉ</h4>
                </div>
                <div class="modal-body">
                    <form action="dayoff" method="POST" role="form">
                        <legend></legend>
                        <div class="form-group">
                            <label for="">Ngày nghỉ từ</label>
                            <input type="text" name="day" class="form-control" autocomplete="off" id="datepicker">
                        </div>
                        <div class="form-group">
                            <label for="">Số ngày nghỉ</label>
                            <input type="number" name="total" class="form-control" min="1" max="30" maxlength="2" onKeyPress="return isNumberKey(event)"  required>
                        </div>
                        <input type="hidden" id="nhanvien-name" name="name">
                        <input type="hidden" id="nhanvien-id" name="id">
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
    <div id="delete_check" class="modal fade"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Bạn có chắc chắn xóa nhân viên này không</p>
      </div>
      <div class="modal-footer">
        <a id="url-delete" class="btn btn-danger" href="delete/{{$list->id}}">Xóa</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
      </div>
    </div>
  </div>
</div>

</html>
<script language='javascript'>
function showModal(id) {
    $("#nhanvien-id").val(id);
    $("#nhanvien-name").val($("#" + id).find(".name").text());
    $("form").find("legend").text("Nhân viên " + $("#" + id).find(".name").text());
    $('#Modal').modal('show');
}
function checkdelete(url) {
    $('#url-delete').attr("href", url);
    $('#delete_check').modal('show');
}
$('#datepicker').datepicker({
    dateFormat: 'dd-mm-yy',
});
$('#DataTable').DataTable({
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
function isNumberKey(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}
</script>