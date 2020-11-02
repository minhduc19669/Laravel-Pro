@extends('layout.layout')
@section('title','Giỏ hàng của bạn')
@section('url','https://images-na.ssl-images-amazon.com/images/I/71j6Xi6mLSL.jpg')
@section('content')
<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $item)
                                        <tr id="item_id1_{{$item->rowId}}">
                                            <td class="product-thumbnail">
                                            <a href="#"><img width="150px" height="130px" src="{{asset('storage/'.$item->options['image'])}}" alt=""></a>
                                            </td>
                                            <td><a href="#">{{$item->name}}</a></td>
                                            <td style="width: 90px;" ><span style="margin-left: 35px" class="amount">{{number_format($item->price)}} <u>đ</u></span></td>
                                            <td>
                                                <input min="1" row-id="{{$item->rowId}}" style="text-align: center;" class="update" type="number" name="qtybutton" value="{{$item->qty}}">
                                            </td>
                                        <td><span id="price-item{{$item->rowId}}" style="margin-left: 40px;">{{number_format($item->price*$item->qty)}} <u>đ</u></span></td>
                                            <td class="product-remove"><a style="cursor: pointer;" id="deleteitem1" item-id1="{{$item->rowId}}"><i class="ti-close"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                        <a href="{{route('home.allProduct')}}">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                        <a onclick="return confirm('Bạn có chắc chắn không?') "style="cursor: pointer;" href="{{route('delete-all')}}">Xóa giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            {{-- <div class="col-lg-4 col-md-6">
                                <div class="cart-tax">
                                    <h4 class="cart-bottom-title">Estimate Shipping And Tax</h4>
                                    <div class="tax-wrapper">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <div class="tax-select-wrapper">
                                            <div class="tax-select">
                                                <label>
                                                    Country
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    State/Province
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    Zip/Postal Code
                                                </label>
                                                <input type="text" placeholder="1234567">
                                            </div>
                                            <button class="cart-btn-2" type="submit">Get A Quote</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-4 col-md-6">
                                <div class="discount-code-wrapper">
                                    <h4 class="cart-bottom-title">DISCOUNT CODES</h4>
                                    <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form>
                                            <input type="text" required="" name="name">
                                            <button class="cart-btn-2" type="submit">Get A Quote</button>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <h5 id="grand-total">Tổng tiền : {{$total}} <u>đ</u></h5>
                                <a href="{{route('cart.checkout')}}">Tiếp tục thanh toán</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
