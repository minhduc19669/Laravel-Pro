$(document).ready(function (){
    $("select[name='productr']").change(function (){
        let product_id=$(this).val();
        let origin = location.origin
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:origin+ '/users/order/product/'+product_id,
            data:{},
            dataType: 'json',
           success: function (data){
                console.log(data);
                $.each(data,function (key, value){
                    $('#price').html(
                     value.product_price
                    )
                })
        }
        })
    })
})
$(document).ready(function (){
    $("#cartOrder").on('click',function (){
        let product_id=$(this).attr('product-id');
        console.log(product_id);
        let origin = location.origin;
        $.ajax({
            url:origin+ '/users/order/cart/'+product_id,
            data:{},
            dataType: 'json',
            success: function (data){
                console.log(data);
                $.each(data,function (key, value){
                    $('.tbodyCart').append(
                        "<td>"+ value.product_price +"</td>"
                    )
                })
            }
        })
    })
})
