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
$(document).on('click','#numberBrandProduct',function (){
    $value1 = $(this).val()
    let origin = location.origin;
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
    $.ajax({
        type : 'get',
        url:origin + '/home/product/show',
        data : {
            'numberProduct' : $value1
        },
        success : function (data){
            console.log(data)
            $('#search_BrandProduct_ajax').html(data);
        }
    })
})
$(document).on('click','#numberSubProduct',function (){
    $value1 = $(this).val()
    let origin = location.origin;
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
    $.ajax({
        type : 'get',
        url:origin + '/home/product/show',
        data : {
            'numberProduct' : $value1
        },
        success : function (data){
            console.log(data)
            $('#search_product_ajax').html(data);
        }
    })
})

