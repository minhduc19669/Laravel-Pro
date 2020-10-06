@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh mục</h4>
    <a href="{{route('shipping.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên người gửi</th>
                <th>Số điện thoại người gửi</th>
                <th>Địa chỉ người gửi</th>
                <th>Email người gửi</th>
                <th>Tên người nhận</th>
                <th>Số điện thoại người nhận</th>
                <th>Địa chỉ người nhận</th>
                <th>Thông tin giao hàng</th>
                <th>Ghi chú</th>
                <th>Phương thức thanh toán</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shipping as $key => $list )

                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$list->shipping_name}}</td>
                    <td>{{$list->shipping_phone}}</td>
                    <td>{{$list->shipping_address}}</td>
                    <td>{{$list->shipping_email}}</td>
                    <td>{{$list->shipping_name_receive}}</td>
                    <td>{{$list->shipping_phone_receive}}</td>
                    <td>{{$list->shipping_address_receive}}</td>
                        @if($list->shipping_information == 0)
                            <td>Giao hàng tới khác địa chỉ </td>
                    @else
                            <td>Giao hàng tới cùng địa chỉ</td>
                    @endif


                    <td>{{$list->shipping_node}}</td>
                        @if($list ->shipping_payment == 1)
                            <td>Thanh toán khi nhận hàng</td>
                        @endif

                                        <td><a style="margin-right: 10px" href={{route('shipping.edit',$list->id)}}    ><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('Bạn có thật sự muốn xóa không?')" style="margin-left: 10px" href="{{route('shipping.remove',$list->id)}}"><i class=" ion ion-md-close"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
