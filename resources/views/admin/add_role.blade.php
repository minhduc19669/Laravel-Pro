
@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-4">
                <h4 class="header-title">*Thêm chuc vu</h4>
                <form class="form-horizontal parsley-examples" action="{{route('admin.storePosition')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên chuc vu(*)</label>
                        <input autofocus type="text" name="position" class="form-control {{$errors->first('username') ? 'text-danger': ''}}" required="" placeholder="Enter a valid name">
                        <span class="{{$errors->first('username') ? 'is-invalid' : ''}}"></span>
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
