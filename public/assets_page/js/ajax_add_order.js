
$(document).on('click', '#orderProduct', function() {
        var id = $(this).data('id');
        console.log(id);
        let origin = location.origin;
        $.ajax({
            url:'http://laravel-training.local/cart/add/' +id,
            data: {
                "product_id": id,
            },
            dataType: 'json',
            success:function(result){
                let count = result.countCart;
                let data=result.contentCart;
                let element="";
                $.each(data,function(key,value){
                    element+= '<tr  id="'+'item_id'+value.rowId+ '">'+'<td><img width="50px" src="/storage/'+ value.options.image + '" /></td>'+'<td>'+value.name+'</td>'+'<td>'+value.price+'</td>'+'<td><input min="1" row-id="'+ value.rowId +'" style="text-align: center;" id="update" type="number" name="qtybutton" value="'+value.qty+'"></td>'+'<td>'+'<span id="price-item'+value.rowId+'">'+value.price*value.qty+'</span>'+'</td>'+'<td><a class="btn  btn-danger delete shopping-cart-delete"  style="cursor: pointer;" id="deleteitem" item-id="'+value.rowId+'">Xóa</a>\n</td>'+'</tr>';
                });
                $('.tbodyCart').html(element);
                $("#total").html(result.total+" VNĐ")
                $("#total_x").html("<b>Tổng số tiền:</b>"+ result.total+ " VNĐ")
                $("#count_x").html("<b>Số đơn hàng:</b>"+count)

            }

        });
    Swal.fire({
        title: 'Sản phẩm đã được thêm vào giỏ hàng của bạn!',
        icon:'success',
        background: '#fff url(/images/trees.png)',
        backdrop: `
                            rgba(0,0,123,0.4)
                            url("/images/nyan-cat.gif")
                            left top
                            no-repeat
                        `
    });
})
$(document).on('click','#deleteitem',function(){
    var rowId=$(this).attr('item-id');
    console.log(rowId);
    $.ajax({
        url:'http://laravel-training.local/cart/delete/'+rowId,
        dataType:'json',
        success:function(data){
            $("#item_id"+rowId).remove();
            let count=data.countCart;
            $("#total").html(data.total+" VNĐ")
            $("#total_x").html("<b>Tổng số tiền:</b>"+ result.total+ " VNĐ")
            $("#count_x").html("<b>Số đơn hàng:</b>"+count)


        }
    })
});
// Cập nhật
$(document).on('click', '#update', function() {
    var id = $(this).attr('row-id');
        console.log(id);

        var qty = $(this).val();
        $.ajax({
            url: 'http://laravel-training.local/cart/update/' + id + "/" + qty,
            data: {'rowId' : id},
            dataType: 'json',
            success: function (result) {
                let totalPrice = result.totalPriceCart.qty;
                let price = totalPrice * result.totalPriceCart.price;
                let prices = new Intl.NumberFormat().format(price);
                $("#total").html(result.total+" VNĐ")
                $("#total_x").html("<b>Tổng số tiền:</b>"+ result.total+ " VNĐ")
                $('#price-item' + id).html(prices +' '+'<u>'+
                    '</u>');
            }
        })
})

