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
            <div class="content-rightside">
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
                <div class="wrapSum">
                    <div class="Sum">
                        <div class="Sum-item"><input type="text" id="check_code" autocomplete='off'
                                class="form-controll form-controll-sum " name="total_bill"
                                placeholder="Nhập mã giảm giá"><img src='/upload/icon/discount.svg' alt='icon'
                                class="moneyIcon"></div>
                    </div>
                    <div class="Print"><button onclick="save_db()" class="CodeChecking">Kiểm tra</button></div>
                </div>
                <div class="wrapSum">
                    <div class="Sum">
                        <div class="Sum-item"><input type="text" id="total_bill" autocomplete='off'
                                class="form-controll form-controll-sum " name="total_bill" value="0" readonly><img
                                src='/upload/icon/coins.svg' alt='icon' class="moneyIcon"></div>
                    </div>
                    <div class="Print"><button onclick="save_db()" class="Invoice">Xuất Hóa Đơn</button></div>
                </div>
            </div>

    </div>

    </section>
    </div>
    <input type="hidden" id="customer_id">
</body>

</html>