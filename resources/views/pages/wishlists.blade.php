@extends('layout.layout')
@section('url','https://petnhatrang.com/wp-content/themes/petshop/images/background-banner.jpg')
@section('content')
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <h3 class="page-title">Sản phẩm yêu thích</h3>
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
                                    <th>Thêm vào giỏ hàng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/cart/cart-3.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">Dry Dog Food</a></td>
                                    <td class="product-price-cart"><span class="amount">$110.00</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                            <div class="inc qtybutton">+</div></div>
                                    </td>
                                    <td class="product-subtotal">$110.00</td>
                                    <td class="product-wishlist-cart">
                                        <a href="#">add to cart</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/cart/cart-4.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">Cat Buffalo Food</a></td>
                                    <td class="product-price-cart"><span class="amount">$150.00</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                            <div class="inc qtybutton">+</div></div>
                                    </td>
                                    <td class="product-subtotal">$150.00</td>
                                    <td class="product-wishlist-cart">
                                        <a href="#">add to cart</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/cart/cart-5.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">Legacy Dog Food</a></td>
                                    <td class="product-price-cart"><span class="amount">$170.00</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                            <div class="inc qtybutton">+</div></div>
                                    </td>
                                    <td class="product-subtotal">$170.00</td>
                                    <td class="product-wishlist-cart">
                                        <a href="#">add to cart</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
