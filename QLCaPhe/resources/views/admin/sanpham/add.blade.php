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
        <form action="{{url('sanpham-edit')}}" method="POST" role="form">
          <legend>San Pham</legend>
          @if($errors->has('errorlogin'))
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{$errors->first('errorlogin')}}
            </div>
          @endif
          <div class="form-group">
            <label for="">Tên món:</label>
            <input type="text" class="form-control" id="email" placeholder="Họ tên" name="name" value="{{old('email')}}">
              <p style="color:red">{{$errors->first('email')}}</p>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
            @if($errors->has('email'))
              <p style="color:red">{{$errors->first('email')}}</p>
            @endif
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            @if($errors->has('password'))
              <p style="color:red">{{$errors->first('password')}}</p>
            @endif
          </div>
        
          
          {!! csrf_field() !!}
          <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>