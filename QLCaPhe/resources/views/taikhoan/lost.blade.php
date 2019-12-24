<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
            integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                                id="email" value="{{old('email')}}" required>
                        </div>
                        <img id="ajax_loader" src="/upload/gif/giphy.gif" class="rounded" height="50px">
                        <div id="step-next">
                            <div class="form-group">
                                <label for="">Mã code</label>
                                <input type="text" class="form-control" id="code" placeholder="Code" name="code"
                                    value="{{old('code')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Mật Khẩu</label>
                                <input type="password" class="form-control" id="pass" placeholder="Mật Khẩu" name="pass"
                                    value="{{old('pass')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="re_pass" placeholder="Nhập lại mật khẩu"
                                    name="re_pass" value="{{old('re_pass')}}" required>
                            </div>
                        </div>
                        {!! csrf_field() !!}
                        <div class="row" style="text-align: center;">
                            <button type="submit" disabled class="btn btn-primary">Đặt lại mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
<script>
$(document).ready(function() {
    $('#step-next').hide();
    $('#ajax_loader').hide();
    $("#email").change(function() {
        $("#email").next().remove();
        $.ajax({
            type: 'POST',
            url: 'ajax_check_email',
            data: {
                _token: "{{ csrf_token() }}",
                email: $("#email").val(),
            },
            beforeSend: function() {
                $('#ajax_loader').show();
            },
            success: function(data) {
                $('#ajax_loader').hide();
                if (data == 0)
                    $("#email").parent().append(
                        '<p style="color:red">Địa chỉ email không chính xác</p>');
                else {
                    $("#email").parent().append(
                        '<p style="color:green">Mã code đã được gửi tới email của bạn</p>'
                        );
                    $('#email').prop('readonly', true);
                    $('#step-next').css('display', 'block');
                    $('button').removeAttr("disabled");
                }
            }
        });
    });
});
</script>