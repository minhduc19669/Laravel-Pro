
@extends('layout.layout')
@section('url','https://bizweb.dktcdn.net/100/047/359/themes/66510/assets/women_banner.png?1543757106135')
@section('content')
    <div id="tag_container">
        @include('pages.brand_product')
    </div>
    <script type="text/javascript">
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];

                getData(page);
            });

        });

        function getData(page){
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html"
                }).done(function(data){
                $("#tag_container").empty().html(data);
                location.hash = page;
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert('No response from server');
            });
        }
    </script>

@endsection
