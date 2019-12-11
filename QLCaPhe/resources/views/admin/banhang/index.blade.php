<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{asset('assets/sass/indexblade.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/globalstyle.css')}}" rel="stylesheet" />
</head>
<style>
    
</style>
@include('header')
<body>
  
    <nav>
        <div class="container">
            <ul class="nav-list">
                <li><a href="#">Tất cả</a></li>
                @foreach($loaisanpham as $list)
                <li><a href="#">{{$list->name}}</a></li>  
                @endforeach
            </ul>
        </div>
    </nav>


    <div class="wrapper">
    @foreach($sanpham as $list)
        <article class="card menu-cafe">
            <div class= "card-media " value="{{$list->id}}">
                <img src="/upload/{{$list->image}}" class="size" >
            </div>
            <div class="card-content">
                <h2 class="card-content-header">{{$list->name}}</h2>
                <p class="card-content-price">{{$list->price}}</p>
            </div>
        </article>
    @endforeach
    </div>


    <div class="col-sm-6">
    <table class="table">
		  <thead class="black">
			<tr>
			  <th scope="col">Món</th>
			  <th scope="col">Số lượng</th>
			  <th scope="col">Hành Động</th>
			</tr>
		  </thead>
		  <tbody class="table-body">
			<tr>
			  <td></td>
			  <td><input onKeyPress="return isNumberKey(event)" class="number-input" type="text" min="1" max="99" maxlength="2"></td>
			  <td><button class="btn-delete">Hủy</button></td>
			</tr>
		  </tbody>
		</table>
    </div>
</body>

</html>
<script language='javascript'>
  
  $(".menu-cafe").click(function(){
    var html = '<tr><td>'+$(this).find("h2").text()+'</td>'+
                '<td><input value="1" onKeyPress="return isNumberKey(event)" class="number-input" type="text" min="1" max="99" maxlength="2"></td>'+
                '<td><button class="btn-delete">Hủy</button></td></tr>';
    $(".table-body").append(html);
    $(".btn-delete").on("click", function() { 
    $(this).parent().parent().remove();
  }); 
  });
 function isNumberKey(evt)
 {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 return true;
 }
 </script>