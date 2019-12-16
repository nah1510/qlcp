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
<div class="pull-right" style="margin-top: 3px;">Hello {{Auth::user()->name}} <a class="btn btn-primary" href="/{{ url('/logout') }}">Đăng xuất</a></div>
@endif