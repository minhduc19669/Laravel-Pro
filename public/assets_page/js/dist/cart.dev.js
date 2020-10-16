"use strict";

$(document).ready(function ($) {
  $('.ship-wrapper .single-ship .radio-check').on('click', function () {
    $('.ship-wrapper .single-ship .radio-check').not(this).prop('checked', false);
  });
  $("select[name='city']").change(function () {
    var city_id = $(this).val();
    var origin = location.origin;
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: origin + '/cart/district/' + city_id,
      data: {},
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        $("select[name='district']").children().remove();
        $("select[name='district']").focus();
        $("select[name='district']").append("<option value=''>" + "--Quận/Huyện--" + "</option>");
        $.each(data, function (key, value) {
          $("select[name='district']").append("<option value=" + value.id + ">" + value.name + "</option>");
        });
      }
    });
  });
  $("select[name='city_receive']").change(function () {
    var city_id = $(this).val();
    var origin = location.origin;
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: origin + '/cart/district/' + city_id,
      data: {},
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        $("select[name='district_receive']").children().remove();
        $("select[name='district_receive']").focus();
        $("select[name='district_receive']").append("<option value=''>" + "--Quận/Huyện--" + "</option>"); // console.log(result);

        $.each(data, function (key, value) {
          $("select[name='district_receive']").append("<option value=" + value.id + ">" + value.name + "</option>");
        });
      }
    });
  }); ///duplicate-address

  $('#click_check').on('click', function () {
    document.getElementById('textBox10').value = document.getElementById('textBox1').value;
    document.getElementById('textBox6').value = document.getElementById('textBox2').value;
    document.getElementById('textBox7').value = document.getElementById('textBox3').value; // $('.textBox3').on('change', function() {
    // $('.textBox7').val($(this).val());
    // });
  });
});
$(document).ready(function ($) {
  $('.update').change(function () {
    var id = $(this).attr('row-id');
    var qty = $(this).val();
    $.ajax({
      url: 'http://laravel-training.local/cart/update/' + id + '/' + qty,
      dataType: 'json',
      success: function success(data) {
        var numberFormat = new Intl.NumberFormat('vi-VN', {
          style: 'currency',
          currency: 'VND'
        });
        var price_total = data.totalPriceCart.price * data.totalPriceCart.qty;
        $("#price-item" + id).html(numberFormat.format(price_total));
        $("#grand-total").html("Tổng tiền : " + data.total + "đ");
      }
    });
  });
});
$(document).ready(function ($) {
  ///duplicate-address
  $('#click_check').on('click', function () {
    document.getElementById('textBox10').value = document.getElementById('textBox1').value;
    document.getElementById('textBox6').value = document.getElementById('textBox2').value;
    document.getElementById('textBox7').value = document.getElementById('textBox3').value;
  }); ///addtocart

  var listProduct = $("#product #addtocart");
  listProduct.on('click', function () {
    var id = $(this).attr('buy-id');
    $.ajax({
      url: 'http://laravel-training.local/cart/add/' + id,
      dataType: 'json',
      success: function success(result) {
        var count = result.countCart;
        var data = result.contentCart;
        var element = "";
        $.each(data, function (key, value) {
          element += '<li class="single-shopping-cart" id="' + 'item_id_' + value.rowId + '">' + '<div class="shopping-cart-img">' + '<a href="#" >' + '<img src="' + 'product' + '/' + value.options.image + '" />' + '</a>' + '</div>' + '<div class="shopping-cart-title">' + '<h4>' + '<a href="">' + value.name + '</a>' + '</h4>' + '<h6>Số lượng: ' + value.qty + '</h6>' + '<span>Giá: ' + value.price + '</span>' + '</div>' + '<div id="productcart" class="shopping-cart-delete" style="">' + '<a style="cursor: pointer;" id="deleteitem" item-id="' + value.rowId + '">' + '<i class="ti-close">' + '</i>' + '</a>' + '</div>' + '</li>';
        });
        $('#cart').html(element);
        $("#countcart").html("" + count);
        $("#total").html(result.total + " VNĐ");
      }
    });
    Swal.fire({
      title: 'Sản phẩm đã được thêm vào giỏ hàng của bạn!',
      icon: 'success',
      background: '#fff url(/images/trees.png)',
      backdrop: "\n                            rgba(0,0,123,0.4)\n                            url(\"/images/nyan-cat.gif\")\n                            left top\n                            no-repeat\n                        "
    });
  }); ////addproduct in qickview-modal
  ///delete

  $("body").on('click', '#deleteitem', function () {
    var rowId = $(this).attr('item-id');
    console.log(rowId);
    $.ajax({
      url: 'http://laravel-training.local/cart/delete/' + rowId,
      dataType: 'json',
      success: function success(data) {
        $("#item_id_" + rowId).remove();
        var count = data.countCart;
        $("#countcart").html("" + count);
      }
    });
  }); /////quick-view

  var listquickview = $('#product #viewproduct');
  listquickview.on('click', function () {
    var view_id = $(this).attr('view-id');
    $.ajax({
      url: 'http://laravel-training.local/cart/quick-view/' + view_id,
      dataType: 'json',
      success: function success(result) {
        var product_name = result.product_name;
        var product_price = result.product_price;
        var product_desc = result.product_desc;
        var product_content = result.product_content;
        $("#product-name").html(product_name);
        $("#product-price").html(product_price);
        $("#product-content").html(product_content);
        $("#product-desc").html(product_desc);
      }
    });
  });
});