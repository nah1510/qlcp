<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                @if(session('message'))
                    <div class="alert alert-success">
                    {{session('message')}}
                    </div>
                @endif
                    <div class="card-header ">
                        <h4 class="card-title">Sản phẩm</h4>
                        <a href="add">Thêm sản phẩm</a>
                        <p class="card-category">Danh sách sản phẩm</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Tình Trạng</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($sanpham as $list)
                                <tr>
                                    <td>{{$list->id}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->price}} VND</td>
                                    <td>{{$list->status}}</td>
                                    <td><a href="edit?id={{$list->id}}">Edit</a></td>
                                    <td><a href="delete/{{$list->id}}">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>