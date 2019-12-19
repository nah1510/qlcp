<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-users-cog"></i>
                    <p>Nhân viên</p>
                </a>
                <div style="display:none">
                    <a class="nav-link" href="{{ url('/nhanvien/list')}}">
                        <i class="far fa-copy"></i>
                        <p>Danh sách</p>
                    </a><a class="nav-link" href="{{ url('/loaisanpham')}}">
                        <i class="far fa-copy"></i>
                        <p>Thêm</p>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('/khachhang')}}">
                    <i class="fas fa-users"></i>
                    <p>Khách hàng</p>
                </a>
                <div style="display:none">
                    <a class="nav-link" href="{{ url('/loaisanpham')}}">
                        <i class="far fa-copy"></i>
                        <p>Danh sách</p>
                    </a><a class="nav-link" href="{{ url('/loaisanpham')}}">
                        <i class="far fa-copy"></i>
                        <p>Thêm</p>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/banhang')}}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <p>Bán hàng</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/thongke')}}">
                    <i class="fas fa-chart-bar"></i>
                    <p>Thống kê</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/sanpham')}}">
                    <i class='fas fa-coffee'></i>
                    <p>Sản phẩm</p>
                </a>
                <div style="display:none">
                    <a class="nav-link" href="{{ url('/loaisanpham')}}">
                        <i class="far fa-copy"></i>
                        <p>Danh sách</p>
                    </a><a class="nav-link" href="{{ url('/loaisanpham')}}">
                        <i class="far fa-copy"></i>
                        <p>Thêm</p>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/loaisanpham')}}">
                    <i class="far fa-copy"></i>
                    <p>Loại sản phẩm</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./notifications.html">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
$(function() {

    var url = window.location.href.replace('#','');

    $("a").each(function() {
        if (url.indexOf(this.href) != -1 && url.lastIndexOf("#") == -1) {
            $(this).parent().addClass("active");
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