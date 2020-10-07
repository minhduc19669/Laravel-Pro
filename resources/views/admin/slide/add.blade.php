@extends('admin_layout')
@section('admin_content')
    <form action="{{route('slide.save')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Thêm Slider</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Ảnh</label>
                        <input type="file" class="form-control" name="slide_image" placeholder="desc">
                    </div>
                </div>
                @if ($errors->has('slide_image'))
                    <p style="color: red">{{ $errors->first('slide_image') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Ghi chú</label>
                        <textarea id="editor1" type="text" class="form-control" name="slide_desc" placeholder="ghi chú"></textarea>
                    </div>
                </div>
                @if ($errors->has('slide_desc'))
                    <p style="color: red">{{ $errors->first('slide_desc') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="slide_status">
                            <option value="0">Ẩn </option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                </div>
                @if ($errors->has('slide_status'))
                    <p style="color: red">{{ $errors->first('slide_status') }}</p>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src=""/>
            </div>
        </div>
    </form>
@endsection
