<div class="header">
<div class="header-left"><a href="/"><img src='/upload/logo/coffeeLogo.png' alt="logo" class="applogo"></a></div>
<div class="header-right"><div class="User">
  <span class="User-logo"><img src="/upload/icon/man-user.svg" alt="user" /></span>
  <span class="User-name">Chào {{Auth::user()->name}} !</span> 
  <!-- <a class="btn btn-primary" href="/{{ url('/logout') }}">Đăng xuất</a> -->
  <div class="menu">
  <div class="menu-item">
    <div class="menu-item-icon">
        <img src="" alt="thông tin">
    </div> 
    <div class="menu-item-content">
        Thông tin
    </div> 
</div>
    <div class="menu-item">
    <div class="menu-item-icon">
        <img src="" alt="Đăng xuất">
    </div> 
    <div class="menu-item-content">
        Đăng xuất
    </div> 
    </div>
  </div>
  </div></div>
</div>