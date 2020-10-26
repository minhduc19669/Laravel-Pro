"use strict";

$(document).ready(function ($) {
  $('.update').on('change', function () {
    var id = $(this).attr('row-id');
    var qty = $(this).val();
    $.ajax({
      url: 'http://laravel-training.local/cart/update/' + id + "/" + qty,
      dataType: 'json',
      success: function success(result) {
        var totalPrice = result.totalPriceCart.qty;
        var price = totalPrice * result.totalPriceCart.price;
        console.log(totalPrice);
        var prices = new Intl.NumberFormat().format(price);
        $('#price-item' + id).html(prices + ' ' + '<u>' + 'đ' + '</u>');
        $('#grand-total').html('Tổng tiền : ' + prices + ' ' + '<u>' + 'đ' + '</u>');
      }
    });
  });
});