 $("body").on('click','#deleteitem',function(){
                var rowId=$(this).attr('item-id');
                console.log(rowId);
                $.ajax({
                    url:'http://laravel-training.local/cart/delete/'+rowId,
                    dataType:'json',
                    success:function(data){
                        $("#item_id_"+rowId).remove();
                        let count=data.countCart;
                        $("#countcart").html("" + count);
                        $("#total").html(data.total + " VNĐ");
                    }
                })
            });
