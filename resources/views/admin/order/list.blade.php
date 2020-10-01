@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách đơn hàng</h4>
    <a href="{{route('order.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Tổng gía tiền</th>
                <th>Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $key => $list )

                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$list->shipping_name}}</td>
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
    </div>
@endsection
