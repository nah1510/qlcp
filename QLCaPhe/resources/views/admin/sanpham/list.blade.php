<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Sản phẩm</h4>
                        <p class="card-category">Danh sách sản phẩm</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Tình Trạng</th>
                                <th>City</th>
                            </thead>
                            <tbody>

                            @foreach($sanpham as $list)
                                <tr>
                                    <td>{{$list->id}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->price}} VND</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
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