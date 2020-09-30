
@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Slide</h4>
    <a href="{{route('slide.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Ảnh</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>

            </tr>
            </thead>
            <tbody>
            @foreach($slide as $key => $list )
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td><img width="50px" src="\slide\{{$list->slide_image}}"></td>
                    <td>{{$list->slide_desc}}</td>
                    @if($list->slide_status==0)
                        <td><a href={{route('slide.unactive',$list->id)}}><i style="color: #ff0000" class="fas fa-smile-wink"></i></a></td>
                    @else
                        <td><a href={{route('slide.active',$list->id)}}><i style="color: blue" class="fas fa-smile-wink"></i></a></td>

                    @endif
                    <td><a style="margin-right: 10px" href={{route('slide.edit',$list->id)}}    ><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('bạn có thật sự muốn xóa không?')" style="margin-left: 10px" href={{route('slide.remove',$list->id)}}><i class=" ion ion-md-close"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


