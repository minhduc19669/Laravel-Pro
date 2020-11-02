 @extends('layout.layout')
 @section('title','Blog')
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
                            <a href="{{route('page.blogDetails',$item->news_id)}}"><img alt="" src="{{asset('news/'.$item->news_image)}}"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li>By: <span>Admin</span></li>
                                        <li>{{$item->news_date}}</li>
                                    </ul>
                                </div>
                                <h4><a href="{{route('page.blogDetails',$item->news_id)}}">{{$item->news_title}}</a></h4>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="pagination-style text-center mt-20">
                    <ul>
                        <li>
                            {!! $news->render() !!}

                        </li>

                    </ul>
                </div>
            </div>
        </div>
@endsection
