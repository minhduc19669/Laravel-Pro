$(document).on('click','#numberProduct',function (){
    $value = $(this).val()
    let origin = location.origin;
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
    $.ajax({
        type : 'get',
        url:origin + '/home/product/show',
        data : {
            'numberProduct' : $value
        },
        success : function (data){
            console.log(data)
            $('#search_product_ajax').html(data);
        }
    })
})
