
            $(document).ready(function($){
                $('.update').change(function(){
                    var id = $(this).attr('row-id');
                    var qty = $(this).val();
                    $.ajax({
                        url:'http://laravel-training.local/cart/update/'+id+'/'+qty,
                        dataType:'json',
                        success:function(data){
                            const numberFormat = new Intl.NumberFormat('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND',
                                    });
                            var price_total=(data.totalPriceCart.price)*(data.totalPriceCart.qty);
                            $("#price-item"+id).html(numberFormat.format(price_total));
                            $("#grand-total").html("Tổng tiền : "+(data.total)+"đ");
                        }
                    })
                });
            });
        ///addtocart
        $(document).ready(function($){
            ///duplicate-address
            $('#click_check').on('click',function(){
                document.getElementById('textBox10').value=document.getElementById('textBox1').value;
                document.getElementById('textBox6').value=document.getElementById('textBox2').value;
                document.getElementById('textBox7').value=document.getElementById('textBox3').value;
                // $('.textBox3').on('change', function() {
                // $('.textBox7').val($(this).val());
                // });
            })
            let listProduct=$("#product #addtocart");
                listProduct.on('click',function(){
                    var id=$(this).attr('buy-id');
                    $.ajax({
                    url:'http://laravel-training.local/cart/add/'+id,
                    dataType:'json',
                    success:function(result){
                        let count = result.countCart;
                        let data=result.contentCart;
                        let element="";
                        $.each(data,function(key,value){
                        element+= '<li class="single-shopping-cart" id="'+'item_id_'+value.rowId+ '">'+'<div class="shopping-cart-img">' +'<a href="#" >'+'<img src="' +'product'+'/'+ value.options.image + '" />'+'</a>'+'</div>'+'<div class="shopping-cart-title">'+'<h4>'+'<a href="">'+value.name+'</a>'+'</h4>'+'<h6>Số lượng: '+value.qty+'</h6>'+'<span>Giá: '+value.price+'</span>'+'</div>'+'<div id="productcart" class="shopping-cart-delete" style="">'+'<a style="cursor: pointer;" id="deleteitem" item-id="'+value.rowId+'">'+'<i class="ti-close">'+'</i>'+'</a>'+'</div>'+'</li>';
                        });
                        $('#cart').html(element);
                        $("#countcart").html(""+count);
                        $("#total").html(result.total+" VNĐ")
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
                });

                ////add in qickview-modal
            let product=$("#addtocart1");
                product.on('click',function(){
                    var id=$("#addtocart1").val();
                    $.ajax({
                    url:'http://laravel-training.local/cart/add/'+id,
                    dataType:'json',
                    success:function(result){
                        let count = result.countCart;
                        let data=result.contentCart;
                        let element="";
                        $.each(data,function(key,value){
                        element+= '<li class="single-shopping-cart" id="'+'item_id_' + value.rowId + '">'+'<div class="shopping-cart-img">' +'<a href="#" >'+'<img src="' +'product'+'/'+ value.options.image + '" />'+'</a>'+'</div>'+'<div class="shopping-cart-title">'+'<h4>'+'<a href="">'+value.name+'</a>'+'</h4>'+'<h6>Số lượng: '+value.qty+'</h6>'+'<span>Giá: '+value.price+'</span>'+'</div>'+'<div id="productcart" class="shopping-cart-delete" style="">'+'<a style="cursor: pointer;" id="deleteitem" item-id="'+value.rowId+'">'+'<i class="ti-close">'+'</i>'+'</a>'+'</div>'+'</li>';
                        });
                        $('#cart').html(element);
                        $("#countcart").html(""+count);
                        $("#total").html(result.total+" VNĐ")
                        }
                    })
                });

                ///delete
            $("body").on('click','#deleteitem',function(){
                var rowId=$(this).attr('item-id');
                console.log(rowId);
                $.ajax({
                    url:'http://laravel-training.local/cart/delete/'+rowId,
                    dataType:'json',
                    success:function(data){
                        $("#item_id_"+rowId).remove();
                        let count=data.countCart;
                        $("#countcart").html(""+count);
                    }
                })
            });
            /////quick-view
            let listquickview=$('#product #viewproduct');
            listquickview.on('click',function(){
                var view_id=$(this).attr('view-id');
                $.ajax({
                    url:'http://laravel-training.local/cart/quick-view/'+view_id,
                    dataType:'json',
                    success:function(result){
                        document.getElementById('addtocart1').value=view_id;
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
        });
