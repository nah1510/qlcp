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
                                <h4 class="card-title">Mã Giảm Giá</h4>
                                <a class="btn btn-primary" href="add">Thêm Mã Giảm Giá</a>
                                <p class="card-category">Danh sách mã giảm giá</p>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Mã giảm giá</th>
                                        <th>Loại giảm giá</th>
                                        <th>Giảm giá</th>
                                        <th>Trạng Thái</th>
                                        <th>Hóa đơn tối thiểu</th>
                                        <th>Giảm giá tối đa</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>

                                        @foreach($giamgia as $list)
                                        <tr>
                                            <td>{{$list->id}}</td>
                                            <td>{{$list->code}}</td>
                                            <td> {{ $list->type == '1' ? 'Phần Trăm' : 'Trực Tiếp' }}</td>
                                            <td>{{ $list->type == '1' ? $list->discount.'%' : $list->discount.' VND' }}</td>
                                            <td> {{ $list->status == '1' ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                                            <td>{{$list->min_bill ? $list->min_bill : "Không có"}}</td>
                                            <td>{{ $list->type == '1' ? $list->max_discount ? $list->max_discount.' VND': 'Không có' : 'Không có' }}</td>
                                            <td><a class="btn btn-info" href="edit?id={{$list->id}}">Sửa</a>
                                            </td>
                                            <td><a class="btn btn-danger" href="delete/{{$list->id}}">Xóa</a>
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