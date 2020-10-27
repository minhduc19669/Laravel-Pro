@extends('layout.layout')
@section('url','https://petnhatrang.com/wp-content/themes/petshop/images/background-banner.jpg')
@section('content')
<div class="shop-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-img">
                        <img width="200px" height="500px"  src="{{asset('storage/'.$product->product_image)}}" alt=""/>
<div class="mt-12 product-dec-slider owl-carousel">
                        @foreach ($images as $item)
                                    <img width="100px" height="150px" src="{{asset('storage/'.$item->image)}}" alt="">
                        @endforeach</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-content">

                            <h2>Dog Calcium Food</h2>

                        <h2><strong>{{$product->product_name}}</strong></h2>

                            <div class="product-rating">
                                <i class="ti-star theme-color"></i>
                                <i class="ti-star theme-color"></i>
                                <i class="ti-star theme-color"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <span> ( 01 Customer Review )</span>
                            </div>
                            <div>
                            <p><strong>{{$product->brands->brand_name}}</strong></p>
                            </div>
                            <div class="product-price">
                            <span class="new">{{number_format(($product->product_price)-($product->product_price_sale)) }} <u>đ</u> </span>
                            <span class="old">{{ number_format($product->product_price)}} <u>đ</u></span>
                            </div>
                            <div class="sku">
                            <span>Mã sản phẩm : {{$product->product_code}}</span>
                            </div>
                        <p>{{$product->product_content}}</p>
                            <div class="quality-wrapper mt-30 product-quantity">
                                <label>Qty:</label>
                                <div class="">
                                    <input min="1" id="qtyproduct" value="1" class="" type="number" name="qtybutton">
                                </div>
                            </div>
                            <div class="product-list-action">
                                <div class="product-list-action-left">
                                    <a class="addtocart-btn" style="cursor: pointer; color: white" id="addproductdetail" data-id="{{$product->product_id}}" title="Add to cart">
                                        Add to cart
                                    </a>
                                </div>
                                <div class="product-list-action-right">
                                    <a href="#" title="Wishlist">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="social-icon mt-30">
                                <ul>
                                    <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                    <li><a href="#"><i class="icon-social-skype"></i></a></li>
                                    <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-review-area pb-100">
            <div class="container">
                <div class="description-review-wrapper gray-bg pt-40">
                    <div class="description-review-topbar nav text-center">
                        <a class="" data-toggle="tab" href="#des-details1">DESCRIPTION</a>
                        {{-- <a data-toggle="tab" href="#des-details2">MORE INFORMATION</a> --}}
                        <a data-toggle="tab" href="#des-details3">REVIEWS (2)</a>
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="product-description-wrapper">
                                {{$product->product_desc}}
                            </div>
                        </div>
                        {{-- <div id="des-details2" class="tab-pane">
                            <div class="product-anotherinfo-wrapper">
                                <ul>
                                    <li><span>name:</span> Scanpan Classic Covered</li>
                                    <li><span>color:</span> orange , pink , yellow </li>
                                    <li><span>size:</span> xl, l , m , sl</li>
                                    <li><span>length:</span> 102cm, 110cm , 115cm </li>
                                    <li><span>Brand:</span> Nike, Religion, Diesel, Monki </li>
                                </ul>
                            </div>
                        </div> --}}
                        <div id="des-details3" class="tab-pane">
                            <div class="rattings-wrapper" id="rating">
                                @foreach ($post as $item)
                                    <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="product-rating f-left">
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <span>({{$item->rating}})</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                        <h3>{{$item->customer->customer_name}}</h3>
                                        <span>{{$item->created_at->format('d M Y')}}</span>
                                            <span></span>
                                        </div>
                                    </div>
                                <p>{{$item->content}}</p>
                                </div>
                                @endforeach

                            </div>
                            <div class="ratting-form-wrapper">
                                <button style="height: 30px;margin-left: 450px;background-color: red;border-radius:5px; " onclick="displayFormRating()" class="btn-google"><h3 style="margin-top: 7px;color:white">Gửi đánh giá của bạn:</h3></button>
                                <script>
                                    function displayFormRating() {
                                       var hidden = document.getElementById('form-rating');
                                        if (hidden.style.display === 'none') hidden.style.display = 'block';
                                        else hidden.style.display = 'none';
                                    }
                                </script>
                                <div id='form-rating' style="display: none" class="ratting-form">
                                        <div class="star-box">
                                            <h2>Đánh giá:</h2>
                                                <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6 text-center">
                                                    <h1 class="rating-num">
                                                    {{round($avg,2)}}/5</h1>
                                                    <div class="rating">
                                                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                                                        </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                                                        </span><span class="glyphicon glyphicon-star-empty"></span>
                                                    </div>
                                                    <div>
                                                        @if($total!=null)
                                                        <span class="glyphicon glyphicon-user"></span>{{$total}} nhận xét và đánh giá
                                                        @else
                                                        <span class="glyphicon glyphicon-user"></span>0 nhận xét và đánh giá
                                                        @endif
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px" class="col-xs-12 col-md-6">
                                                    <div style="margin-right: 10px" class="row rating-desc">
                                                        @if ($percent)
                                                        @foreach($percent as $key => $value)
                                                            <div class="col-xs-3 col-md-3 text-right">
                                                            <span id="star{{$key}}" class="glyphicon glyphicon-star"></span>{{$key+1}}
                                                        </div>
                                                        <div class="col-xs-8 col-md-9">
                                                            <div class="progress progress-striped">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                            aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%">
                                                                    <span class="sr-only">80%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                            @for($i=1;$i<=5;$i++)
                                                                <div class="col-xs-3 col-md-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>{{$i}}
                                                        </div>
                                                        <div class="col-xs-8 col-md-9">
                                                            <div class="progress progress-striped">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                            aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                                    <span class="sr-only">80%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            @endfor
                                                        @endif

                                                        <!-- end 5 -->

                                                        <!-- end 1 -->
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="card">
                                            <form>
                                            {{ csrf_field() }}
                                            <div class="card-header">
                                                Bạn đánh giá sản phẩm này bao nhiêu sao?
                                                <div class="row">
                                                <div class="col-lg-12">
                                                <div class="star-rating">
                                                    <span class="fa fa-star-o" data-rating="1"></span>
                                                    <span class="fa fa-star-o" data-rating="2"></span>
                                                    <span class="fa fa-star-o" data-rating="3"></span>
                                                    <span class="fa fa-star-o" data-rating="4"></span>
                                                    <span class="fa fa-star-o" data-rating="5"></span>
                                                    <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                                                </div>
                                            <div id="star-error" style="margin-left: 5px" class="row text-danger"></div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <input type="hidden" name="rating" id="rating-input">
                                                <input value="{{$product->product_id}}" type="hidden" name="product_id">
                                                    <textarea id="message" name="message" placeholder="Đánh giá ..."></textarea>
                                                    <div id="message-error" style="margin-left: 5px" class="row text-danger"></div>
                                                    @if (Session::get('customer'))
                                                        <button style="margin-top: 10px" class="btn btn-success btn-submit">Gửi</button>
                                                    @else
                                                        <button onclick="return confirm('Đăng nhập để thực hiện đánh giá!')" style="margin-top: 10px;ma" class="btn btn-success"><a style="color:white;" href="{{route('home.getlogin')}}">Gửi</a></button>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>
                                            </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <div class="related-product-area pt-95 pb-80 gray-bg">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h4>Most Populer</h4>
                    <h2>Related Products</h2>
                </div>
                <div class="related-product-active owl-carousel">
                    @foreach ($productRelated as $item)
                        <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.html">
                            <img src="{{asset('storage/'.$item->product_image)}}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Dog Calcium Food</a></h4>
                            <div class="product-price">
                                <span class="new">$20.00 </span>
                                <span class="old">$50.00</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
    </div>





@endsection
