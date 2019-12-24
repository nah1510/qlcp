<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <i class="fas fa-users-cog"></i>
                    <p>Nhân viên</p>
                    <input type="hidden" value="{{ url('/nhanvien')}}">
                </a>
                <div style="display:none" class="nav-child">
                    <a class="nav-link" href="{{ url('/nhanvien/list')}}">
                        <i class="fas fa-list"></i>
                        <p>Danh sách</p>
                        <input type="hidden" value="{{ url('/nhanvien/list')}}">
                    </a><a class="nav-link" href="{{ url('/nhanvien/add')}}">
                        <i class="fas fa-plus-circle"></i>
                        <p>Thêm</p>
                        <input type="hidden" value="{{ url('/nhanvien/add')}}">
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="#">
                    <i class="fas fa-glass-cheers"></i>
                    <p>Nguyên liệu</p>
                    <input type="hidden" value="{{ url('/nguyenlieu')}}">
                </a>
                <div style="display:none" class="nav-child">
                    <a class="nav-link" href="{{ url('/nguyenlieu/list')}}">
                        <i class="fas fa-list"></i>
                        <p>Danh sách</p>
                        <input type="hidden" value="{{ url('/nguyenlieu/list')}}">
                    </a><a class="nav-link" href="{{ url('/nguyenlieu/add')}}">
                        <i class="fas fa-plus-circle"></i>
                        <p>Thêm</p>
                        <input type="hidden" value="{{ url('/nguyenlieu/add')}}">
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu">
                    <input type="hidden" value="{{ url('/khachhang')}}">
                    <i class="fas fa-users"></i>
                    <p>Khách hàng</p>
                </a>
                <div style="display:none" class="nav-child">
                    <a class="nav-link" href="{{ url('/khachhang')}}">
                        <input type="hidden" value="{{ url('/khachhang')}}">
                        <i class="fas fa-list"></i>
                        <p>Danh sách</p>
                    </a><a class="nav-link" href="{{ url('/khachhang/add')}}">
                        <input type="hidden" value="{{ url('/khachhang/add')}}">
                        <i class="fas fa-plus-circle"></i>
                        <p>Thêm</p>
                    </a>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link menu" href="{{ url('/banhang')}}">
                    <input type="hidden" value="{{ url('/banhang')}}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <p>Bán hàng</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link menu" href="{{ url('/thongke')}}">
                    <i class="fas fa-chart-bar"></i>
                    <p>Thống kê doanh thu</p>
                    <input type="hidden" value="{{ url('/thongke')}}">
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link menu" href="{{ url('/thongkenl')}}">
                    <i class="fas fa-chart-pie"></i>
                    <p>Thống kê nguyên liệu</p>
                    <input type="hidden" value="{{ url('/thongkenl')}}">
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link menu">
                    <i class='fas fa-coffee'></i>
                    <p>Sản phẩm</p>
                    <input type="hidden" value="{{ url('/sanpham')}}">
                </a>
                <div style="display:none" class="nav-child">
                    <a class="nav-link" href="{{ url('/sanpham')}}">
                        <input type="hidden" value="{{ url('/sanpham')}}">
                        <i class="fas fa-list"></i>
                        <p>Danh sách</p>
                    </a>
                    <a class="nav-link" href="{{ url('/sanpham/add')}}">
                        <i class="fas fa-plus-circle"></i>
                        <p>Thêm</p>
                        <input type="hidden" value="{{ url('/sanpham/add')}}">
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="{{ url('/loaisanpham')}}">
                    <i class="far fa-copy"></i>
                    <p>Loại sản phẩm</p>
                    <input type="hidden" value="{{ url('/loaisanpham')}}">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="{{ url('/luong-thuong')}}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Lương Thưởng </p>
                    <input type="hidden" value="{{ url('/luong-thuong')}}">
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
$(function() {

    var url = window.location.href.replace('#', '');

    $(".nav a.menu").each(function() {
        if (url.indexOf($(this).find("input").val()) != -1) {
            $(this).addClass("active");
        }
    });

    $(".nav li").click(function() {
        if ($(this).hasClass("show")) {
            $(this).find("div").hide();
            $(this).removeClass("show");
        } else {
            $(this).find("div").show();
            $(this).addClass("show");
        }

    });
});
</script>
<style>
a.active {
    background: rgba(255, 255, 255, 0.23);
    -webkit-touch-callout: none;
    /* iOS Safari */
    -webkit-user-select: none;
    /* Safari */
    -khtml-user-select: none;
    /* Konqueror HTML */
    -moz-user-select: none;
    /* Old versions of Firefox */
    -ms-user-select: none;
    /* Internet Explorer/Edge */
    user-select: none;
    /* Non-prefixed version, currently
                                  supported by Chrome, Opera and Firefox */
    cursor: pointer;
}
</style>