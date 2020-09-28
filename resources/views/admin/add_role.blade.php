@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-4">
                <h4 class="header-title">*Thêm chuc vu</h4>
                <form class="form-horizontal parsley-examples" action="{{route('role.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên chuc vu(*)</label>
                        <input autofocus type="text" name="position" class="form-control required="" placeholder="Enter a valid name">
                    </div>
                    <div class="form-group">

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

