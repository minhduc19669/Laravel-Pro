@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách khách hàng</h4>
    <a href="{{route('customer.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Ảnh đại diện</th>
                <th>Email</th>
                <th>Số điện thoại
                <th>Địa chỉ</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer as $key => $customer )
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td style="margin-top: 10px">{{$customer->customer_name}}</td>
                    <td> @if($customer->customer_avatar)
                            <img src="\custom\.{{$customer->customer_avatar}}" id="imgProfile"
                                 style="width: 100px; height: 100px" class="img-thumbnail"/>
                        @else
                            <img src="http://placehold.it/150x150" id="imgProfile"
                                 style="width: 100px; height: 100px" class="img-thumbnail"/>
                        @endif</td>
                    <td>{{$customer->customer_email}}</td>
                    <td>{{$customer->customer_phone}}</td>
                    <td>{{$customer->customer_address}}</td>


                    <td><a style="margin-right: 10px" href="{{route('customer.edit',$customer->id)}}"><i class=" ion ion-md-color-filter"></i></a>|
                            <a  onclick="return confirm('Bạn có chắc chắn không?')" style="margin-left: 10px" href="{{route('customer.remove',$customer->id)}}"><i class=" ion ion-md-close"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
