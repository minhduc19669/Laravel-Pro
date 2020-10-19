@extends('admin_layout')
@section('admin_content')
    <form action="{{route('subcategory.save')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>Thêm danh mục sản phẩm con</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">

                <div class="form-group col-md-8">
                    <label for="modelName">Mã</label>
                    <input type="number" min="1" class="form-control" name="sub_id" placeholder="Mã danh mục">
                </div>
            </div>
            @if ($errors->has('sub_id'))
                <p style="color: red">{{ $errors->first('sub_id') }}</p>
            @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên danh mục sản phẩm con </label>
                        <input type="text" class="form-control" name="category_sub_product_name" placeholder="Tên danh mục ">
                    </div>
                </div>
                @if ($errors->has('category_sub_product_name'))
                    <p style="color: red">{{ $errors->first('category_sub_product_name') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName" >Tên danh mục sản phẩm con </label>
                        <select class="form-control" name="cate_product" id="">
                            @foreach($cate_product as $key => $cate_pro)
                            <option value="{{$cate_pro->cate_pro_id}}">{{$cate_pro->category_product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Chú thích danh mục sản phẩm con</label>
                        <textarea  name="category_sub_product_desc" id="editor1" rows="10" cols="80"></textarea>
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
