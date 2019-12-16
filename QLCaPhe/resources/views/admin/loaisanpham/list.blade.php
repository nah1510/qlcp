<!DOCTYPE html>
<html lang="en">
@include('header')

<body>
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            @include('navbar')
            <div class="container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <form action="add" method="POST" role="form">
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                            @endif
                            @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                            @endif
                                <legend>Sản phẩm</legend>
                                <div class="form-group">
                                    <label for="">Loại Sản Phẩm</label>
                                    <input type="text" class="form-control" placeholder="" name="name" value="">
                                </div>

                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </form>

                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Loại Sản Phẩm</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                    @foreach($loaisanpham as $list)
                                    <tr>
                                        <td>{{$list->id}}</td>
                                        <td>{{$list->name}}</td>
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
    </div>
</body>
</html>