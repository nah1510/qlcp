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
        @if(session('message'))
          <div class="alert alert-success">
            {{session('message')}}
          </div>
        @endif
        <form action="add" method="POST" role="form">
          <legend>Nhân viên</legend>
          <div class="form-group">
            <label for="">Họ và tên:</label>
            <input type="text" class="form-control" placeholder="Họ và tên" name="name" value="">   
          </div>
          <div class="form-group">
            <label for="">Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email" value="">
          </div>
          <div class="form-group">
            <label for="">CMND:</label>
            <input type="number " class="form-control" placeholder="Chứng minh nhân dân" name="identity_card_number" value="">
          </div>
          
          {!! csrf_field() !!}
          <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>