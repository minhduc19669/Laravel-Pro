@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách nhân viên quản lí</h4>
    <a href="{{route('role.create')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Chức vụ</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $key => $role )
            <tr>
                <th scope="row">{{++$key}}</th>
                <td style="margin-top: 10px">{{$role->role_name}}</td>
                <td><a style="margin-right: 10px" href="{{route('role.edit',$role->id)}}"><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('Bạn có chắc chắn không?')" style="margin-left: 10px" href="{{route('role.delete',$role->id)}}"><i class=" ion ion-md-close"></i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

