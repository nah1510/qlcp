<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{asset('assets/sass/indexblade.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/globalstyle.css')}}" rel="stylesheet" />
</head>
<style>
    
</style>
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
        <article class="card">
            <div class= "card-media">
                <img src="/upload/{{$list->image}}" class="size" alt="Cinque Terre">
            </div>
            <div class="card-content">
                <h2 class="card-content-header">{{$list->name}}</h2>
                <p class="card-content-price">{{$list->price}}</p>
            </div>
        </article>
    @endforeach
    </div>
    <script>
    
    </script>
</body>

</html>