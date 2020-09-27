@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách sản phẩm</h4>
    <a href="{{route('product.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
<<<<<<< HEAD
=======

>>>>>>> a67d42aaa95997a426e90cfd6d98fb33b1a3f2bb
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Mã</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th>Chi tiết</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Ảnh</th>
<<<<<<< HEAD
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục sản phẩm</th>
                <th>Thương hiệu sản phẩm</th>
                <th>Chi tiết sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Giảm giá sản phẩm</th>
                <th>Ảnh sản phẩm</th>
=======
>>>>>>> a67d42aaa95997a426e90cfd6d98fb33b1a3f2bb
                <th>ghi chú</th>
                <th>Trạng thái</th>

            </tr>
            </thead>
            <tbody>
            @foreach($list as $key => $product )

                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$product->product_code}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->brand_name}}</td>
                    <th>{{$product->product_content}}</th>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->product_price_sale}}</td>
                    <td><img width="50px" src="\product\{{$product->product_image}}"> </td>
                    <td>{{$product->product_desc}}</td>
                    <td></td>
                    <td><a style="margin-right: 10px" href="{{\Illuminate\Support\Facades\URL::to('admin/edit-product/'.$product->id)}}"><i class=" ion ion-md-color-filter"></i></a>|<a style="margin-left: 10px" href="#"><i class=" ion ion-md-close"></i></a></td>
<<<<<<< HEAD
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->brand_id}}</td>
                    <th>{{$product->product_content}}</th>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->product_price_sale}}</td>
                    <td></td>
                    <td>{{$product->product_desc}}</td>
                    <td></td>
                    <td><a style="margin-right: 10px" href="#"><i class=" ion ion-md-color-filter"></i></a>|<a style="margin-left: 10px" href="#"><i class=" ion ion-md-close"></i></a></td>
=======
>>>>>>> a67d42aaa95997a426e90cfd6d98fb33b1a3f2bb
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
