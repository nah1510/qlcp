<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <!-- Latest compiled and minified CSS & JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
  
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form action="{{url('set-pass')}}" method="POST" role="form">
          <legend>Quên mật khẩu</legend>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Email" name="email" id="email" value="{{old('email')}}">
            @if($errors->has('email'))
              <p style="color:red">{{$errors->first('email')}}</p>
            @endif
          </div>
          {!! csrf_field() !!}
          <button type="submit" disabled class="btn btn-primary">Đăng nhập</button>
          <a href="dang-ky"  class="btn btn-primary">Đăng Ký</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<script>
$(document).ready(function(){
  $("#email").change(function(){
    $("#email").next().remove();
    $.ajax({
            type: 'POST',
            url: 'ajax_check_email',
            data: {
                _token: "{{ csrf_token() }}",
                email: $("#email").val(),
            },
            success: function(data) {
                if(data==0)
                    $("#email").parent().append('<p style="color:red">Địa chỉ email không chính xác</p>');
                else {
                    
                }
            }
        });
  });
});
</script>