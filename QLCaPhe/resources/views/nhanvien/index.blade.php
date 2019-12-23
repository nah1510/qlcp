@include('header')
<hr>
@include('masterhead')
<div class="container bootstrap snippet">


    <div class="row" style="margin-top:50px;">
        <div class="col-sm-3">
            <!--left col-->
            <form action="" method="POST" role="form" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="text-center">
                    <img src="{{ $user->image ? '/upload/'.$user->image :'http://ssl.gstatic.com/accounts/ui/avatar_2x.png'}}"
                        class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Tải lên hình ảnh của bạn</h6>
                    <input type="file" name="image" class="text-center center-block file-upload">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </form>
            </hr><br>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active info"><a>Thông tin</a></li>
                <li class="pass"><a>Đổi Mật khẩu</a></li>
                <li><a data-toggle="tab" href="#settings">Ngày nghỉ và lương</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="info">
                    <hr>

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="first_name">
                                <h4>Họ và tên</h4>
                            </label>
                            <input type="text" class="form-control" value="{{$user->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="last_name">
                                <h4>Email</h4>
                            </label>
                            <input type="text" class="form-control" value="{{$user->email}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="phone">
                                <h4>Phone</h4>
                            </label>
                            <input type="text" class="form-control" value="{{$user->phone}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="mobile">
                                <h4>Chứng minh nhân dân</h4>
                            </label>
                            <input type="text" class="form-control" value="{{$user->identity_card_number}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="email">
                                <h4>Lương cơ bản</h4>
                            </label>
                            <input type="email" class="form-control" value="{{$user->salary}}" readonly>
                        </div>
                    </div>


                    <hr>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="pass-word">
                    <h2>Đổi mật khẩu</h2>

                    <hr>
                    <form class="form" action="password" method="post" >
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label>
                                    <h4>Mật khẩu mới</h4>
                                </label>
                                <input type="password" class="form-control" name="new_pass" placeholder="Mật khẩu mới">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label>
                                    <h4>Xác nhận mật khẩu</h4>
                                </label>
                                <input type="password" class="form-control" name="confirm_pass" placeholder="Xác nhận mật khẩu">
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </form>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="settings">


                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    placeholder="first name" title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                    placeholder="last name" title="enter your last name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Mobile</h4>
                                </label>
                                <input type="text" class="form-control" name="mobile" id="mobile"
                                    placeholder="enter mobile number" title="enter your mobile number if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="you@email.com" title="enter your email.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Location</h4>
                                </label>
                                <input type="email" class="form-control" id="location" placeholder="somewhere"
                                    title="enter a location">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Password</h4>
                                </label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="password" title="enter your password.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Verify</h4>
                                </label>
                                <input type="password" class="form-control" name="password2" id="password2"
                                    placeholder="password2" title="enter your password2.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-right" type="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function() {
        readURL(this);
    });
    $(".pass").on('click', function() {
        $(".tab-pane").hide();
        $("#pass-word").show();
        $("li").removeClass("active");
        $(this).addClass("active");
    });
    $(".info").on('click', function() {
        $(".tab-pane").hide();
        $("#info").show();
        $("li").removeClass("active");
        $(this).addClass("active");
    });
});
</script>