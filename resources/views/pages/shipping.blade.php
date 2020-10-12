@extends('layout.layout')
@section('url','https://images-na.ssl-images-amazon.com/images/I/71GiSOhBeEL.jpg')
@section('content')
<div class="checkout-area pt-95 pb-70">
            <div class="container">
                <h3 class="page-title">Thông tin giao hàng</h3>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="checkout-wrapper">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">Thông tin giao hàng</a></h5>
                                    </div>

                                </div>
                            <div id="faq" class="panel-group">
                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input type="radio" name="address" value="address" checked="">
                                                        <label>Thanh toán khi giao hàng</label>
                                                    </div>
                                                    <div class="single-ship">
                                                        <input type="radio" name="address" value="dadress">
                                                        <label>Chuyển khoản qua ngân hàng
                                 </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-btn">
                                                        <button type="submit">Tiếp tục đến phương thức thanh toán</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-5">payment information</a></h5>
                                    </div>
                                    <div id="payment-5" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="payment-info-wrapper">
                                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input type="radio" checked="" value="address" name="address">
                                                        <label>Check / Money order </label>
                                                    </div>
                                                    <div class="single-ship">
                                                        <input type="radio" value="dadress" name="address">
                                                        <label>Credit Card (saved) </label>
                                                    </div>
                                                </div>
                                                <div class="payment-info">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Name on Card </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-select card-mrg">
                                                                <label>Credit Card Type</label>
                                                                <select>
                                                                    <option>American Express</option>
                                                                    <option>Visa</option>
                                                                    <option>MasterCard</option>
                                                                    <option>Discover</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Credit Card Number </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="expiration-date">
                                                        <label>Expiration Date </label>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="billing-select month-mrg">
                                                                    <select>
                                                                        <option>Month</option>
                                                                        <option>January</option>
                                                                        <option>February</option>
                                                                        <option> March</option>
                                                                        <option>April</option>
                                                                        <option> May</option>
                                                                        <option>June</option>
                                                                        <option>July</option>
                                                                        <option>August</option>
                                                                        <option>September</option>
                                                                        <option> October</option>
                                                                        <option> November</option>
                                                                        <option> December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="billing-select">
                                                                    <select>
                                                                        <option>Year</option>
                                                                        <option>2015</option>
                                                                        <option>2016</option>
                                                                        <option>2017</option>
                                                                        <option>2018</option>
                                                                        <option>2019</option>
                                                                        <option>2020</option>
                                                                        <option>2021</option>
                                                                        <option>2022</option>
                                                                        <option>2023</option>
                                                                        <option>2024</option>
                                                                        <option>2025</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Card Verification Number</label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ti-arrow-up"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">Order Review</a></h5>
                                    </div>
                                    <div id="payment-6" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="order-review-wrapper">
                                                <div class="order-review">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="width-1">Product Name</th>
                                                                    <th class="width-2">Price</th>
                                                                    <th class="width-3">Qty</th>
                                                                    <th class="width-4">Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="o-pro-dec">
                                                                            <p>Fusce aliquam</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-price">
                                                                            <p>$236.00</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-qty">
                                                                            <p>2</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-subtotal">
                                                                            <p>$236.00</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="o-pro-dec">
                                                                            <p>Primis in faucibus</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-price">
                                                                            <p>$265.00</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-qty">
                                                                            <p>3</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-subtotal">
                                                                            <p>$265.00</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="o-pro-dec">
                                                                            <p>Etiam gravida</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-price">
                                                                            <p>$363.00</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-qty">
                                                                            <p>2</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-subtotal">
                                                                            <p>$363.00</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="o-pro-dec">
                                                                            <p>Quisque in arcu</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-price">
                                                                            <p>$328.00</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-qty">
                                                                            <p>2</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-subtotal">
                                                                            <p>$328.00</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="3">Subtotal </td>
                                                                    <td colspan="1">$4,001.00</td>
                                                                </tr>
                                                                <tr class="tr-f">
                                                                    <td colspan="3">Shipping & Handling (Flat Rate - Fixed</td>
                                                                    <td colspan="1">$45.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">Grand Total</td>
                                                                    <td colspan="1">$4,722.00</td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <span>
                                                            Forgot an Item?
                                                            <a href="#"> Edit Your Cart.</a>

                                                        </span>
                                                        <div class="billing-btn">
                                                            <button type="submit">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
