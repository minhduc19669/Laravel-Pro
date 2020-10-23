$(document).ready(function ($) {
$('.update').on('change', function () {
    var id = $(this).attr('row-id');
    var qty = $(this).val();
            $.ajax({
                url: 'http://laravel-training.local/cart/update/' + id + "/" + qty,
                dataType: 'json',
                success: function (result) {
                    let totalPrice = result.totalPriceCart.qty;
                    let price = totalPrice * result.totalPriceCart.price;
                    let prices = new Intl.NumberFormat().format(price);
                    $('#price-item' + id).html(prices +' '+'<u>'+
                        'đ'+'</u>');
                }
            })
        });
})
