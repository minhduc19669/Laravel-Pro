
@extends('layout.layout')
@section('url','https://bizweb.dktcdn.net/100/047/359/themes/66510/assets/women_banner.png?1543757106135')
@section('content')
    <div id="manh" class="shop-area pt-100 pb-100 gray-bg">
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
            <div id="product" class="grid-list-product-wrapper">
              <div class="product-view product-grid">
                <div id="search_product_ajax" class="row">


                    @foreach ($products as $item)
                <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                    <div id="product5" class="product-wrapper mb-10">
                      <div class="product-img">
                        <a href="{{route('product.details',$item->product_id)}}">
                        <img width="100px" height="230px" src="{{asset('storage/'.$item->product_image)}}" alt=""/>
                        </a>
                        <div class="product-action">
                          <a style="cursor: pointer;" id="addtocart5" buy-id1="{{$item->product_id}}" title="Add To Cart">
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
                                id="addtocart5" buy-id1="{{$item->product_id}}"
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
                              data-toggle=odal"
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
                    {!! $products->render() !!}
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
                    <input name="search_product" id="search_product" type="text" placeholder="Nhập" />
                    <button disabled          type="submit">
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
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
