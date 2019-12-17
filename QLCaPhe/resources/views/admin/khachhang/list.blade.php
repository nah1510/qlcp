<!DOCTYPE html>

<html lang="en">
@include('header')
<link href="{{asset('assets/sass/header.css')}}" rel="stylesheet" />
<body>
    @include('masterhead')
    <div class="wrapper">
    
        @include('sidebar')

        <div class="main-panel">
            <!-- @include('navbar') -->
            <div class="container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                            @endif
                            <h4 class="card-title">Sản phẩm</h4>
                            <a class="btn btn-primary" href="add">Thêm Khách Hàng</a>
                            <p class="card-category">Danh sách sản phẩm</p>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Điện thoai</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                    @foreach($khachhang as $list)
                                    <tr>
                                        <td>{{$list->id}}</td>
                                        <td>{{$list->name}}</td>
                                        <td>{{$list->phone}} VND</td>
                                        <td>{{$list->email}}</td>
                                        <td><a class="btn btn-info" href="edit?id={{$list->id}}">Edit</a>
                                        </td>
                                        <td><a class="btn btn-danger" href="delete/{{$list->id}}">Delete</a>
                                        </td>
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
</body>

</html>