list_san_pham(0);
$(function() {
    $(".client-leftside").click(function() {
        $(".left").show();
        $(".right").hide();
    });
    $(".client-rightside").click(function() {
        $(".right").show();
        $(".left").hide();
    });
});

function isNumberKey(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
    total_bill();
}

function change0(id) {
    var row = $(".table-body").find("#" + id);
    if (Number(row.find(".number-input").val()) == 0) {
        row.remove();
    }
    total_bill();
}

function total_bill() {
    var total_bill = 0;
    $(".tr").each(function() {
        total_bill +=Number($(this).find(".number-input").val()) *Number($(this).find(".price").val());
    });
    $("#initial_price").val(total_bill);
    var discount = 0;
    if( $("#code_status").val()!=""&& $("#code_min_bill").val()<=total_bill){
        if($("#code_type").val()==1)
            {
                discount = total_bill * $("#code_discount").val() /100;
                if($("#code_max_discount").val() <discount)
                    discount =$("#code_max_discount").val();
            }
        else{
            discount = $("#code_discount").val();
            if(discount > total_bill)
                discount = total_bill;
        }
        $("#discount").val(discount);
        total_bill = total_bill - discount;
    }
    $("#total_bill").val(total_bill);
}

function save_db() {
    if ($("#initial_price").val() == 0) {
        alert("Not create bill");
        return;
    }
    var HoaDon = [];
    $(".tr").each(function() {
        var total =Number($(this).find(".number-input").val()) *Number($(this).find(".price").val());
        var CT_HoaDon = [
            $(this).attr("nameText"),
            $(this).find(".price").val(),
            $(this).find(".number-input").val(),
            total
        ];
        HoaDon.push(CT_HoaDon);
    });
    $.ajax({
        type: "POST",
        url: "ajax_save_bill",
        data: {
            _token: $("#_token").val(),
            total_bill: $("#total_bill").val(),
            bill: HoaDon,
            customer_id: $("#customer_id").val(),
            initial_price :$("#initial_price").val(),
            discount :$("#discount").val(),
        },
        success: function(msg) {
            alert("Đã lưu thành công " );
            $(".table-body >tr").remove();
            total_bill();
            list_san_pham(0);
        }
    });
}

function list_san_pham(id) {
    $(".wrapItem >article").remove();
    $.ajax({
        type: "POST",
        url: "ajax_list_san_pham",
        data: {
            _token: $("#_token").val(),
            id: id
        },
        success: function(data) {
            data = JSON.parse(data);
            $.each(data, function(key, value) {
                var html =
                    '<article class="card menu-cafe">' +
                    '<input class="id-product" type="hidden" value="' +
                    value["id"] +
                    '">' +
                    '<input class="price-product" type="hidden" value="' +
                    value["price"] +
                    '">' +
                    '<div class= "card-media">' +
                    '<img src="/upload/' +
                    value["image"] +
                    '" class="size" >' +
                    '<p class="card-media-price">' +
                    value["price"]
                        .toLocaleString()
                        .replace(/\d(?=(\d{3})+\.)/g, "$&,") +
                    " VND</p>" +
                    "</div >" +
                    '<div class="card-content">' +
                    '<h2 class="card-content-header">' +
                    value["name"] +
                    "</h2>" +
                    "</div>" +
                    "</article>";
                $(".wrapItem").append(html);
            });
            $(".menu-cafe").on("click", function() {
                var id = $(this)
                    .find(".id-product")
                    .val();
                var row = $(".table").find("#" + id);
                if (row.length) {
                    row.find(".number-input").val(
                        Number(row.find(".number-input").val()) + 1
                    );
                    total_bill();
                    return;
                }
                var html ='<tr class="tr rowItem" nameText="' +$(this).find("h2").text() +'" id="' +id +'"><td>' +$(this).find("h2").text() +"</td>" +
                    '<td ><div class="dataInput"><div><input value="1" onchange="change0(' +id +')" onKeyPress="return isNumberKey(event)" class="number-input numberInput form-controll" type="text" min="1" max="99" maxlength="2"></div><div><button class="plus btn btn-Plus">+</button><button class="sub btn btn-Sub">-</button></div></div></td>' +
                    '<td class="center">' +$(this).find(".price-product").val() +
                    '<input type="hidden" class="price" value="' +$(this).find(".price-product").val() +'"></td>' +
                    '<td><button class="btnD btn-delete">Hủy</button></td></tr>';
                $(".table-body").append(html);
                $(".btn-delete").on("click", function() {
                    $(this)
                        .parent()
                        .parent()
                        .remove();
                    total_bill();
                });
                $(".plus,.sub").off("click");
                $(".plus").on("click", function() {
                    var number = $(this)
                        .parent()
                        .parent()
                        .find(".number-input");
                    if (Number(number.val()) == 99) return;
                    number.val(Number(number.val()) + 1);
                    total_bill();
                });
                $(".sub").on("click", function() {
                    var number = $(this)
                        .parent()
                        .parent()
                        .find(".number-input");
                    if (Number(number.val()) == 1) {
                        // $(this).parent().parent().parent().remove();
                        return;
                    }
                    number.val(Number(number.val()) - 1);
                    total_bill();
                });
                total_bill();
            });
        }
    });
}

function formatTime(time) {
    const date = new Date(time);
    let day = date.getDay(),
        month = date.getMonth();
    return (
        `${day < 10 ? `0${day}` : day}` +
        "." +
        `${month < 10 ? `0${month}` : month}` +
        "." +
        date.getFullYear() +
        "."
    );
}
function khachhang() {
    if ($("#info-customer").val() == "") return;
    $.ajax({
        type: "POST",
        url: "ajax_find_customer",
        data: {
            _token: $("#_token").val(),
            phone: $("#info-customer").val()
        },
        success: function(data) {
            $("#show-info-customer > div").remove();
            //$("#show-info-customer >div").remove();  nếu là div
            if (data == "false") {
                var html =
                    '<div class="notFound"><div class="notFound-icon"><img src="/upload/icon/not-found.svg" alt="not found"></div><div class="notFound-text">Không tìm thấy kết quả phù hợp</div></div>';
                $("#customer_id").val("");
                $("#show-info-customer").append(html);
            } else {
                data = JSON.parse(data);
                var html1 =
                    '<div class="inform"><h6>' +
                    data["name"] +
                    "</h6><h6>" +
                    data["phone"] +
                    "</h6><h6>" +
                    data["email"] +
                    "</h6><h6>" +
                    data["created_at"] +
                    "</h6><div>";
                var html =
                    '<div class="clientInfo"><div class="clientInfo-name"><h1>' +
                    data["name"] +
                    '</h1></div><div class="clientInfo-contact"><div class="clientInfo-contact-phone">' +
                    data["phone"] +
                    '<span><img src="/upload/icon/phone-contact.svg" alt="phone-icon" class="contact-icon" /></span></div><div class="clientInfo-contact-mail">' +
                    data["email"] +
                    '<span><img src="/upload/icon/gmail.svg" alt="phone-icon" class="contact-icon" /></span></div><span class="clientInfo-title clientInfo-title-contact">Liên hệ</span></div>' +
                    // '<div class="clientInfo-time"><div class="clientInfo-time-createAt"><i class="fas fa-user-plus" style="margin-right:5px"></i>' +
                    // formatTime(data["created_at"]) +
                    // "</div>" +
                    // '</div><div class="clientInfo-time-Age">' +
                    // 21 +
                    // '<i class="fas fa-birthday-cake" style="margin-left:5px"></i>'+
                    // '<span class="clientInfo-title clientInfo-title-time ">Dòng thời gian</span></div>'+
                    '<div class="clientInfo-points"><span class="clientInfo-points-icon"><img src="/upload/icon/gifts-1.svg" alt="icon gift" /></span><i style="margin-right: 10px" class="fas fa-coins"></i>' +
                    data["point"] +
                    "</div>";
                $("#show-info-customer").append(html);
                $("#customer_id").val(data["id"]);
            }
        }
    });
}
function check_code() {
    if ($("#code").val() == "") return;
    $.ajax({
        type: "POST",
        url: "check",
        data: {
            _token: $("#_token").val(),
            code: $("#code").val()
        },
        success: function(data) {
            if (data == "false") {
                
                $("#code_status").val("");
                $(".code_check").show();
                $(".code_check_true").hide();
            } else {
                $(".code_check").hide();
                $(".code_check_true").show();
                $("#code_status").val("true");
                data = JSON.parse(data);
                $("#code_min_bill").val(data["min_bill"]);
                $("#code_type").val(data["type"]);
                $("#code_max_discount").val(data["max_discount"]);
                $("#code_discount").val(data["discount"]);
            }
            total_bill();
        }
        
    });
}
