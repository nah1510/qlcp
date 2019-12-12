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
                <div class="navlist-item"><li><a href="#">Tất cả</a></li></div>
                @foreach($loaisanpham as $list)
                <div class="navlist-item"><li><a href="#">{{$list->name}}</a></li></div>
                @endforeach
            </ul>
        </div>
    </nav>

  <div class="wrapBackground">
    <div class="wrapItem" id="style-1">
    @foreach($sanpham as $list)
        <article class="card menu-cafe">
            <input type="hidden" value="{{$list->id}}">
            <div class= "card-media">
                <img src="/upload/{{$list->image}}" class="size" >
            </div>
            <div class="card-content">
                <h2 class="card-content-header">{{$list->name}}</h2>
                <p class="card-content-price" value="{{$list->price}}">{{$list->price}}</p>
            </div>
        </article>
    @endforeach
    </div>
  </div>
</div>
  <div class="content-rightside">

    
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
        <input type="text" id="total_bill" class="form-controll" name="total_bill" value ="0" readonly>
    </div>

    </section>
<button onclick="save_db()">Save DB</button></td>
</body>
</html>
<script language='javascript'>
  
  $(".menu-cafe").click(function(){
    var id = $(this).find("input").val();
    var row = $(".table").find("#"+id);
    if(row.length)
    {
        row.find(".number-input").val(Number(row.find(".number-input").val())+1);
        total_bill();
        return;
    }
    var html = '<tr class="tr" id="'+$(this).find("input").val()+'"><td>'+$(this).find("h2").text()+'</td>'+
                '<td><input value="1" onchange="change0('+$(this).find("input").val()+')" onKeyPress="return isNumberKey(event)" class="number-input numberInput form-controll" type="text" min="1" max="99" maxlength="2"></td>'+
                '<td>'+$(this).find("p").text()+'<input type="hidden" class="price" value="'+$(this).find("p").text()+'"></td>'+
                '<td><button class="btn-delete">Hủy</button></td></tr>';
    $(".table-body").append(html);
    $(".btn-delete").on("click", function() { 
        $(this).parent().parent().remove();
        total_bill();
    }); 
    total_bill();
  });
 function isNumberKey(evt)
 {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
     return false;
     return true;
     total_bill();
 }
 function change0(id)
 { 
    var row = $(".table-body").find("#"+id);
    if (Number(row.find(".number-input").val()) == 0) {
        row.remove();
    };
    total_bill();
 }
  function total_bill()
 { 
    var total_bill = 0;
    $('.tr').each(function() {
        total_bill += Number($(this).find('.number-input').val()) * Number($(this).find('.price').val());
        
    });
    $("#total_bill").val(total_bill);
 }
 function save_db(){
    if($("#total_bill").val()==0){
        alert("Not create bill");
        return;
    }
    var HoaDon=[];
    $('.tr').each(function() {       
        var total = Number($(this).find('.number-input').val()) * Number($(this).find('.price').val());
        var CT_HoaDon =[$(this).attr('id'),$(this).find('.price').val(),$(this).find('.number-input').val(),total];
        HoaDon.push(CT_HoaDon);
    });
    $.ajax({
                type:'POST',
                url:'ajax_save_bill',
                data:{
                    _token: "{{ csrf_token() }}",
                    total_bill: $("#total_bill").val(),
                    bill:HoaDon,
                },
                success: function( msg ) {
                    
                }
            });
 }
 </script>