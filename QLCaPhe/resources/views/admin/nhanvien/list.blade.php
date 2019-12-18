<!DOCTYPE html>
<html lang="en">
@include('header')

<body>
    @include('masterhead')
    <div class="wrapper">
        @include('navbar')
        <div class="main-panel wrapper">

            @include('sidebar')
            <div class="container-fuild">

                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <h4 class="card-title">Sản phẩm</h4>
                <a class="btn btn-primary" href="add">Thêm sản phẩm</a>
                <p class="card-category">Danh sách sản phẩm</p>

                <table id="example" class="table table-striped table-bordered table-sm" cellspacing="0">
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
                            <td><a href="edit?id={{$list->id}}">Edit</a>
                            </td>
                            <td><a href="delete/{{$list->id}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>