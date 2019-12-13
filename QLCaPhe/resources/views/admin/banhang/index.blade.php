<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{asset('assets/sass/indexblade.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/globalstyle.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
</head>
<style>
    
</style>
<body>
  <section class="content">
  <div class="content-leftside">
    <nav>
        <div class="container">
            <ul class="navlist">
                <div onclick="list_san_pham(0)" class="navlist-item"><li>Tất cả</li></div>
                @foreach($loaisanpham as $list)
                <div onclick="list_san_pham({{$list->id}})" class="navlist-item"><li>{{$list->name}}</li></div>
                @endforeach
            </ul>
        </div>
    </nav>

  <div class="wrapBackground" id="style-1">
    <div class="wrapItem" >

    </div>
  </div>
</div>
  <div class="content-rightside">
      <div class="client">
        <div class="client-leftside">Hân</div>
        <div class="client-rightside">Ăn lồn</div>
      </div>
<div class="wrapTable">
    <table class="table tb">
          <thead class="black">
            <tr class="row">
              <th scope="col" class="head">Món</th>
              <th scope="col" class="head">Số lượng</th>
              <th scope="col" class="head">Giá</th>
              <th scope="col" class="head">Hành Động</th>
            </tr>
          </thead>
          <tbody class="table-body">
          </tbody>
        </table>
    </div>
            <div class="wrapSum">
    <div class="Sum"><span>Tổng tiền:</span><input type="text" id="total_bill" class="form-controll" name="total_bill" value ="0" readonly></div>
        <div class="Print"><button onclick="save_db()" class="Invoice">Xuất Hóa Đơn</button></div>
    </div>
    </div>
    </div>

    </section>
</body>
</html>
<script language='javascript'>
list_san_pham(0);

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
        total_bill();
    }

    function change0(id) {
        var row = $(".table-body").find("#" + id);
        if (Number(row.find(".number-input").val()) == 0) {
            row.remove();
        };
        total_bill();
    }

    function total_bill() {
        var total_bill = 0;
        $('.tr').each(function() {
            total_bill += Number($(this).find('.number-input').val()) * Number($(this).find('.price').val());

        });
        $("#total_bill").val(total_bill);
    }

    function save_db() {
        if ($("#total_bill").val() == 0) {
            alert("Not create bill");
            return;
        }
        var HoaDon = [];
        $('.tr').each(function() {
            var total = Number($(this).find('.number-input').val()) * Number($(this).find('.price').val());
            var CT_HoaDon = [$(this).attr('id'), $(this).find('.price').val(), $(this).find('.number-input').val(), total];
            HoaDon.push(CT_HoaDon);
        });
        $.ajax({
            type: 'POST',
            url: 'ajax_save_bill',
            data: {
                _token: "{{ csrf_token() }}",
                total_bill: $("#total_bill").val(),
                bill: HoaDon,
            },
            success: function(msg) {
                alert("Đã thêm thành công " + msg);
                $(".table-body >tr").remove();
                total_bill();
                list_san_pham(0);
            }
        });
    }
    function list_san_pham(id){
        $(".wrapItem >article").remove();
        $.ajax({
            type: 'POST',
            url: 'ajax_list_san_pham',
            data: {
                _token: "{{ csrf_token() }}",
                id:id,
            },
            success: function(data) {
                data = JSON.parse(data);
                $.each(data, function(key, value) {
                        var html='<article class="card menu-cafe">'+
                        '<input type="hidden" value="'+value['id']+'">'+
            '<div class= "card-media">'+
            '<img src="/upload/'+value['image']+'" class="size" >'+
            '<p class="card-media-price" value="'+value['price']+'">'+value['price']+'</p>'
                +'</div >'+
            '<div class="card-content">'+
            '<h2 class="card-content-header">'+value['name']+'</h2>'+
                '</div>'+
            '</article>';
            $(".wrapItem").append(html); 
                    });
    $(".menu-cafe").on("click", function(){
        var id = $(this).find("input").val();
        var row = $(".table").find("#" + id);
        if (row.length) {
            row.find(".number-input").val(Number(row.find(".number-input").val()) + 1);
            total_bill();
            return;
        }
        var html = '<tr class="tr" id="' + $(this).find("input").val() + '"><td>' + $(this).find("h2").text() + '</td>' +
            '<td class="dataInput"><div><input value="1" onchange="change0(' + $(this).find("input").val() + ')" onKeyPress="return isNumberKey(event)" class="number-input numberInput form-controll" type="text" min="1" max="99" maxlength="2"></div><div><button class="plus btn btn-Plus">+</button><button class="sub btn btn-Sub">-</button></div></td>' +
            '<td class="center">' + $(this).find("p").text() + '<input type="hidden" class="price" value="' + $(this).find("p").text() + '"></td>' +
            '<td><button class="btnD btn-delete">Hủy</button></td></tr>';
        $(".table-body").append(html);
        $(".btn-delete").on("click", function() {
            $(this).parent().parent().remove();
            total_bill();
        });
        $(".plus").on("click", function() {
            var number = $(this).parent().parent().find('.number-input');
            if (Number(number.val()) == 99)
                return;
            number.val(Number(number.val()) + 1);
            total_bill();
        });
        $(".sub").on("click", function() {
            var number = $(this).parent().parent().find('.number-input');
            if (Number(number.val()) == 1) {
                // $(this).parent().parent().parent().remove();
                return;
            }
            number.val(Number(number.val()) - 1);
            total_bill();
        });
        total_bill();
    });
            }
        });
    }
</script>