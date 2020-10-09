@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách sản phẩm</h4>
    <a href="{{route('product.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Mã </th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Danh mục con</th>
                <th>Thương hiệu</th>
                <th>Chi tiết</th>
                <th>Giá </th>
                <th>Giá khuyến mãi </th>
                <th>Ảnh </th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $key => $product )
                <tr>
                    <td style="font-size: 10px"  scope="row">{{$key + 1}}</td>
                    <td style="font-size: 10px">{{$product->product_code}}</td>
                    <td style="font-size: 10px">{{$product->product_name}}</td>
                    <td style="font-size: 10px">{{$product->category_product_name}}</td>
                    <td style="font-size: 10px">{{$product->category_sub_product_name}}</td>
                    <td style="font-size: 10px">{{$product->brand_name}}</td>
                    <td style="font-size: 10px;width:200px">{{$product->product_content}}</td>
                    <td style="font-size: 10px">{{$product->product_price}}</td>
                    <td style="font-size: 10px">{{$product->product_price_sale}}</td>
                    <td><img width="50px" src="\product\{{$product->product_image}}"> </td>
                    <td style="font-size: 10px">{{$product->product_desc}}</td>
                    @if($product->product_status==0)
                        <td><a href={{route('product.un-active',$product->product_id)}}><i style="color: red" class="fas fa-smile-wink"></i></a></td>
                    @else
                        <td><a href={{route('product.active',$product->product_id)}}><i style="color: blue" class="fas fa-smile-wink"></i></a></td>
                    @endif
                    <td><a href={{route('product.edit',$product->product_id)}}><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('bạn có thật sự muốn xóa không?')" href={{route('product.remove',$product->product_id)}}><i class=" ion ion-md-close"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
