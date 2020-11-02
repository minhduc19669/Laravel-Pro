"use strict";

$('body').on('click', '#deleteitem', function () {
  var rowId = $(this).attr('item-id');
  $.ajax({
    url: 'http://laravel-training.local/cart/delete/' + rowId,
    dataType: 'json',
    success: function success(data) {
      $("#item_id_" + rowId).remove();
      $("#item_id1_" + rowId).remove();
      var count = data.countCart;
      $("#countcart").html("" + count);
      $("#total").html(data.total + " VNĐ");
    }
  });
});