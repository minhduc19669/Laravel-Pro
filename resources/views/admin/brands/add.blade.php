@extends('admin_layout')
@section('admin_content')
    <form action="{{route('brand.save')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Thêm thương hiệu</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên thương hiệu</label>
                        <input value="{{old('brand_name')}}" type="text" class="form-control" name="brand_name" placeholder="Tên thương hiệu">
                    </div>
                </div>
                @if ($errors->has('brand_name'))
                    <p style="color: red">{{ $errors->first('brand_name') }}</p>
                @endif
                <div class="form-row">
<<<<<<< HEAD
                    <div class="col-lg-4">
                        <div class="card-box">

                            <h4 class="header-title mb-4">Logo</h4>

                            <input name="brand_image" value="{{old('brand_image')}}" type="file" class="dropify" data-default-file="{{asset('assets/images/small/img-1.jpg')}}"  />
                        </div>
                    </div><!-- end col -->
=======
                    <div class="form-group col-md-8">
                        <label for="price">Logo</label>
                        <input value="{{old('brand_image')}}" type="file" class="form-control" name="brand_image" placeholder="Ảnh thương hiệu">
                    </div>
>>>>>>> e89e83e45017d9d694b518f2d529e77a3fdcdf3a
                </div>
                @if ($errors->has('brand_image'))
                    <p style="color: red">{{ $errors->first('brand_image') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Ghi chú</label>
                        <textarea id="editor1" type="text" class="form-control" name="brand_desc" placeholder="Ghi chú">{{old('brand_desc')}}</textarea>
                    </div>
                </div>
                @if ($errors->has('brand_desc'))
                    <p style="color: red">{{ $errors->first('brand_desc') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="brand_status">
                            <option value="0">Ẩn </option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                </div>
                @if ($errors->has('brand_status'))
                    <p style="color: red">{{ $errors->first('brand_status') }}</p>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src=""/>
            </div>
        </div>
    </form>
@endsection
