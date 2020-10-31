var $star_rating = $('.star-rating .fa');


var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});
$(function () {
            let listStar = $(".star-rating .fa");
            listStar.click(function (e) {
                let $this = $(this);
                document.getElementById('rating-input').value = $this.attr('data-rating');
                console.log($this.attr('data-rating'));
            })
        });
