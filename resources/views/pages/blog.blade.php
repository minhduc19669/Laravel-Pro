 @extends('layout.layout')
@section('url','https://petnhatrang.com/wp-content/themes/petshop/images/background-banner.jpg')
@section('content')

 <div class="blog-area pt-100 pb-100 clearfix">
            <div class="container">
                <h1><u>Blog</u></h1>
                <div class="row">
                    @foreach ($news as $item)
                        <div class="col-lg-6 col-md-6">
                        <div class="blog-wrapper mb-30 gray-bg">
                            <div class="blog-img hover-effect">
                            <a href="{{route('page.blogdetails',$item->news_id)}}"><img alt="" src="{{asset('news/'.$item->news_image)}}"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li>By: <span>Admin</span></li>
                                        <li>Sep 14, 2018</li>
                                    </ul>
                                </div>
                                <h4><a href="blog-details.html">Lorem ipsum dolor amet cons adipisicing elit</a></h4>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="pagination-style text-center mt-20">
                    <ul>
                        <li>
                            <a href="#"><i class="icon-arrow-left"></i></a>
                        </li>
                        <li>
                            <a href="#" class="active">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a class="" href="#"><i class="icon-arrow-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
@endsection
