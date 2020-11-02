$(document).on('click','#myRange',function (){
    $value = $(this).val()
    let origin = location.origin;
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
    $.ajax({
        type : 'get',
        url:origin + '/home/product/filter/price',
        data : {
            'myRange' : $value
        },
        success : function (data){
            console.log(data)
            $('#search_product_ajax').html(data);
        }
    })
})
$(document).on('click','#myRangeBrand',function (){
    $value1 = $(this).val()
    let origin = location.origin;
    console.log()
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
    $.ajax({
        type : 'get',
        url:origin + '/home/product/filter/price',
        data : {
            'myRangeBrand' : $value1
        },
        success : function (data){
            console.log(data)
            $('#search_BrandProduct_ajax').html(data);
        }
    })
})

