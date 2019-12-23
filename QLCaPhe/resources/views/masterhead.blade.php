<script src="{{asset('js/masterhead.js')}}"></script>
<div class="header">
    <div class="header-left"><a href="/"><img src='/upload/logo/coffeeLogo.svg' alt="logo" class="applogo"></a></div>
    <div class="header-right">
        <!-- <div class="Notification">
            <div class="Notification-icon"><img src="/upload/icon/notification.svg"></div>
        </div> -->
        <div class="User masterhead-User">
            <span class="User-logo"><img src="/upload/icon/man-user.svg" alt="user" /></span>
            <span class="User-name">Chào {{Auth::user()->name}} !</span>
            <!-- <a class="btn btn-primary" href="/{{ url('/logout') }}">Đăng xuất</a> -->
            <div class="menu">
                <div class="menu-virtual"></div>
                <a>
                    <div class="menu-item firstchild">
                        <div class="menu-item-icon">
                            <img src="/upload/icon/target.svg" alt="thông tin">
                        </div>
                        <div class="menu-item-content">
                            Thông tin
                        </div>
                    </div>
                </a>
                <a href="/logout" style="color: inherit; text-decoration: none;">
                    <div class="menu-item">

                        <div class="menu-item-icon">
                            <img src="/upload/icon/logout.svg" alt="Đăng xuất">
                        </div>
                        <div class="menu-item-content">
                            Đăng xuất
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>