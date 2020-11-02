
    $('body').on('click','#deleteitem1', function () {
        var rowId = $(this).attr('item-id1');
                $.ajax({
                    url:'http://laravel-training.local/cart/delete/'+rowId,
                    dataType:'json',
                    success: function (data) {
                        $("#item_id1_" + rowId).remove();
                        $("#item_id_"+rowId).remove();
                        let count=data.countCart;
                        $("#countcart").html("" + count);
                        $("#total").html(data.total + " VNĐ");
                    }
                })
            });


