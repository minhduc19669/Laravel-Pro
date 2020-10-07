@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Chi tiết đơn hàng</h4>
    <br>
    <div class="table-responsive">
        @foreach($order as $key => $list )
            <p> Tên khách hàng  :  {{$list->shipping_name_receive}} </p>
            <p>  Địa chỉ        : {{$list->shipping_address_receive}}</p>
            <p>  Ngày đặt hàng  :   {{$list->created_at}}  </p>
            <p>  Số điện thoại : {{$list->shipping_phone_receive}}</p>
            <p>  Tổng giá tiền : {{$list->order_total}}         </p>

        @endforeach
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Ngày đặt hàng</th>
                <th>Email</th>
                <th>Tổng gía tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order_detail as $key => $list )

                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td></td>
                    <td>{{$list->product_id}}</td>
                    <td>{{$list->created_at}}</td>
                    <td>{{$list->shipping_email}}</td>
                    <td>{{$list->order_total}}</td>
                    @if($list->order_status==0)
                        <td>Chưa giao</td>
                    @elseif($list->order_status==1)
                        <td>Đang giao</td>
                    @elseif($list->order_status==2)
                        <td>Giao thành công</td>
                    @else
                        <td>Hủy đơn hàng</td>
                    @endif
                    <td><a style="margin-right: 10px" href={{route('order.edit',$list->order_id)}}    ><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('bạn có thật sự muốn xóa không?')" style="margin-left: 10px" href="{{route('order.remove',$list->order_id)}}"><i class=" ion ion-md-close"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <div class="form-group col-md-4">
                <label for="modelName">Trạng thái</label>
                <select class="custom-select" id="inputGroupSelect01" name="order_status">
                    <option value="0">Chưa giao </option>
                    <option value="1">Đang giao</option>
                    <option value="2">Đã giao</option>
                    <option value="3">Hủy đơn hàng</option>
                </select>

            </div>
    </div>
@endsection
