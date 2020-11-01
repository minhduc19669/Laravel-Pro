  $(document).ready(function($) {
	  $(".btn-submit").click(function (e) {
            e.preventDefault();
            var _token = $("input[name=_token]").val();
            var rating = $("input[name=rating]").val();
            var product_id = $("input[name=product_id]").val();
            var message = $("textarea[name=message]").val();
            $.ajax({
                url: "http://laravel-training.local/post",
                type: 'POST',
                dataType:'json',
                data: {_token:_token, rating:rating, product_id:product_id, message:message },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        function taskDate(dateMilli) {
                            var d = (new Date(dateMilli) + '').split(' ');
                            return [d[2], d[1], d[3]].join(' ');
                        }
                        var datemilli = Date.parse(data.post.created_at);
                        let element = '<div class="sin-rattings">' + '<div class="star-author-all">' + '<div class="product-rating f-left">' +
                            '<i class="ti-star theme-color">' + '</i>'+
                            '<i class="ti-star theme-color">' + '</i>' +
                            '<i class="ti-star theme-color">' + '</i>' +
                            '<i class="ti-star theme-color">' + '</i>' +
                            '<i class="ti-star theme-color">' + '</i>' +
                            '<span>' + '('+data.rating+ ')'+ '</span>' +
                            '</div>' +
                            '<div class="ratting-author f-right">' +
                            '<h3>' + data.name + '</h3>' +
                            '<span>' + taskDate(datemilli) + '</span>' +
                            '</div>' +
                            '</div>' +
                            '<p>' + data.post.content + '</p>' +
                            '</div>';
                        $('#rating').prepend(element);
                        document.getElementById('message').value = '';
                    } else {
                        $('#star-error').html(data.error[1]);
                        $('#message-error').html(data.error[0]);
                    }
                },
            });
        });
    });
