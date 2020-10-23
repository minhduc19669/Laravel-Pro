@extends('admin_layout')
@section('admin_content')
    <h2>Thông tin thành viên</h2>
<div class="container pb-5" style="margin-top: 50px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                @if($user->avatar)
                                    <img src="{{asset("storage/images/".$user->avatar)}}" id="imgProfile"
                                         style="width: 150px; height: 150px" class="img-thumbnail"/>
                                @else
                                    <img src="http://placehold.it/150x150" id="imgProfile"
                                         style="width: 150px; height: 150px" class="img-thumbnail"/>
                                @endif
                                    <form action="{{route('user.upload',$user->id)}}" method="post"
                                          enctype="multipart/form-data">
                                            @csrf
                                                <div class="middle mt-3">
                                                    <input class="form-control" type="file" onchange="this.form.submit()"
                                                           id="profilePicture"
                                                           name="cover"/>
                                                </div>
                                            </form>
                                            <div class="userData mt-3">
                                                <p style="color: #0a0a0a;font-size: 20px; font-family: inherit">Thông tin
                                                    cá nhân</p>
                                            </div>
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-primary d-none" id="btnDiscard"
                                       value="Discard Changes"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab"
                                       href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Chi
                                        tiết</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab"
                                       href="#connectedServices" role="tab" aria-controls="connectedServices"
                                       aria-selected="false">Chỉnh sửa</a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                                     aria-labelledby="basicInfo-tab">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style=" font-family: inherit">Tên</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$user->name}}
                                        </div>
                                        @if($errors->first('name'))
                                                        <p style="margin-left: 10px" class="text-danger">{{ $errors->first('name') }}</p>
                                                    @endif
                                    </div>
                                    <hr/>

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-family: inherit">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$user->email}}
                                        </div>
                                        @if($errors->first('email'))
                                                        <p style="margin-left: 10px" class="text-danger">{{ $errors->first('email') }}</p>
                                                    @endif
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-family: inherit">Số điện thoại</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$user->phone}}
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-family: inherit">Địa chỉ</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$user->address}}
                                        </div>
                                    </div>
                                   <hr/>

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-family: inherit">Chức vụ</label>
                                        </div>
                                        @if($role_user)
                                        <div class="col-md-8 col-6">
                                            @foreach ($user->roles as $role)
                                                {{$role->role_name}}<br>
                                            @endforeach
                                            (<a class="pos"  href="#" data-key="{{$user->id}}" data-toggle="modal" data-target=".bs-example-modal-sm">Click để thêm chức vụ</a>)
                                        </div>
                                        @else
                                        <div class="col-md-8 col-6">
                                            Chưa có chức vụ
                                            (<a class="pos"  href="#" data-key="{{$user->id}}" data-toggle="modal" data-target=".bs-example-modal-sm">Click để thêm chức vụ</a>)
                                        </div>
                                        @endif
                                    </div>
                                    <hr/>
                                    <hr/>
                                    <div class="row" style="margin-left: 400px">
                                    <a href="{{route('user.list')}}" class="btn btn-secondary waves-effect">
                                Trở về
                            </a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                                     aria-labelledby="ConnectedServices-tab">
                            <form method="post" action="{{route('user.update',$user->id)}}">
                                        @csrf
                                        @if($errors->all())
                                            <div id="msg_div" class="alert alert-danger d-none" role="alert">
                                                <span id="res_message"></span>
                                            </div>
                                        @endif
                                        <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                                             aria-labelledby="basicInfo-tab">
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style=" font-family: inherit" class="{{$errors->first('name') ? 'text-danger': ''}}">Tên (*)</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input class="form-control {{$errors->first('name') ? 'is-invalid': ''}}" type="text" name="name"
                                                           value="{{$user->name}}"/>
                                                    @if($errors->first('name'))
                                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-family: inherit" class="{{$errors->first('phone') ? 'text-danger': ''}}">Số điện thoại (*)</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input class="form-control {{$errors->first('phone') ? 'is-invalid': ''}}" type="text" name="phone"
                                                           value="{{$user->phone}}"/>
                                                    @if($errors->first('phone'))
                                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                                    @endif
                                                </div>

                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-family: inherit">Địa chỉ</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input class="form-control" type="text" name="address"
                                                value="{{$user->address}}"/>
                                                </div>
                                            </div>


                                            <hr/>
                                            <div class="row mt-2">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <div>
                                                        <p>Ghi chú: Mục tích dấu (*) là bắt buộc!!!</p>
                                                    </div>
                                                    <input class="btn btn-primary" type="submit" value="Cập nhập"/>
                                                        <a class="btn btn-secondary"
                                                           href="">Trở
                                                            lại</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <form action="{{route('user.changeRole',$user->id)}}" method="post">
                        @csrf
                    <div class="input-group mb-3">
                        <input type="hidden" name="id" id="user-id">
                        <select name="role[]" multiple class="custom-select" id="inputGroupSelect02">
                            @foreach($roles as $role)
                        <option {{$listRoleUser->contains($role->id) ? 'selected' : '' }} value="{{$role->id}}">{{$role->role_name}}</option>
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
