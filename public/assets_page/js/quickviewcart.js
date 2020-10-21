let listquickview=$('#product #viewproduct');
            listquickview.on('click',function(){
                var view_id=$(this).attr('view-id');
                $.ajax({
                    url:'http://laravel-training.local/cart/quick-view/'+view_id,
                    dataType:'json',
                    success:function(result){
                        let product_name=result.product_name;
                        let product_price=result.product_price;
                        let product_desc=result.product_desc;
                        let product_content=result.product_content;
                        $("#product-name").html(product_name);
                        $("#product-price").html(product_price);
                        $("#product-content").html(product_content);
                        $("#product-desc").html(product_desc);
                    }
                })
            })
