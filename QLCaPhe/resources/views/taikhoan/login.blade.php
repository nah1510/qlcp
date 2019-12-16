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

@if (Auth::check())
<div>
Bạn đang đăng nhập với quyền 
@if( Auth::user()->role == 1 )
	{{ "Admin" }}
@elseif( Auth::user()->level == 2)
	{{ "Admin" }}
@elseif( Auth::user()->level == 3)
	{{ "Thành viên" }}
@endif
</div>
<div class="pull-right" style="margin-top: 3px;">Hello {{Auth::user()->name}} <a class="btn btn-primary" href="{{ url('/logout') }}">Đăng xuất</a></div>
@endif
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form action="{{url('login-form')}}" method="POST" role="form">
          <legend>Login</legend>
          @if($errors->has('errorlogin'))
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{$errors->first('errorlogin')}}
            </div>
          @endif
          @if(session('logout'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{session('logout')}}
            </div>
                @endif
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
          <button type="submit" class="btn btn-primary">Đăng nhập</button>
          <a href="lost-pass"  class="btn btn-primary">Quên mật khẩu</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>