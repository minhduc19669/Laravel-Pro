
@extends('layout.layout')
@section('url','https://bizweb.dktcdn.net/100/047/359/themes/66510/assets/women_banner.png?1543757106135')
@section('content')
    <div class="shop-area pt-100 pb-100 gray-bg">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="shop-topbar-wrapper">
              <div class="product-sorting-wrapper">
                <div class="product-show shorting-style">
                  <label
                    >Showing <span>1-20</span> of
                    <span>100</span> Results</label
                  >
                  <select>
                    <option value="">12</option>
                    <option value="">24</option>
                    <option value="">36</option>
                  </select>
                </div>
              </div>
              <div class="grid-list-options">
                <ul class="view-mode">
                  <li class="active">
                    <a href="#product-grid" data-view="product-grid"
                      ><i class="ti-layout-grid4-alt"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#product-list" data-view="product-list"
                      ><i class="ti-align-justify"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="grid-list-product-wrapper">
              <div class="product-view product-grid">
                <div class="row">
                    @foreach ($products as $item)
                        <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                    <div id="product5" class="product-wrapper mb-10">
                      <div class="product-img">
                        <a href="{{route('product.details',$item->product_id)}}">
                        <img width="100px" height="230px" src="{{asset('product/'.$item->product_image)}}" alt="" />
                        </a>
                        <div class="product-action">
                          <a id="viewproduct" view-id="{{$item->product_id}}"
                            title="Quick View"
                            data-toggle="modal"
                            data-target="#exampleModal"
                            href="#"
                          >
                            <i class="ti-plus"></i>
                          </a>
                          <a id="addtocart5" buy-id1="{{$item->product_id}}" title="Add To Cart">
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
                        <h4>
                        <a href="{{route('product.details',$item->product_id)}}">{{$item->product_name}}  </a>
                        </h4>
                        <div class="product-price">
                        <span class="new">{{number_format($item->product_price)}}<u>đ</u></span>
                        <span class="old">{{number_format(($item->product_price)-($item->product_price_sale))}}<u>đ</u></span>
                        </div>
                      </div>
                      <div class="product-list-content">
                        <h4><a href="#">{{$item->product_name}} </a></h4>
                        <div class="product-price">
                          <span class="new">{{number_format($item->product_price)}}<u>đ</u> </span>
                        </div>
                        <p>
                          {{$item->product_desc}}
                        </p>
                        <div class="product-list-action">
                          <div class="product-list-action-left">
                            <a
                              class="addtocart-btn"
                              title="Add to cart"
                              href="#"
                              ><i class="ion-bag"></i> Add to cart</a
                            >
                          </div>
                          <div class="product-list-action-right">
                            <a title="Wishlist" href="#"
                              ><i class="ti-heart"></i
                            ></a>
                            <a
                              title="Quick View"
                              data-toggle="modal"
                              data-target="#exampleModal"
                              href="#"
                              ><i class="ti-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    @endforeach

                </div>
                <div class="pagination-style text-center mt-10">
                  <ul>
                    <li>
                      <a href="#"
                        ><i
                          class="fa fa-angle-double-left"
                          aria-hidden="true"
                        ></i
                      ></a>
                    </li>
                    <li>
                      <a href="#">1</a>
                    </li>
                    <li>
                      <a href="#">2</a>
                    </li>
                    <li>
                      <a href="#"
                        ><i
                          class="fa fa-angle-double-right"
                          aria-hidden="true"
                        ></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="shop-sidebar">
              <div class="shop-widget">
                <h4 class="shop-sidebar-title">Tìm kiếm sản phẩm</h4>
                <div class="shop-search mt-25 mb-50">
                  <form class="shop-search-form">
                    <input type="text" placeholder="Nhập" />
                    <button type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </form>
                </div>
              </div>
              <div class="shop-widget">
                <h4 class="shop-sidebar-title">Lọc theo giá</h4>
                <div class="slidecontainer">
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="50"
                    class="slider"
                    id="myRange"
                  />
                </div>
                <div><p id="demo">$</p></div>
              </div>
              <div class="shop-widget mt-50">
                <h4 class="shop-sidebar-title">Danh mục sản phẩm cho chó</h4>
                <div class="shop-list-style mt-20">
                  <ul>
                    <li><a href="#">Canned Food</a></li>
                    <li><a href="#">Dry Food</a></li>
                    <li><a href="#">Food Pouches</a></li>
                    <li><a href="#">Food Toppers</a></li>
                    <li><a href="#">Fresh Food</a></li>
                    <li><a href="#">Frozen Food</a></li>
                  </ul>
                </div>
              </div>
                <div class="shop-widget mt-50">
                <h4 class="shop-sidebar-title">Danh mục sản phẩm cho mèo</h4>
                <div class="shop-list-style mt-20">
                  <ul>
                    <li>
                      <a href="#">Bone Development <span>18</span></a>
                    </li>
                    <li>
                      <a href="#">Digestive Care <span>22</span></a>
                    </li>
                    <li>
                      <a href="#">General Health <span>19</span></a>
                    </li>
                    <li>
                      <a href="#">Hip & Joint <span>41</span></a>
                    </li>
                    <li>
                      <a href="#">Immune System <span>22</span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="shop-widget mt-50">
                <h4 class="shop-sidebar-title">Top Thương Hiệu</h4>
                <div class="shop-list-style mt-20">
                  <ul>
                    <li><a href="#">Authority</a></li>
                    <li><a href="#">AvoDerm Natural</a></li>
                    <li><a href="#">Bil-Jac</a></li>
                    <li><a href="#">Blue Buffalo</a></li>
                    <li><a href="#">Castor & Pollux</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
