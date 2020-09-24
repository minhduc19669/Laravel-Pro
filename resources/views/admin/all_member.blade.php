@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách nhân viên quản lí</h4>
    <a href="{{route('admin.add_member')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên nhân viên</th>
                <th>Vị trí</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user )
                @foreach($user->roles as $role )
            <tr>
                <th scope="row">{{++$key}}</th>
                <td><a href="{{route('admin.profile')}}">{{$user->name}}</a></td>
            <td>{{ $role->role_name}}
                @if($role->id!=1)
                (<a class="pos"  href="#" data-key="{{$user->id}}" data-toggle="modal" data-target=".bs-example-modal-sm">Click để thêm chức vụ</a>)
                @endif
            </td>
                    <td><a style="margin-right: 10px" href="{{route('admin.edit_profile',$user->id)}}"><i class=" ion ion-md-color-filter"></i></a>|<a onclick="return confirm('Bạn có chắc chắn không?')" style="margin-left: 10px" href="{{route('admin.delete',['id'=>$user->id,'role'=>$role->id])}}"><i class=" ion ion-md-close"></i></a></td>
            </tr>
            @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Thêm chức vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h3>Chức vụ bổ nhiệm</h3>
                    <form action="{{route('admin.changeRoleMember')}}" method="post">
                        @csrf
                    <div class="input-group mb-3">
                        <input type="hidden" name="id" id="user-id">
                        <select name="role" class="custom-select" id="inputGroupSelect02">
                            <option selected>Choose...</option>
                            @foreach($roles as $role)
                                @if($role->id!=1)
                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" for="inputGroupSelect02">Xác nhận</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal

@endsection
