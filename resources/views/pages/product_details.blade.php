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
                            <div class="in-stock">
                                @if ($product->product_status==1)
                            <span><i class="ion-android-checkbox-outline"></i> Tình trạng: Còn hàng</span>
                            @else
                            <span><i class="ion-android-checkbox-outline"></i> Tình trạng: Hết hàng</span>
                                @endif
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
                        <a class="active" data-toggle="tab" href="#des-details1">DESCRIPTION</a>
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
                            <div class="rattings-wrapper">
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="product-rating f-left">
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <span>(5)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3>tayeb rayed</h3>
                                            <span>12:24</span>
                                            <span>9 March 2018</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                                </div>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="product-rating f-left">
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star theme-color"></i>
                                            <i class="ti-star"></i>
                                            <span>(4)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3>farhana shuvo</h3>
                                            <span>12:24</span>
                                            <span>9 March 2018</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                                </div>
                            </div>
                            <div class="ratting-form-wrapper">
                                <h3>Add your Comments :</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <h2>Rating:</h2>
                                                <div class="product-rating">
                                                <i class="ti-star theme-color"></i>
                                                <i class="ti-star theme-color"></i>
                                                <i class="ti-star theme-color"></i>
                                                <i class="ti-star"></i>
                                                <i class="ti-star"></i>
                                                <span>(3)</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Email" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="message" placeholder="Message"></textarea>
                                                    <input type="submit" value="add review">
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
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
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
