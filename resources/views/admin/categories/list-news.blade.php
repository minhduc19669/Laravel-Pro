@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh mục</h4>
    <a href="{{route('category.add-news')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục tin tức</th>
                <th>Chú thích tin tức</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $key => $category )

                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$category->category_news_name}}</td>
                    <td>{{$category->category_news_desc}}</td>
                    <td><a style="margin-right: 10px" href={{route('category.edit-news',$category->id)}}    ><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('Bạn có thật sự muốn xóa không?')" style="margin-left: 10px" href={{route('category.remove-news',$category->id)}}><i class=" ion ion-md-close"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
