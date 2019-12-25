
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
                    <legend>Nguyên liệu</legend>
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
                    <a onclick="loadbytime()" type="submit" class="btn btn-primary">Xem</a>
                    
                    <a  onclick="exportTableToCSV()" class="btn btn-primary">Xuất</a>
                    <table class="table table-striped table-bordered" id="DataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Nguyên liệu</th>
                                <th scope="col">Số lượng tồn</th>
                                <th scope="col">Số lượng hao hụt</th>
                                <th scope="col">Số lượng nhập</th>
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
        <h4 class="modal-title">Nhật ký nguyên liệu</h4>
      </div>
      <div class="modal-body">
      <table class="table table-striped table-bordered" id="modal-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Hành động</th>
                                <th scope="col">Lượng thay đổi</th>
                                <th scope="col">Số lượng còn lại</th>
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
        url: 'nguyenlieu/ajax_NK_Nguyen_Lieu',
        data: {
            _token: "{{ csrf_token() }}",
            id: id,
            from: $("#from").val(),
            to: $("#to").val(),
        },
        success: function(data) {
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var text = "Mua nguyên liệu";
                if(value['type']==1)
                    text ="Kiểm kê";
                var html = '<tr>' +
                    '<td>'+value['created_at']+'</td>' +
                    '<td>'+text+'</td>' +
                    '<td>'+value['change_amount']+'</td>' +
                    '<td>'+value['amount']+'</td>' +
                    '</tr>';
                $("#modal-table tbody").append(html);
            });
        }
    });
    $('#Modal').modal('show');
}

function loadbytime() {
    from = $("#from").val();
    to = $("#to").val();
    url = "{{ url('/thongkenl')}}/?from="+from+"&to="+to;
    window.location.replace(url);
}

function thongke() {
    $("#DataTable tbody > tr").remove();
    $("#hidden tbody > tr").remove();
    $.ajax({
        type: 'POST',
        url: 'nguyenlieu/ajax_thong_ke_nl',
        data: {
            _token: "{{ csrf_token() }}",
            from: $("#from").val(),
            to: $("#to").val(),
        },
        success: function(data) {
            var i = 1;
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var html = '<tr>' +
                    '<th scope="row">' + i + '</th>' +
                    '<td>'+value['data']["name"]+'</td>' +
                    '<td>'+value['data']['amount']+'</td>' +
                    '<td>'+value['sub']+'</td>' +
                    '<td>'+value['import']+'</td>' +
                    '<td><button onclick="showModal('+value['data']['id']+')" type="button" class="btn btn-info " >Chi tiết</button></td>' +
                    '</tr>';
                i++;
                var html_hidden = '<tr>' +
                    '<td>'+value['data']['name']+'</td>' +
                    '<td>'+value['data']['amount']+'</td>' +
                    '<td>'+value['sub']+'</td>' +
                    '<td>'+value['import']+'</td>' +
                    '</tr>';
                $("#DataTable tbody").append(html);
                $("#hidden tbody").append(html_hidden);
            });
            $('#DataTable').DataTable( {
                "language": {
            "lengthMenu": "Hiện _MENU_ hàng",
            "zeroRecords": "Không có dữ liệu trùng khớp",
            "info": "Trang _PAGE_ trên _PAGES_ trang",
            "infoEmpty": "Không có dữ liệu",
            "infoFiltered": "(Tìm từ _MAX_ hàng)",
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
    filename = 'nguyenlieu.csv';
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