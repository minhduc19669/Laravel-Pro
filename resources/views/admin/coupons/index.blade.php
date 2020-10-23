@extends('admin_layout')
@section('admin_content')
                        <div class="row">
                            <div class="col">
                                <div class="card-box">
                                    <h4 class="header-title">Danh sách mã giảm giá</h4>
                                    <p class="sub-header">
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Mã giảm giá</th>
                                                <th>Chiết khấu(%)</th>
                                                <th>Số lượng</th>
                                                <th>Thời gian còn lại</th>
                                                <th>Hành động</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($coupons as $key=> $item)
                                                    <tr>
                                                    <th scope="row">{{++$key}}</th>
                                                    <td>{{$item->coupon_name}}</td>
                                                    <td>{{$item->coupon_code}}</td>
                                                    <td>{{$item->coupon_price}}</td>
                                                    <td>{{$item->coupon_number}}</td>
                                                    <td>{{$item->coupon_time}}</td>
                                                    <td><a style="margin-right: 10px" href="{{route('coupon.edit',$item->id)}}"><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('Bạn có chắc chắn không?')" style="margin-left: 10px" href="{{route('coupon.delete',$item->id)}}"><i class=" ion ion-md-close"></i></a></td>
                                            </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection

