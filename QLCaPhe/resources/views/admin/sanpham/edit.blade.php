<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <!-- Latest compiled and minified CSS & JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="edit?id={{$sanpham->id}}" method="POST" role="form">
          <legend>San Pham</legend>
          @if(session('message'))
            <div class="alert alert-success">
              {{session('message')}}
            </div>
          @endif
          <div class="form-group">
            <label for="">Tên món:</label>
            <input type="text" class="form-control" placeholder="Tên món" name="name" value="{{$sanpham->name}}">   
          </div>
          <div class="form-group">
            <label for="">Giá tiền</label>
            <input type="text" class="form-control" placeholder="Giá tiền" name="price" value="{{$sanpham->price}}">
          </div>
          <div class="form-group">
            <label for="">Giá tiền</label>
            <div class="radio">
              <label><input type="radio" name="status" value="1" {{ $sanpham->status == '1' ? 'checked' : '' }}>Sẵn sàng</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="status" value="0" {{ $sanpham->status == '0' ? 'checked' : '' }}>Hết</label>
            </div>
          </div>
          
          <input type="hidden" name="id" value="{{$sanpham->id}}">
          {!! csrf_field() !!}
          <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>