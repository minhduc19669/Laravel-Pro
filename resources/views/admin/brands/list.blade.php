
@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Thương hiệu</h4>
    <a href="{{route('brand.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Logo</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $key => $brand )
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$brand->brand_name}}</td>
                    <td><img width="50px" src="\brand\{{$brand->brand_image}}"></td>
                    <td>{{$brand->brand_desc}}</td>
                    @if($brand->brand_status==0)
                        <td><a href={{\Illuminate\Support\Facades\URL::to('/users/unactive-brand/'.$brand->id)}}><i style="color: #ff0000" class="fas fa-smile-wink"></i></a></td>
                    @else
                        <td><a href={{\Illuminate\Support\Facades\URL::to('/users/active-brand/'.$brand->id)}}><i style="color: blue" class="fas fa-smile-wink"></i></a></td>
                    @endif
                    <td><a href={{\Illuminate\Support\Facades\URL::to('users/edit-brand/'.$brand->id)}}><i class=" ion ion-md-color-filter"></i></a> | <a onclick="return confirm('bạn có thật sự muốn xóa không?')" href={{\Illuminate\Support\Facades\URL::to('users/remove-brand/'.$brand->id)}}><i class=" ion ion-md-close"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


