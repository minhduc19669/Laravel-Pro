@extends('admin_layout')
@section('admin_content')
    <form action="{{route('subcategory.save')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>Thêm thể loại </h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên thể loại</label>
                        <input value="{{old('category_sub_product_name')}}" type="text" class="form-control" name="category_sub_product_name" placeholder="Tên thể loại">
                    </div>
                </div>
                @if ($errors->has('category_sub_product_name'))
                    <p style="color: red">{{ $errors->first('category_sub_product_name') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName" >danh mục</label>
                        <select class="form-control" name="cate_product" id="">
                            @foreach($cate_product as $key => $cate_pro)
                            <option value="{{$cate_pro->cate_pro_id}}">{{$cate_pro->category_product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Chú thích </label>
                        <textarea  name="category_sub_product_desc" id="editor1" rows="10" cols="80">{{old('category_sub_product_desc')}}</textarea>
                    </div>

                </div>
                @if ($errors->has('category_sub_product_desc'))
                    <p style="color: red">{{ $errors->first('category_sub_product_desc') }}</p>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="">
            </div>
        </div>

    </form>



@endsection
