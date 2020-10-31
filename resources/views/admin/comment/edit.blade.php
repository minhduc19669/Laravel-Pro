@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Chi tiết bình luận</h4>
    <br>
    <br>
    @foreach($comment as $key => $comment)
    <div class="table-responsive">
        <table class="table table-borderless mb-0">
            <thead>
            <tr>
                <th>Tên người bình luận</th>
                <th>Tên sản phẩm</th>
                <th>Nội dung</th>
                <th>Đánh giá</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$comment->Customer->customer_name}}</td>
                <td>{{$comment->Product->product_name}}</td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->rating}} sao</td>
                <td>
                    <a onclick="return confirm('bạn có muốn xóa không ?')" href="{{route('comment.delete',$comment->id)}}" class="btn btn-danger">Xóa</a></td>

            </tr>


            </tbody>
        </table>
    </div>
    @endforeach
@endsection
