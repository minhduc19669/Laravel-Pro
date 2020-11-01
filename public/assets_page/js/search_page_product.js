$(document).on('keyup','#search_product',function (){
    $value = $(this).val()
    let origin = location.origin;
    $.ajaxSetup({
    headers: { 'csrftoken' : '{{ csrf_token() }}' }
});
    $.ajax({
    type : 'get',
    url:origin + '/page/product/search/ajax',
    data : {
    'search_product' : $value
},
    success : function (data){
        console.log(data)
    $('#search_product_ajax').html(data);
}
})
})
$('#search_product_brand').on('keyup',function (){
    $value = $(this).val()
    let id = $(this).attr('data-id')
    console.log(id)
    let origin = location.origin;
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
    $.ajax({
        type : 'get',
        url:origin + '/page/product/brand/search/ajax/' +id,
        data : {
            'search_product' : $value,
             'id' : id
        },
        success : function (data){
            $('#search_BrandProduct_ajax').html(data);
        }

    })
})
$('#search_SubProduct').on('keyup',function (){
    $value = $(this).val()
    let id = $(this).attr('data-id')
    console.log(id)
    let origin = location.origin;
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
    $.ajax({
        type : 'get',
        url:origin + '/page/product/subcategory/search/ajax/' +id,
        data : {
            'search_product' : $value,
            id
        },
        success : function (data){
            $('#search_product_ajax').html(data);
        }

    })
})

