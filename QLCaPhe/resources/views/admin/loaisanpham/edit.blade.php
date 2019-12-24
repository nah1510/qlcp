<!DOCTYPE html>
<html lang="en">

@include('header')

<body>
    @include('masterhead')
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            <div class="row">
                <div class="col-md-12">
                    <form action="edit?id={{$loaisanpham->id}}" method="POST" role="form">
                        <legend>San Pham</legend>
                        @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="">Tên món:</label>
                            <input type="text" class="form-control" placeholder="Tên món" name="name"
                                value="{{$loaisanpham->name}}" required >
                        </div>
                        <input type="hidden" name="id" value="{{$loaisanpham->id}}">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>