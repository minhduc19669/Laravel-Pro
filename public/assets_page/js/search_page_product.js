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
