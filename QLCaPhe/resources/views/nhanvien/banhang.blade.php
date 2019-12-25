<!DOCTYPE html>
<html lang="vi">

<head>
    <input type="hidden" id="_token" value="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/sass/indexblade.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/globalstyle.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/sass/header.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/BanHang.js')}}"></script>
    <link href="{{asset('assets/css/fontawesome-free-5.12.0-web/css/all.css')}}" rel="stylesheet" />
</head>
<style>

</style>

<body class="style-1 ">
    @include('masterhead')
    <div class="supperWrapper style-1">
        <section class="content wrapper style-1">
            <div class="content-leftside">
                <nav>
                    <div class="wrapNavlist">
                        <ul class="navlist">
                            <div onclick="list_san_pham(0)" class="navlist-item">
                                <li>Tất cả</li>
                            </div>
                            @foreach($loaisanpham as $list)
                            <div onclick="list_san_pham({{$list->id}})" class="navlist-item">
                                <li>{{$list->name}}</li>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg"></div>
                </nav>

                <div class="wrapBackground style-1">
                    <div class="wrapItem">

                    </div>
                </div>
            </div>
            <div class="content-rightside style-1">
                <div class="client">
                    <div class="client-leftside"><img src="/upload/icon/bill.svg" alt="Hóa Đơn" class="Image" /></div>
                    <div class="client-rightside"><img src="/upload/icon/target.svg" alt="khách hàng" class="Image" />
                    </div>
                </div>
                <div class="wrapTable left style-1">
                    <table class="table tb">
                        <thead class="black">
                            <tr class="row">
                                <th scope="col" class="head">Món</th>
                                <th scope="col" class="head">Số lượng</th>
                                <th scope="col" class="head">Giá</th>
                                <th scope="col" class="head">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                        </tbody>
                    </table>
                </div>
                <div class="wrapTable right style-1" style="display:none;">
                    <div class="wrapTag-right">
                        <div class="searchClient">
                            <div class="searchClient-input"><input type="text" id="info-customer"
                                    placeholder="Nhập thông tin khách" class='form-controll'></div>
                            <div class="searchClient-icon"><button onclick="khachhang()">
                                    <div src="/upload/icon/searching-data-in-database.svg" class='iconSearch'></div>
                                </button></div>
                        </div>
                        <div id="show-info-customer" class="result">
                            <span>
                                <img src="/upload/icon/user-silhouette.svg" alt="User is Found" />
                            </span>
                        </div>
                    </div>
                </div>
                <button id="myBtn" class="Btton Btton-addclient">Thêm
                    khách hàng</button>
                <div class="wrapSum">
                    <div class="Sum">
                        <div class="Sum-item"><input type="text" id="code" autocomplete='off'
                                class="form-controll form-controll-sum " placeholder="Nhập mã giảm giá"><img
                                src='/upload/icon/discount.svg' alt='icon' class="moneyIcon"></div>
                    </div>
                    <div class="Print"><button onclick="check_code()" class="Btton Btton-checking">Kiểm tra</button>
                    </div>

                </div>
                <span class="code_check" style="color:red;margin-left: 54px;display: none;">Không áp dụng</span>
                <span class="code_check_true" style="color:green;margin-left: 54px;display: none;">Mã giảm giá áp
                    dụng</span>
                <div class="wrapSum wrapSum-column">
                    <div class="Sum">
                        <div class="Sum-item"><input type="text" id="total_bill" autocomplete='off'
                                class="form-controll form-controll-sum " name="total_bill" value="0" readonly><img
                                src='/upload/icon/coins.svg' alt='icon' class="moneyIcon"></div>
                    </div>
                    <div class="Print"><button onclick="save_db()" class="Btton Btton-invoice">Xuất Hóa Đơn</button>
                    </div>
                </div>
            </div>

    </div>

    </section>
    </div>
    <input type="hidden" id="code_status">
    <input type="hidden" id="customer_id">
    <input type="hidden" id="code_min_bill">
    <input type="hidden" id="code_type">
    <input type="hidden" id="code_max_discount">
    <input type="hidden" id="code_discount">
    <input type="hidden" id="discount" value="0">
    <input type="hidden" id="initial_price">

</body>
<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Thêm khách hàng</p>
        <form action="khachhang/add" method="POST" role="form">
            <input type="text" id="modal_name" name="name" placeholder="Tên khách hàng" required>

            <input type="number" name="phone" placeholder="Số điện thoại" minlength="10" maxlength="10" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="submit" value="Submit">
            {!! csrf_field() !!}
        </form>
    </div>

</div>

</html>
<script>
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<style>
.modal {
    display: none;
    position: fixed;
    z-index: 100;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 500px;
}

.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal input {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.modal input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.modal input[type=submit]:hover {
    background-color: #45a049;
}

.modal div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>