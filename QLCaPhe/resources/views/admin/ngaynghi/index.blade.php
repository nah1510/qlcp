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
                    <legend>Ngày Nghỉ</legend>
                    <div class="form-group">
                        <label for="">Thời gian:</label>
                        <input type="text" id="datepicker" name="for" class="form-control " autocomplete="off" value="<?php if(isset($_GET["month"])) echo $_GET["month"]; else echo  date('m-Y', mktime(0, 0, 0, date('m'), date('d'),   date('Y')))?>">
                    </div>
                    <a onclick="loadbytime()" type="submit" class="btn btn-primary">Xem</a>

                    <a onclick="exportTableToCSV()" class="btn btn-primary">Xuất</a>
                    <table class="table table-striped table-bordered" id="DataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Nhân viên</th>
                                <th scope="col">Lương Cơ Bản</th>
                                <th scope="col">Số ngày nghỉ</th>
                                <th scope="col">Tiền phạt</th>
                                <th scope="col">Tiền thưởng</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <table style="display:none" id="hidden">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Nhân viên</th>
                                <th scope="col">Khách Hàng</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </body>
    <div id="Modal-Dayoff" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered" id="modal-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ngày</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="Modal-Bonus" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thưởng phạt</h4>
                </div>
                <div class="modal-body">
                    <form action="bonus" method="POST" role="form">
                        <legend></legend>
                        <div class="form-group">
                            <label for="">Số tiền</label>
                            <input type="text" name="money" class="form-control" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <input type="text" name="info" class="form-control" autocomplete="off" >
                        </div>
                        <input type="hidden" class="bonus" name="bonus">
                        <input type="hidden" class="staff" name="staff">
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

</html>
<script language='javascript'>
load();
$('#datepicker').datepicker({
    dateFormat: 'mm-yy',
});
function bonus(elmnt) {
        $('.bonus').val(1);
        $('.staff').val($('#nhanvien_'+elmnt).val());
        $('#Modal-Bonus').modal('show');
}

function subs(elmnt) {
        $('.bonus').val(0);
        $('.staff').val($('#nhanvien_'+elmnt).val());
        $('#Modal-Bonus').modal('show');
}

function loadbytime() {
    datepicker = $("#datepicker").val();
    url = "{{ url('/test')}}/?month=" + datepicker;
    window.location.replace(url);
}

function exportTableToCSV() {
    var csv = [];
    var rows = document.getElementById("hidden").querySelectorAll("tr");
    for (var i = 0; i < rows.length; i++) {
        var row = [],
            cols = rows[i].querySelectorAll(" td,th");
        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);
        row = row.join(";") + ";";
        csv.push(row);
    }
    var filename = $("#datepicker").val() + '.csv';
    if ($("#datepicker").val() == "") {
        filename = 'accounting.csv';
    };
    downloadCSV(csv.join("\n"), filename);
}

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;
    csvFile = new Blob([csv], {
        type: "text/csv"
    });
    downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}

function load() {
    $("tbody > tr").remove();
    $.ajax({
        type: 'POST',
        url: 'ajax_day_off',
        data: {
            _token: "{{ csrf_token() }}",
            month: $("#datepicker").val(),
        },
        success: function(data) {
            var i = 1;
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var html = '<tr>' +
                    '<input type="hidden" id="nhanvien_'+value['data']['id']+'" value="'+value['data']['id']+'">'+
                    '<th scope="row">' + i + '</th>' +
                    '<td>'+value['data']['name']+'<br/>'+value['data']['email']+'</td>' +
                    '<td>'+value['data']['salary']+'<br/>'+
                    '<td>'+value['DayOffTotal']+'</td>' +
                    '<td  onclick="subs('+value['data']['id']+')">'+value['data']['price']+'</td>' +
                    '<td onclick="bonus('+value['data']['id']+')">'+value['data']['created_at']+'</td>' +
                    '</tr>';
                i++;
                $("tbody").append(html);
            });

            $('#DataTable').DataTable( {
                "language": {
            "lengthMenu": "Hiện _MENU_ cột",
            "zeroRecords": "Không có dữ liệu trùng khớp",
            "info": "Trang _PAGE_ trên _PAGES_ trang",
            "infoEmpty": "Không có dữ liệu",
            "infoFiltered": "(Tìm từ _MAX_ cột)",
            "search":"Tìm kiếm:",
            "paginate": {
                "first":      "Đầu",
                "last":       "Cuối",
                "next":       "Sau",
                "previous":   "Trước"
            },
        }
            } );
        }
    });
}
</script>