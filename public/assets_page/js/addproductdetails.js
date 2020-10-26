
$(document).ready(function ($) {
    $('#addproductdetail').on('click', function () {
        var qty = $('#qtyproduct').val();
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'http://laravel-training.local/cart/addproductqty/' + id + '/' + qty,
            dataType: 'json',
            success: function (result) {
                let count = result.countCart;

                    let data = result.contentCart;
                let element = "";

                $.each(data, function (key, value) {
                    element+= '<li class="single-shopping-cart" id="'+'item_id_'+value.rowId+ '">'+'<div class="shopping-cart-img">' +'<a href="#" >'+'<img src="' +'../../../storage'+'/'+ value.options.image + '" />'+'</a>'+'</div>'+'<div class="shopping-cart-title">'+'<h4>'+'<a href="">'+value.name+'</a>'+'</h4>'+'<h6>Số lượng: '+value.qty+'</h6>'+'<span>Giá: '+value.price+'</span>'+'</div>'+'<div id="productcart" class="shopping-cart-delete" style="">'+'<a style="cursor: pointer;" id="deleteitem" item-id="'+value.rowId+'">'+'<i class="ti-close">'+'</i>'+'</a>'+'</div>'+'</li>';
                        });
                        $('#cart').html(element);
                        $("#countcart").html(""+count);
                        $("#total").html(result.total+" VNĐ")
            }
        })
    });




    });

