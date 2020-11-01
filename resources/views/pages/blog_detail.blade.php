
@extends('layout.layout')
@section('url','https://petnhatrang.com/wp-content/themes/petshop/images/background-banner.jpg')
@section('content')
<div class="shop-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    @foreach($news as $key => $news)
                    <div class="col-lg-9 col-md-8">
                        <div class="blog-details-wrapper res-mrg-top">
                            <div class="single-blog-wrapper">
                                <div class="blog-img mb-30">
                                    <img src="\news\{{$news->news_image}}" alt="">
                                </div>
                                <div class="blog-details-content">
                                    <h2>{{$news->news_title}}</h2>
                                    <div class="blog-meta">
                                        <ul>
                                            <li>{{$news->news_date}} </li>
                                            <li>
                                                <a href="#"> 02 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               {{$news->news_content}}
                                <div class="dec-img-wrapper">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="dec-img">
                                                <img src="assets/img/blog/blog-dec-img1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="dec-img dec-mrg res-mrg-top-2">
                                                <img src="assets/img/blog/blog-dec-img2.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-dec-tags-social">
                                    <div class="blog-dec-tags">
                                        <ul>
                                            <li><a href="#">Dog</a></li>
                                            <li><a href="#">Cat</a></li>
                                            <li><a href="#">Fish</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog-dec-social">
                                        <span>share :</span>
                                        <ul>
                                            <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                            <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                            <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-lg-3 col-md-4">
                        <div class="shop-sidebar blog-mrg">

                            @foreach($category as $key => $category)
                                <div class="shop-widget mt-50">
                                    <h4 class="shop-sidebar-title">{{$category->category_product_name}}</h4>
                                    <div class="shop-list-style mt-20">
                                        <ul>
                                            @foreach($category->SubCategories as $subcategory)
                                                <li><a href="{{route('page.product_subcategory',$subcategory->sub_id)}}">{{$subcategory->category_sub_product_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>


                            @endforeach
                            <div class="shop-widget mt-50">
                                <h4 class="shop-sidebar-title">Top Thương Hiệu</h4>
                                <div class="shop-list-style mt-20">
                                    <ul>
                                        @foreach($brand as $key => $brand)
                                            <li><a href="{{route('page.product_brand',$brand->id)}}">{{$brand->brand_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
{{--                            <div class="shop-widget mt-50">--}}
{{--                                <h4 class="shop-sidebar-title">Tags </h4>--}}
{{--                                 <div class="shop-list-style mt-20">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Food </a></li>--}}
{{--                                        <li><a href="#">Fish </a></li>--}}
{{--                                        <li><a href="#">Dog </a></li>--}}
{{--                                        <li><a href="#">Cat  </a></li>--}}
{{--                                        <li><a href="#">Pet </a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="shop-widget mt-50">
                                <h4 class="shop-sidebar-title">Danh mục tin tức</h4>
                                 <div class="shop-list-style mt-20">
                                    <ul>
                                        @foreach($cate_news as $key => $category)
                                        <li><a href="#">{{$category->category_news_name}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                            <div class="shop-widget mt-50">
                                <h4 class="shop-sidebar-title">Tin tức liên quan</h4>
                                @foreach($related as $key => $item)

                                <div class="recent-post-wrapper mt-25">
                                    <div class="single-recent-post mb-20">
                                        <div class="recent-post-img">
                                            <a href="#"><img src="\news\{{$item->news_image}}" alt=""></a>
                                        </div>
                                        <div class="recent-post-content">
                                            <h4><a href="{{route('page.blogDetails',$item->news_id)}}">{{$item->news_title}}</a></h4>
                                            <span>{{$item->news_date}} </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
