
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
                            <div class="blog-comment-wrapper mt-55">
                                <h4 class="blog-dec-title">comments : 02</h4>
                                <div class="single-comment-wrapper mt-35">
                                    <div class="blog-comment-img">
                                        <img src="assets/img/blog/blog-comment1.png" alt="">
                                    </div>
                                    <div class="blog-comment-content">
                                        <h4>Anthony Stephens</h4>
                                        <span>October 14, 2018 </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor magna aliqua. Ut enim ad minim veniam, </p>
                                        <div class="blog-details-btn">
                                            <a href="blog-details.html">read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-comment-wrapper mt-50 ml-125">
                                    <div class="blog-comment-img">
                                        <img src="assets/img/blog/blog-comment2.png" alt="">
                                    </div>
                                    <div class="blog-comment-content">
                                        <h4>Anthony Stephens</h4>
                                        <span>October 14, 2018 </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor magna aliqua. Ut enim ad minim veniam, </p>
                                        <div class="blog-details-btn">
                                            <a href="blog-details.html">read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-reply-wrapper mt-50">
                                <h4 class="blog-dec-title">post a comment</h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="leave-form">
                                                <input type="text" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="leave-form">
                                                <input type="email" placeholder="Eail Address ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-leave">
                                                <textarea placeholder="Massage"></textarea>
                                                <input type="submit" value="SEND MASSAGE">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-lg-3 col-md-4">
                        <div class="shop-sidebar blog-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Search Products</h4>
                                <div class="shop-search mt-25 mb-50">
                                    <form class="shop-search-form">
                                        <input type="text" placeholder="Find a product">
                                        <button type="submit">
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
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

                            @foreach($related as $key => $item)
                            <div class="shop-widget mt-50">
                                <h4 class="shop-sidebar-title">Tin tức liên quan</h4>
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
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
