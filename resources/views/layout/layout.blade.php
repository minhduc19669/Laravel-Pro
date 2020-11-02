

<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Pet Food eCommerce</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link
      rel="shortcut icon"
      type="image/x-icon"
  href="{{asset('assets_page/img/favicon.png')}}"
    />

    <!-- all css here -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('assets_page/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/meanmenu.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_page/css/stylelogin.css')}}">
    <link rel="stylesheet" href="{{asset('assets_page/css/rating.css')}}">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="{{asset('assets_page/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
      <meta name="csrf-token" content="{{ csrf_token() }}" />


  </head>
  <body>
    @include('sweetalert::alert')
<header class="header-area">
      <div class="header-top theme-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
              <div class="welcome-area">
                <p>Chợ của thú cưng!</p>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
              <div class="account-curr-lang-wrap f-right">
                <ul>
                  </li>
                  <li>
                      @if(Session::get('customer'))
                    <a href="#"
                  >
                    {{Session::get('customer')->customer_name}} <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                    <ul>
                      <li>
                        <a href="{{route('page.account',Session::get('customer')->id)}}"
                          >Tài khoản
                        </a>
                      </li>
                      <li>
                        <a href="{{route('home.wishlist')}}"
                          >Yêu thích</a
                        >
                      </li>
                                            <li>
                                            <a href="{{route('change.password')}}"
                          >Đổi mật khẩu</a
                        >
                      </li>
                      <li>
                        <a href="{{route('google_logout')}}"
                          >Đăng xuất
                        </a>
                      </li>
                    </ul>
                    @else
                  <a href="{{route('home.getlogin')}}"
                  >
                    Đăng nhập/Đăng kí</a>
                    @endif
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom transparent-bar">
        <div class="container">
          <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
              <div class="logo pt-39">
              <a href="{{route('home')}}"
                  ><img alt="" src="{{asset('assets_page/img/logo/logo.png')}}"
                /></a>
              </div>
            </div>
            <div class="col-xl-8 col-lg-7 d-none d-lg-block">
              <div class="main-menu text-center">
                <nav>
                  <ul>
                    <li>
                    <a href="{{route('home')}}">Trang chủ</a>
                    </li>
                    <li class="mega-menu-position">
                    <a href="{{route('home.allProduct')}}">Sản phẩm</a>
                        <ul class="mega-menu">
                            @foreach($category as $key => $cate)
                                <li>
                                    <ul>
                                        <li class="mega-menu-title"><a href="#"><b>{{$cate->category_product_name}}</b></a></li>
                                        @foreach($cate -> Subcategories as $cate)
                                            <li><a href="{{route('page.product_subcategory',$cate->sub_id)}}">{{$cate->category_sub_product_name}}</a></li>
                                        @endforeach

                                    </ul>

                                </li>
                            @endforeach
                            <li>
                                <ul>
                                    <li>
                                        <a href="shop-page.html"
                                        ><img
                                                alt=""
                                                src="{{asset('assets_page/img/banner/menu-img-4.jpg')}}"
                                            /></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                    <a href="{{route('page.blog')}}">Tin tức</a>
                        <ul class="submenu">
                            <li>
                            @foreach($category_news as $cate => $value)
                                <li><a href="{{route('page.blogCategory',$value->cate_news_id)}}">{{$value->category_news_name}}</a></li>
                                @endforeach
                            </li>

                        </ul>
                    </li>

                    <li><a href="{{route('page.about')}}">Giới thiệu</a></li>
                    <li><a href="{{route('page.contact')}}">Liên hệ</a></li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7">
              <div class="search-login-cart-wrapper">
                <div class="header-search same-style">
                  <button class="search-toggle">
                    <i class="icon-magnifier s-open"></i>
                    <i class="ti-close s-close"></i>
                  </button>
                  <div class="search-content">
                    <form action="{{route('page.product_search')}}">
                      <input name="key" type="text" placeholder="Search" />
                      <button>
                        <i class="icon-magnifier s-open"></i>
                      </button>
                    </form>
                  </div>
                </div>
                <div class="header-cart same-style">
                  <button class="icon-cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  <span class="count-style" id="countcart">{{$count}}</span>
                  </button>
                  <div class="shopping-cart-content" style="width:500px;">
                    <ul id="cart">
                        @foreach ($data as $item)
                    <li class="single-shopping-cart" id="item_id_{{$item->rowId}}">
                        <div class="shopping-cart-img">
                        <a href="#">
                            <img alt="" src="{{asset('storage/'.$item->options['image'])}}"/>
                        </a>
                        </div>
                        <div  class="shopping-cart-title">
                        <h4><a href="#">{{$item->name}}</a></h4>
                        <h6>Số lượng: {{$item->qty}}</h6>
                        <span>Giá: {{number_format($item->price)}} VNĐ</span>
                        </div>
                        <div id="productcart" class="shopping-cart-delete" style="">
                        <a style="cursor: pointer;" id="deleteitem" item-id="{{$item->rowId}}"><i class="ti-close"></i></a>
                        </div>
                    </li>
                        @endforeach
                    </ul>
                    <div class="shopping-cart-total">
                      <h4>Phí vận chuyển : <span>$20.00</span></h4>
                    <h4>Tổng tiền : <span class="shop-total" id="total" >{{$total}} VNĐ</span></h4>
                    </div>
                    <div class="shopping-cart-btn">
                    <a href="{{route('cart.view')}}">Xem giỏ hàng</a>
                    <a href="{{route('cart.checkout')}}">Thanh toán</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
              <div class="mobile-menu">
                <nav id="mobile-menu-active">
                  <ul class="menu-overflow">
                    <li>
                      <a href="#">Trang chủ</a>

                    </li>
                    <li>
                      <a href="#">pages</a>
                      <ul>
                        <li>
                          <a href="about-us.html">about us</a>
                        </li>
                        <li>
                          <a href="shop-page.html">shop page</a>
                        </li>
                        <li>
                          <a href="shop-list.html">shop list</a>
                        </li>
                        <li>
                          <a href="product-details.html">product details</a>
                        </li>
                        <li>
                          <a href="cart.html">cart page</a>
                        </li>
                        <li>
                          <a href="checkout.html">checkout</a>
                        </li>
                        <li>
                          <a href="wishlist.html">wishlist</a>
                        </li>
                        <li>
                          <a href="contact.html">contact us</a>
                        </li>
                        <li>
                          <a href="my-account.html">my account</a>
                        </li>
                        <li>
                          <a href="login-register.html">login / register</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">Food</a>
                      <ul>
                        <li>
                          <a href="#">Dogs Food</a>
                          <ul>
                            <li>
                              <a href="shop-page.html">Grapes and Raisins</a>
                            </li>
                            <li><a href="shop-page.html">Carrots</a></li>
                            <li><a href="shop-page.html">Peanut Butter</a></li>
                            <li><a href="shop-page.html">Salmon fishs</a></li>
                            <li><a href="shop-page.html">Eggs</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#">Cats Food</a>
                          <ul>
                            <li><a href="shop-page.html">Meat</a></li>
                            <li><a href="shop-page.html">Fish</a></li>
                            <li><a href="shop-page.html">Eggs</a></li>
                            <li><a href="shop-page.html">Veggies</a></li>
                            <li><a href="shop-page.html">Cheese</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#">Fishs Food</a>
                          <ul>
                            <li><a href="shop-page.html">Rice</a></li>
                            <li><a href="shop-page.html">Veggies</a></li>
                            <li><a href="shop-page.html">Cheese</a></li>
                            <li><a href="shop-page.html">wheat bran</a></li>
                            <li><a href="shop-page.html">Cultivation</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">blog</a>
                      <ul>
                        <li>
                          <a href="blog.html">blog page</a>
                        </li>
                        <li>
                          <a href="blog-leftsidebar.html">blog left sidebar</a>
                        </li>
                        <li>
                          <a href="blog-details.html">blog details</a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="contact.html"> Contact us </a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
</header>
<div class="breadcrumb-area pt-95 pb-95 bg-img" style=";background-image:url(@yield('url'));">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>@yield('page_name')</h2>
                    <ul>
                        <li style="color: white">@yield('note1')</li>
                        <li style="color: white" class="active">@yield('note2')</li>
                    </ul>
                </div>
            </div>
</div>
    @yield('content')
    <!-- modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
      >
        <span class="ti-close" aria-hidden="true"></span>
      </button>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="qwick-view-left">
              <div class="quick-view-learg-img">
                <div class="quick-view-tab-content tab-content">
                  <div
                    class="tab-pane active show fade"
                    id="modal1"
                    role="tabpanel"
                  >
                    <img src="{{asset('assets_page/img/quick-view/l1.jpg')}}" alt="" />
                  </div>
                  <div class="tab-pane fade" id="modal2" role="tabpanel">
                    <img src="{{asset('assets_page/img/quick-view/l2.jpg')}}" alt="" />
                  </div>
                  <div class="tab-pane fade" id="modal3" role="tabpanel">
                    <img src="{{asset('assets_page/img/quick-view/l3.jpg')}}" alt="" />
                  </div>
                </div>
              </div>
              <div class="quick-view-list nav" role="tablist">
                <a class="active" href="#modal1" data-toggle="tab">
                  <img src="{{asset('assets_page/img/quick-view/s1.jpg')}}" alt="" />
                </a>
                <a href="#modal2" data-toggle="tab" role="tab">
                  <img src="{{asset('assets_page/img/quick-view/s2.jpg')}}" alt="" />
                </a>
                <a href="#modal3" data-toggle="tab" role="tab">
                  <img src="{{asset('assets_page/img/quick-view/s3.jpg')}}" alt="" />
                </a>
              </div>
            </div>
            <div class="qwick-view-right">
              <div class="qwick-view-content">
                <h3>Dog Calcium Food</h3>
                <div class="product-price">
                  <span>$19.00 </span>
                </div>
                <div class="product-rating">
                  <i class="ion-star theme-color"></i>
                  <i class="ion-star theme-color"></i>
                  <i class="ion-star theme-color"></i>
                  <i class="ion-star theme-color"></i>
                  <i class="ion-star theme-color"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adip elit, sed do amt
                  tempor incididun ut labore et dolore magna aliqua. Ut enim ad
                  mi , quis nostrud veniam exercitation .
                </p>
                <div class="quick-view-select">
                  <div class="select-option-part">
                    <label>Size*</label>
                    <select class="select">
                      <option value="">- Please Select -</option>
                      <option value="">XS</option>
                      <option value="">S</option>
                      <option value="">M</option>
                      <option value="">L</option>
                      <option value="">XL</option>
                      <option value="">XXL</option>
                    </select>
                  </div>
                  <div class="select-option-part">
                    <label>Color*</label>
                    <select class="select">
                      <option value="">- Please Select -</option>
                      <option value="">orange</option>
                      <option value="">pink</option>
                      <option value="">yellow</option>
                    </select>
                  </div>
                </div>
                <div class="quickview-plus-minus">
                  <div class="cart-plus-minus">
                    <input
                      type="text"
                      value="2"
                      name="qtybutton"
                      class="cart-plus-minus-box"
                    />
                  </div>
                  <div class="quickview-btn-cart">
                    <a class="btn-style" href="#">add to cart</a>
                  </div>
                  <div class="quickview-btn-wishlist">
                    <a class="btn-hover" href="#"><i class="ti-heart"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <footer class="footer-area">
      <div class="footer-top pt-80 pb-50 gray-bg-2">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
              <div class="footer-widget mb-30">
                <div class="footer-info-wrapper">
                  <div class="footer-logo">
                    <a href="#">
                      <img src="{{asset('assets_page/img/logo/logo-2.png')}}" alt="" />
                    </a>
                  </div>
                  <p>
                    PetFood là trang mua sắm trực tuyến của cộng đồng yêu thú cưng, nhằm tri ân cộng đồng với những ưu đãi tốt nhất.
                  </p>
                  <div class="social-icon">
                    <ul>
                      <li>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
              <div class="footer-widget mb-30 pl-50">
                <h4 class="footer-title">LIÊN KẾT HỮU ÍCH</h4>
                <div class="footer-content">
                  <ul>
                    <li><a href="{{route('page.contact')}}">Liên hệ và giúp đỡ</a></li>
                    <li><a href="#">Trả hàng và hoàn tiền</a></li>
                    <li><a href="{{route('page.index')}}">Cửa hàng trực tuyến</a></li>
                    <li><a href="#">Điều khoản và Điều kiện</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
              <div class="footer-widget mb-30 pl-70">
                <h4 class="footer-title">GIÚP ĐỠ</h4>
                <div class="footer-content">
                  <ul>
                    <li><a href="#">Faq's </a></li>
                    <li><a href="#">Gói định giá</a></li>
                    <li><a href="#">Đặt hàng theo dõi </a></li>
                    <li><a href="#">Lợi nhuận</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
              <div class="footer-widget">
                <div class="newsletter-wrapper">
                  <p>
                      Đăng ký nhận bản tin của chúng tôi và được giảm giá 10% khi mua hàng đầu tiên ..

                  </p>
                  <div class="newsletter-style">
                    <div id="mc_embed_signup" class="subscribe-form">
                      <form
                        action="{{route('feedback.addSale')}}"
                        method="post"
                        id="mc-embedded-subscribe-form"
                        name="mc-embedded-subscribe-form"
                        class="validate"
                        target="_blank"
                        novalidate
                      >
                          @csrf
                        <div id="mc_embed_signup_scroll" class="mc-form">
                          <input
                            type="email"
                            value=""
                            name="email1"
                            class="email"
                            placeholder="Your mail address"
                            required
                          />
                          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                          <div class="mc-news" aria-hidden="true">
                            <input
                              type="text"
                              name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"
                              tabindex="-1"
                              value=""
                              required
                            />
                          </div>
                          <div class="clear">
                            <input
                              type="submit"
                              value="SEND"
                              name="subscribe"
                              id="mc-embedded-subscribe"
                              class="button"
                            />
                          </div>
                        </div>
                      </form>
                        @if ($errors->has('email1'))
                            <p style="color: red">{{ $errors->first('email1') }}</p>
                        @endif
                    </div>
                  </div>
                </div>
                <div class="payment-img">
                  <a href="index.html">
                    <img src="{{asset('assets_page/img/icon-img/payment.png')}}" alt="" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom gray-bg-3 pt-17 pb-15">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="copyright text-center">
                <p>Copyright © All Right Reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="">$(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
    <!-- all js here -->
    <script src="{{asset('assets_page/js/search_page_product.js')}}"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{asset('assets_page/js/popper.js')}}"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="{{asset('assets_page/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets_page/js/search_page_product.js')}}"></script>
    <script src="{{asset('assets_page/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets_page/js/elevetezoom.js')}}"></script>
    <script src="{{asset('assets_page/js/ajax-mail.js')}}"></script>
    <script src="{{asset('assets_page/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets_page/js/plugins.js')}}"></script>
    <script src="{{asset('assets_page/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets_page/js/addproductcart.js')}}"></script>
    <script src="{{asset('assets_page/js/deleteproductcart.js')}}"></script>
    <script src="{{asset('assets_page/js/rating.js')}}"></script>
    <script src="{{asset('assets_page/js/quickviewcart.js')}}"></script>
    <script src="{{asset('assets_page/js/addproducttocart.js')}}"></script>
    <script src="{{asset('assets_page/js/ajaxcity.js')}}"></script>
    <script src="{{asset('assets_page/js/addproductdetails.js')}}"></script>
    <script src="{{asset('assets_page/js/change-cart.js')}}"></script>
    <script src="{{asset('assets_page/js/addSearchAjax.js')}}"></script>
    <script src="{{asset('assets_page/js/brandProductAddCart.js')}}"></script>
    <script src="{{asset('assets_page/js/subcategoryAddCart.js')}}"></script>
    <script src="{{asset('assets_page/js/numberProduct.js')}}"></script>
    <script src="{{asset('assets_page/js/filterProductPrice.js')}}"></script>






    <script src="{{asset('assets_page/js/comment.js')}}"></script>
<script src="{{asset('assets_page/js/change_qty_product.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $(document).ready(function(){
    $( "#slider-range" ).slider({
      orientation: "horizontal",
      range: true,
      values: [ 17, 100 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ]+"đ"+'-'  +ui.values[ 1 ]+ "đ"  );
      }
    });

    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 )+ "đ" +'-'+ $( "#slider-range" ).slider( "values", 1 )+
      " đ"  );
 });
  </script>

{{-- <script lang="javascript">var __vnp = {code : 3004,key:'', secret : 'be431cde844f943799bf285ddf03546f'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//core.vchat.vn/code/tracking.js';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script> --}}
  </body>
</html>
