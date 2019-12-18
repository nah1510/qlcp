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
                    <legend>Sản phẩm</legend>
                    <div class="form-group">
                        <label for="">Từ:</label>
                        <input class="form-control" type="datetime-local"
                            value="{{ date('Y-m-d\Th:i:s', mktime(0, 0, 0, date('m')-1, date('d'),   date('Y')))}}"
                            id="from">
                    </div>
                    <div class="form-group">
                        <label for="">Đến:</label>
                        <input class="form-control" type="datetime-local" value="{{ date('Y-m-d\Th:i')}}" id="to">
                    </div>
                    <button onclick="thongke()" type="submit" class="btn btn-primary">Xem</button>
                    <button onclick="exportTableToCSV()" type="submit" class="btn btn-primary">Xuất csv</button>
                    <table class="table table-striped table-bordered" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
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

</html>
<script language='javascript'>
thongke();

function thongke() {
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
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var html = '<tr>' +
                    '<th scope="row">' + i + '</th>' +
                    '<td>Jacob</td>' +
                    '<td>Thornton</td>' +
                    '<td>@fat</td>' +
                    '</tr>';
                i++;
                $("tbody").append(html);
            });
            //$('#example').DataTable();
        }
    });
}

function exportTableToCSV() {
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
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var html = '<tr>' +
                    '<th scope="row">' + i + '</th>' +
                    '<td>Jacob</td>' +
                    '<td>Thornton</td>' +
                    '<td>@fat</td>' +
                    '</tr>';
                i++;
                $("tbody").append(html);
            });
        }
    });
    var csv = [];
    var rows = document.querySelectorAll("tr");
    for (var i = 0; i < rows.length; i++) {
        var row = [],
            cols = rows[i].querySelectorAll(" td,th");
        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);
        row = row.join(";") + ";";
        csv.push(row);
    }
    // Download CSV file
    var filename = $("#datepicker").val() + '.csv';
    if ($("#datepicker").val() == "") {
        filename = 'accounting.csv';
    };
    downloadCSV(csv.join("\n"), filename);
}

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;
    // CSV file
    csvFile = new Blob([csv], {
        type: "text/csv"
    });
    // Download link
    downloadLink = document.createElement("a");
    // File name
    downloadLink.download = filename;
    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);
    // Hide download link
    downloadLink.style.display = "none";
    // Add the link to DOM
    document.body.appendChild(downloadLink);
    // Click download link
    downloadLink.click();
}
</script>