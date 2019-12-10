<!DOCTYPE html>
<html lang="en">

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

    @foreach($sanpham as $list)
    <div>
    <img src="/upload/{{$list->image}}" class="rounded" alt="Cinque Terre">
    <h5>{{$list->name}}</h5>
    <strong>{{$list->price}}</strong>
    </div>
    @endforeach
    

</body>

</html>