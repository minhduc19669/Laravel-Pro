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
$(document).on('click', '#orderProduct', function() {
        var id = $(this).data('id');
        console.log(id);
        let origin = location.origin;
        $.ajax({
            url:origin+ '/users/order/cart/'+id,
            data: {
                "product_id": id,
            },
            dataType: 'json',
            success: function (data){
                console.log(data);
                $.each(data,function (key, value){
                    $('.tbodyCart').append(
                        " <tr>+<td><img width='50px' src='/storage/"+ value.product_image +"'></td>+<td>"+ value.product_name +"</td>+<td>"+ value.product_price +"</td>+<td></td>+<td></td>+<td><button class='btn btn-outline-success'>Xóa</button></td></tr> "

                    )
                })
            }
        })
})
