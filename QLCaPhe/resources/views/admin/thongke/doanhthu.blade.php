
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
                    <legend>Thống kê</legend>
                    <div class="form-group">
                        <label for="">Từ:</label>
                        <input class="form-control" type="datetime-local"
                            value="<?php if(isset($_GET["from"])) echo $_GET["from"]; else echo  date('Y-m-d\Th:i:s', mktime(0, 0, 0, date('m'), date('d')-1,   date('Y')))?>"
                            id="from">
                    </div>
                    <div class="form-group">
                        <label for="">Đến:</label>
                        <input class="form-control" type="datetime-local" value="<?php if(isset($_GET["to"])) echo $_GET["to"]; else echo date('Y-m-d\Th:i')?>" id="to">
                    </div>
                    <div class="form-group">
                        <label for="">Doanh thu</label>
                        <input class="form-control" id="total-money" type="text" value="" readonly>
                    </div>
                    <a onclick="loadbytime()" type="submit" class="btn btn-primary">Xem</a>
                    
                    <a  onclick="exportTableToCSV()" class="btn btn-primary">Xuất</a>
                    <table class="table table-striped table-bordered" id="DataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Nhân viên</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Giá ban đầu</th>
                                <th scope="col">Giảm giá</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <table style="display:none"  id="hidden" >
                        <thead>
                            <tr>
                                <th scope="col">Initial price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Price</th>
                                <th scope="col">Time</th>
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
<div id="Modal" class="modal fade" role="dialog">
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
                                <th scope="col">Tên Món</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
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
</html>
<script language='javascript'>
thongke();

function showModal(id){
    $('#modal-table tbody >tr').remove();
    $.ajax({
        type: 'POST',
        url: 'ajax_CT_hoa_don',
        data: {
            _token: "{{ csrf_token() }}",
            id: id,
        },
        success: function(data) {
            var i = 1;
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var html = '<tr>' +
                    '<th scope="row">' + i + '</th>' +
                    '<td>'+value['data']['sanpham']+'</td>' +
                    '<td>'+value['data']['unit_price']+'</td>' +
                    '<td>'+value['data']['amount']+'</td>' +
                    '<td>'+value['data']['price']+'</td>' +
                    '</tr>';
                i++;
                $("#modal-table tbody").append(html);
            });
        }
    });
    $('#Modal').modal('show');
}

function loadbytime() {
    from = $("#from").val();
    to = $("#to").val();
    url = "{{ url('/thongke')}}/?from="+from+"&to="+to;
    window.location.replace(url);
}

function thongke() {
    $("#DataTable tbody > tr").remove();
    $("#hidden tbody > tr").remove();
    $.ajax({
        type: 'POST',
        url: 'ajax_thong_ke',
        data: {
            _token: "{{ csrf_token() }}",
            from: $("#from").val(),
            to: $("#to").val(),
        },
        success: function(data) {
            var i = 1;
            var total = 0;
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var html = '<tr>' +
                    '<th scope="row">' + i + '</th>' +
                    '<td>'+value['nhanvien']+'<br/>'+value['email']+'</td>' +
                    '<td>'+value['khachhang']+'</td>' +
                    '<td>'+value['data']['initial_price']+'</td>' +
                    '<td>'+value['data']['discount']+'</td>' +
                    '<td>'+value['data']['price']+'</td>' +
                    '<td>'+value['data']['created_at']+'</td>' +
                    '<td><button onclick="showModal('+value['data']['id']+')" type="button" class="btn btn-info " >Chi tiết</button></td>' +
                    '</tr>';
                i++;
                var html_hidden = '<tr>' +
                    '<td>'+value['data']['initial_price']+'</td>' +
                    '<td>'+value['data']['discount']+'</td>' +
                    '<td>'+value['data']['price']+'</td>' +
                    '<td>'+value['data']['created_at']+'</td>' +
                    '</tr>';
                total+=value['data']['price'];
                $("#DataTable tbody").append(html);
                $("#hidden tbody").append(html_hidden);
            });
            $("#total-money").val(total);
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

function exportTableToCSV() {
    var csv = [];
    var rows = document.getElementById("hidden").querySelectorAll("tr");
    for (var i = 0; i < rows.length; i++) {
        var row = [],
            cols = rows[i].querySelectorAll(" td,th");
        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);
        row = row.join(";") ;
        csv.push(row);
    }
    var row = [];
    for (var j = 0; j < rows[0].querySelectorAll(" td,th").length-2; j++)
        row.push("");
    row.push("Total Revenue");
    row.push(document.getElementById("total-money").value);
    row = row.join(";") ;
    csv.push(row);
    filename = 'doanhthu.csv';
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
</script>