@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Chi tiết đơn hàng</h4>
    <br>
    <div class="table-responsive">
        @foreach($order as $key => $list )
            <p> <b>Tên khách hàng</b>  :  {{$list->shipping_name_receive}} </p>
            <p>  <b>Địa chỉ</b>      : {{$list->shipping_address_receive}}</p>
            <p>  <b>Ngày đặt hàng</b>  :   {{$list->created_at}}  </p>
            <p>  <b>Số điện thoại</b> : {{$list->shipping_phone_receive}}</p>
            <p>  <b>Tổng giá tiền</b> : {{$list->order_total}}         </p>

        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Gía sản phẩm</th>
                <th>Số lượng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order_detail as $key => $list )

                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$list->product_name}}</td>
                    <td>{{$list->product_price}}</td>
                    <td>{{$list->product_quantity}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
                <div class="form-group col-md-8">
                    <br>
                <label class="" for="modelName">Trạng thái</label>
                    <br>
                    <form  action="{{route('order.update',$list->order_id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                <select class="custom-select col-md-4" id="inputGroupSelect01" name="order_status">
                        @if($list->order_status == 0)
                    <option selected value="0">Chưa giao </option>
                    <option value="1">Đang giao</option>
                    <option value="2">Đã giao</option>
                    <option value="3">Hủy đơn hàng</option>
                    @elseif($list->order_status == 1)
                        <option  value="0">Chưa giao </option>
                        <option selected value="1">Đang giao</option>
                        <option value="2">Đã giao</option>
                        <option value="3">Hủy đơn hàng</option>
                    @elseif($list->order_status == 2)
                        <option  value="0">Chưa giao </option>
                        <option  value="1">Đang giao</option>
                        <option selected value="2">Đã giao</option>
                        <option value="3">Hủy đơn hàng</option>
                    @else
                        <option  value="0">Chưa giao </option>
                        <option  value="1">Đang giao</option>
                        <option  value="2">Đã giao</option>
                        <option selected value="3">Hủy đơn hàng</option>
                    @endif
                </select>
                    <button type="submit" class="btn-danger col-md-3/2">Submit</button>
                    </form>
                </div>
        @endforeach

    </div>
@endsection
