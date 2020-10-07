@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách tin tức</h4>
    <a href="{{route('news.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Nội dung</th>
                <th>Ảnh</th>
                <th>Ghi chú</th>
                <th>Lượt xem</th>
                <th>Ngày đăng </th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $key => $list )
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$list->news_title}}</td>
                    <td>{{$list->category_news_name}}</td>
                    <th>{{$list->news_content}}</th>
                    <td><img width="50px" src="\news\{{$list->news_image}}"></td>
                    <td>{{$list->news_desc}}</td>
                    <td>{{$list->news_view}}</td>
                    <td>{{$list->news_date}}</td>
                    @if($list->news_status==0)
                        <td><a href={{route('news.un-active',$list->news_id)}}><i style="color: red" class="fas fa-smile-wink"></i></a></td>
                    @else
                        <td><a href={{route('news.active',$list->news_id)}}><i style="color: blue" class="fas fa-smile-wink"></i></a></td>
                    @endif
                    <td><a href={{route('news.edit',$list->news_id)}}><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('bạn có thật sự muốn xóa không?')" href={{route('news.remove',$list->news_id)}}><i class=" ion ion-md-close"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
