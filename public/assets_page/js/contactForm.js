$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#formContact").click(function(e){

    e.preventDefault();
    var origin = location.origin
    var name = $("input[name=name]").val();
    var email = $("input[name=email]").val();
    var title = $("input[name=title]").val();
    var content = $("input[name=content]").val();
    var url =origin + '/users/feedback/save';
     // if(name != '' && email != '' && title != '' && content != '') {
         $.ajax({
             url: url,
             method: 'POST',
             datatype: 'application/json',
             data: {
                 name: name,
                 email: email,
                 title: title,
                 content: content
             },
             success: function (response) {
                 if (response.success) {
                     alert(response.message) //Message come from controller
                 } else {
                     alert("Error")
                 }
             },
             error: function (error) {
                 console.log(error)
             }
         });
     // }else{
     //     alert('Không được phép để trống !');
     // }
});
