


<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>ĐỨC MINH - Pet Food eCommerce</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link
      rel="shortcut icon"
      type="image/x-icon"
  href="{{asset('assets_page/img/favicon.png')}}"
    />

    <!-- all css here -->
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


  <script src="{{asset('assets_page/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
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
                    {{Session::get('customer')['name']}} <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                    <ul>
                      <li>
                        <a href="#"
                          >Tài khoản
                        </a>
                      </li>
                      <li>
                        <a href="#"
                          >Các địa chỉ</a
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
                <a href="index.html"
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
                      <a href="shop-page.html">Danh mục</a>
                      <ul class="mega-menu">
                        <li>
                          <ul>
                            <li class="mega-menu-title">Dogs Food</li>
                            <li><a href="shop-page.html">Eggs</a></li>
                            <li><a href="shop-page.html">Carrots</a></li>
                            <li><a href="shop-page.html">Salmon fishs</a></li>
                            <li><a href="shop-page.html">Peanut Butter</a></li>
                            <li>
                              <a href="shop-page.html">Grapes & Raisins</a>
                            </li>
                          </ul>
                        </li>
                        <li>
                          <ul>
                            <li class="mega-menu-title">Cats Food</li>
                            <li><a href="shop-page.html">Meat</a></li>
                            <li><a href="shop-page.html">Fish</a></li>
                            <li><a href="shop-page.html">Eggs</a></li>
                            <li><a href="shop-page.html">Veggies</a></li>
                            <li><a href="shop-page.html">Cheese</a></li>
                          </ul>
                        </li>

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
                      <a href="#">Sản phẩm</a>
                    </li>
                    <li>
                      <a href="blog-leftsidebar.html">Blog</a>
                    </li>
                    <li><a href="#">ABOUT US</a></li>
                    <li><a href="#">CONTACT US</a></li>
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
                    <form action="#">
                      <input type="text" placeholder="Search" />
                      <button>
                        <i class="icon-magnifier s-open"></i>
                      </button>
                    </form>
                  </div>
                </div>

                <div class="header-cart same-style">
                  <button class="icon-cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="count-style">02</span>
                  </button>
                  <div class="shopping-cart-content">
                    <ul>
                      <li class="single-shopping-cart">
                        <div class="shopping-cart-img">
                          <a href="#"
                            ><img alt="" src="{{asset('assets_page/img/cart/cart-1.jpg')}}"
                          /></a>
                        </div>
                        <div class="shopping-cart-title">
                          <h4><a href="#">Dog Calcium Food </a></h4>
                          <h6>Qty: 02</h6>
                          <span>$260.00</span>
                        </div>
                        <div class="shopping-cart-delete">
                          <a href="#"><i class="ti-close"></i></a>
                        </div>
                      </li>
                      <li class="single-shopping-cart">
                        <div class="shopping-cart-img">
                          <a href="#"
                            ><img alt="" src="{{asset('assets_page/img/cart/cart-2.jpg')}}"
                          /></a>
                        </div>
                        <div class="shopping-cart-title">
                          <h4><a href="#">Dog Calcium Food</a></h4>
                          <h6>Qty: 02</h6>
                          <span>$260.00</span>
                        </div>
                        <div class="shopping-cart-delete">
                          <a href="#"><i class="ti-close"></i></a>
                        </div>
                      </li>
                    </ul>
                    <div class="shopping-cart-total">
                      <h4>Shipping : <span>$20.00</span></h4>
                      <h4>Total : <span class="shop-total">$260.00</span></h4>
                    </div>
                    <div class="shopping-cart-btn">
                      <a href="cart.html">view cart</a>
                      <a href="checkout.html">checkout</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none"
            >
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
    <div class="slider-area">
      <div class="slider-active owl-dot-style owl-carousel">
        <div
          class="single-slider pt-215 pb-228 bg-img"
          style="background-image: url(assets_page/img/slider/slider-2.jpg)"
        >
          <div class="container">
            <div
              class="slider-content slider-content-white slider-animated-2 text-center"
            >
              <h3 class="animated">We keep pets for pleasure.</h3>
              <h1 class="animated">
                Standard Food & Vitamins <br />For all Pets
              </h1>
              <div class="slider-btn">
                <a class="animated" href="product-details.html">SHOP NOW</a>
              </div>
            </div>
          </div>
        </div>
        <div
          class="single-slider pt-215 pb-228 bg-img"
          style="background-image: url(assets_page/img/slider/slider-3.jpg)"
        >
          <div class="container">
            <div
              class="slider-content slider-content-white slider-animated-2 text-center"
            >
              <h3 class="animated">We keep pets for pleasure.</h3>
              <h1 class="animated">
                Standard Food & Vitamins <br />For all Pets
              </h1>
              <div class="slider-btn">
                <a class="animated" href="product-details.html">SHOP NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="food-category pt-100 pb-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="single-food-category-2 text-center mb-30">
              <div class="single-food-hover">
              <img src="{{asset('assets_page/img/product/food-catigory-1.png')}}" alt="" />
              </div>
              <h3>Dogs Food</h3>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="single-food-category-2 text-center mb-30">
              <div class="single-food-hover">
              <img src="{{asset('assets_page/img/product/food-catigory-2.png')}}" alt="" />
              </div>
              <h3>Cats Food</h3>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="product-area pt-95 pb-70 gray-bg">
      <div class="container">
        <div class="section-title text-center mb-55">
          <h4>SẢN PHẨM MỚI NHẤT</h4>

        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
              <div class="product-img">
                <a href="product-details.html">
                <img src="{{asset('assets_page/img/product/product-4.jpg')}}" alt="" />
                </a>
                <div class="product-action">
                  <a
                    title="Quick View"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    href="#"
                  >
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
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
              <div class="product-img">
                <a href="product-details.html">
                <img src="{{asset('assets_page/img/product/product-5.jpg')}}" alt="" />
                </a>
                <div class="product-action">
                  <a
                    title="Quick View"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    href="#"
                  >
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
                <h4><a href="product-details.html">Cat Buffalo Food</a></h4>
                <div class="product-price">
                  <span class="new">$22.00 </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
              <div class="product-img">
                <a href="product-details.html">
                  <img src="{{asset('assets_page/img/product/product-6.jpg')}}" alt="" />
                </a>
                <div class="product-action">
                  <a
                    title="Quick View"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    href="#"
                  >
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
                <h4><a href="product-details.html">Legacy Dog Food</a></h4>
                <div class="product-price">
                  <span class="new">$50.00 </span>
                  <span class="old">$70.00</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
              <div class="product-img">
                <a href="product-details.html">
                  <img src="{{asset('assets_page/img/product/product-7.jpg')}}" alt="" />
                </a>
                <div class="product-action">
                  <a
                    title="Quick View"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    href="#"
                  >
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
                <h4><a href="product-details.html">Chicken Dry Cat Food</a></h4>
                <div class="product-price">
                  <span class="new">$60.00 </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
              <div class="product-img">
                <a href="product-details.html">
                  <img src="{{asset('assets_page/img/product/product-8.jpg')}}" alt="" />
                </a>
                <div class="product-action">
                  <a
                    title="Quick View"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    href="#"
                  >
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
                <h4><a href="product-details.html">Stomach Dog Food</a></h4>
                <div class="product-price">
                  <span class="new">$70.00 </span>
                  <span class="old">$90.00</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
              <div class="product-img">
                <a href="product-details.html">
                  <img src="{{asset('assets_page/img/product/product-9.jpg')}}" alt="" />
                </a>
                <div class="product-action">
                  <a
                    title="Quick View"_page
                    data-toggle="modal"
                    data-target="#exampleModal"
                    href="#"
                  >
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
                <h4><a href="product-details.html">Nourish Puppy Food</a></h4>
                <div class="product-price">
                  <span class="new">$80.00 </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
              <div class="product-img">
                <a href="product-details.html">
                  <img src="{{asset('assets_page/img/product/product-10.jpg')}}" alt="" />
                </a>
                <div class="product-action">
                  <a
                    title="Quick View"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    href="#"
                  >
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
                <h4><a href="product-details.html">Tarpaulin Dog Food</a></h4>
                <div class="product-price">
                  <span class="new">$10.00 </span>
                  <span class="old">$30.00</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
              <div class="product-img">
                <a href="product-details.html">
                  <img src="{{asset('assets_page/img/product/product-11.jpg')}}" alt="" />
                </a>
                <div class="product-action">
                  <a
                    title="Quick View"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    href="#"
                  >
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
                  <span class="new">$22.00 </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="testimonial-area pt-90 pb-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 ml-auto mr-auto">
            <div class="testimonial-wrap testimonial-white-color">
              <div class="testimonial-text-slider text-center">
                <div class="sin-testiText">
                  <p>
                    Lorem ipsum dolor sit amet, co adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercita ullamco
                    laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="sin-testiText">
                  <p>
                    There are many variations of passages of Lorem Ipsum
                    available, but the majority have suffered alteration in some
                    form, by injected humour, or amro porano ja cai tomi tai go
                    amro porano amro porano ja cai tomi tai go ....
                  </p>
                </div>
                <div class="sin-testiText">
                  <p>
                    Lorem ipsum dolor sit amet, co adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercita ullamco
                    laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="sin-testiText">
                  <p>
                    There are many variations of passages of Lorem Ipsum
                    available, but the majority have suffered alteration in some
                    form, by injected humour, or amro porano ja cai tomi tai go
                    amro porano amro porano ja cai tomi tai go ....
                  </p>
                </div>
              </div>
              <div class="testimonial-image-slider text-center">
                <div class="sin-testiImage">
                  <img src="{{asset('assets_page/img/testi/3.jpg')}}" alt="" />
                  <h3>Robiul Islam</h3>
                  <h5>Customer</h5>
                </div>
                <div class="sin-testiImage">
                  <img src="{{asset('assets_page/img/testi/4.jpg')}}" alt="" />
                  <h3>Robiul Islam</h3>
                  <h5>Customer</h5>
                </div>
                <div class="sin-testiImage">
                  <img src="{{asset('assets_page/img/testi/3.jpg')}}" alt="" />
                  <h3>F. H. Shuvo</h3>
                  <h5>Developer</h5>
                </div>
                <div class="sin-testiImage">
                  <img src="{{asset('assets_page/img/testi/5.jpg')}}" alt="" />
                  <h3>T. T. Rayed</h3>
                  <h5>CEO</h5>
                </div>
              </div>
              <div class="testimonial-shap">
                <img src="{{asset('assets_page/img/icon-img/testi-shap-2.png')}}" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="deal-area bg-img deal-style-white pt-95 pb-100 bg-img"
      style="background-image: url(assets_page/img/banner/banner-2.jpg)"
    >
      <div class="container">
        <div class="section-title section-title-white text-center mb-50">
          <h4>Best Product</h4>
          <h2>Deal of the Week</h2>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="deal-img wow fadeInLeft">
              <a href="#"
                ><img src="{{asset('assets_page/img/banner/banner-4.png')}}" alt=""
              /></a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="deal-content">
              <h3><a href="#">Name Your Product</a></h3>
              <div class="deal-pro-price">
                <span class="deal-old-price">$16.00 </span>
                <span> $10.00</span>
              </div>
              <p>
                Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod
                tempor labore incididunt et dolore magna aliqua. Ut enim ad
                minim veniam, quis nostrud nisi exercita ullamco laboris ut
                aliquip ex ea commodo ullamco laboris nisi ut aliquip ex ea
                commodo consequat aute irure dolor in reprehendrit.
              </p>
              <div class="timer timer-style">
                <div data-countdown="2019/10/01"></div>
              </div>
              <div class="discount-btn mt-35">
                <a class="btn-style" href="#">SHOP NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="service-area bg-img pt-100 pb-65">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="service-content text-center mb-30 service-color-1">
              <img src="{{asset('assets_page/img/icon-img/shipping.png')}}" alt="" />
              <h4>FREE SHIPPING</h4>
              <p>Free shipping on all order</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="service-content text-center mb-30 service-color-2">
              <img src="{{asset('assets_page/img/icon-img/support.png')}}" alt="" />
              <h4>ONLINE SUPPORT</h4>
              <p>Online support 24 hours a day</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="service-content text-center mb-30 service-color-3">
              <img src="{{asset('assets_page/img/icon-img/money.png')}}" alt="" />
              <h4>MONEY RETURN</h4>
              <p>Back guarantee under 5 days</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="blog-area pb-70">
      <div class="container">
        <div class="section-title text-center mb-60">
          <h4>Latest News</h4>
          <h2>From Our Blog</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="blog-wrapper mb-30 gray-bg">
              <div class="blog-img hover-effect">
                <a href="blog-details.html"
                  ><img alt="" src="{{asset('assets_page/img/blog/blog-1.jpg')}}"
                /></a>
              </div>
              <div class="blog-content">
                <div class="blog-meta">
                  <ul>
                    <li>By: <span>Admin</span></li>
                    <li>Sep 14, 2018</li>
                  </ul>
                </div>
                <h4>
                  <a href="blog-details.html"
                    >Lorem ipsum dolor amet cons adipisicing elit</a
                  >
                </h4>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="blog-wrapper mb-30 gray-bg">
              <div class="blog-img hover-effect">
                <a href="blog-details.html"
                  ><img alt="" src="{{asset('assets_page/img/blog/blog-2.jpg')}}"
                /></a>
              </div>
              <div class="blog-content">
                <div class="blog-meta">
                  <ul>
                    <li>By: <span>Admin</span></li>
                    <li>Sep 14, 2018</li>
                  </ul>
                </div>
                <h4>
                  <a href="blog-details.html"
                    >Lorem ipsum dolor amet cons adipisicing elit</a
                  >
                </h4>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="blog-wrapper mb-30 gray-bg">
              <div class="blog-img hover-effect">
                <a href="blog-details.html"
                  ><img alt="" src="{{asset('assets_page/img/blog/blog-3.jpg')}}"
                /></a>
              </div>
              <div class="blog-content">
                <div class="blog-meta">
                  <ul>
                    <li>By: <span>Admin</span></li>
                    <li>Sep 14, 2018</li>
                  </ul>
                </div>
                <h4>
                  <a href="blog-details.html"
                    >Lorem ipsum dolor amet cons adipisicing elit</a
                  >
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
                    Lorem ipsum dolor sit amet, co adipisi elit, sed eiusmod
                    tempor incididunt ut labore et dolore
                  </p>
                  <div class="social-icon">
                    <ul>
                      <li>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
              <div class="footer-widget mb-30 pl-50">
                <h4 class="footer-title">USEFUL LINKS</h4>
                <div class="footer-content">
                  <ul>
                    <li><a href="#">Help & Contact Us</a></li>
                    <li><a href="#">Returns & Refunds</a></li>
                    <li><a href="#">Online Stores</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
              <div class="footer-widget mb-30 pl-70">
                <h4 class="footer-title">HELP</h4>
                <div class="footer-content">
                  <ul>
                    <li><a href="#">Faq's </a></li>
                    <li><a href="#">Pricing Plans</a></li>
                    <li><a href="#">Order Traking</a></li>
                    <li><a href="#">Returns </a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
              <div class="footer-widget">
                <div class="newsletter-wrapper">
                  <p>
                    Subscribe to our newsletter and get 10% off your first
                    purchase..
                  </p>
                  <div class="newsletter-style">
                    <div id="mc_embed_signup" class="subscribe-form">
                      <form
                        action="#"
                        method="post"
                        id="mc-embedded-subscribe-form"
                        name="mc-embedded-subscribe-form"
                        class="validate"
                        target="_blank"
                        novalidate
                      >
                        <div id="mc_embed_signup_scroll" class="mc-form">
                          <input
                            type="email"
                            value=""
                            name="EMAIL"
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
                <p>Copyright © <a href="#">Marten.</a> All Right Reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script>
      var slider = document.getElementById("myRange");
      var output = document.getElementById("demo");
      output.innerHTML = slider.value + "$"; // Display the default slider value

      // Update the current slider value (each time you drag the slider handle)
      slider.oninput = function () {
        output.innerHTML = this.value + "$";
      };
    </script>

    <!-- all js here -->
    <script src="{{asset('assets_page/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('assets_page/js/popper.js')}}"></script>
    <script src="{{asset('assets_page/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets_page/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets_page/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets_page/js/elevetezoom.js')}}"></script>
    <script src="{{asset('assets_page/js/ajax-mail.js')}}"></script>
    <script src="{{asset('assets_page/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets_page/js/plugins.js')}}"></script>
    <script src="{{asset('assets_page/js/main.js')}}"></script>
  </body>
</html>



    <!-- all js here -->
