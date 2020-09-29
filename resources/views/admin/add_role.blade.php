@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-4">
                <h4 class="header-title">*Thêm chức vụ</h4>
                <form class="form-horizontal parsley-examples" action="{{route('role.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên chức vụ(*):</label>
                        <input autofocus type="text" name="role_name" class="form-control" placeholder="Enter a valid name">
                    </div>
                    <div class="form-group">
                        <label>Quyền hạn(*):</label>
                        @foreach ($permissions as $item)
                        <div class="form-check">
                           <input name="permission[]" class="form-check-input" type="checkbox" value="{{$item->id}}"  id="defaultCheck1">
                          <label class="form-check-label" for="defaultCheck1">
                                {{$item->display_name}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Tạo mới
                            </button>
                            <button onclick="goBack()" class="btn btn-secondary waves-effect">
                                Trở về
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
@endsection

