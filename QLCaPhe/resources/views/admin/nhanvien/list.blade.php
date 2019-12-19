
<!DOCTYPE html>

<html lang="en">
@include('header')

<body>
    @include('masterhead')
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            <div class="container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                            @endif
                            <h4 class="card-title">Nhân viên</h4>
                            <a class="btn btn-primary" href="add">Thêm nhân viên</a>
                            <p class="card-category">Danh sách nhân viên</p>
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Chứng minh nhân dân</th>
                                <th>Action</th>
                                <th>Action</th>
                                </thead>
                                <tbody>

                                    @foreach($nhanvien as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->email}}</td>
                                <td>{{$list->identity_card_number }}</td>
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
        <footer class="footer">
            <div class="container-fluid">
            </div>
        </footer>
    </div>
</body>

</html>