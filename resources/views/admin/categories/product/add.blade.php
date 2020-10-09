@extends('admin_layout')
@section('admin_content')
    <form action="{{route('category.save')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>Thêm danh mục sản phẩm</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">ID</label>
                        <input type="number" min="1" class="form-control" name="cate_pro_id" placeholder="Id danh mục sản phẩm">
                    </div>
                </div>
                @if ($errors->has('cate_pro_id'))
                    <p style="color: red">{{ $errors->first('cate_pro_id') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên danh mục sản phẩm</label>
                        <input type="text" class="form-control" name="category_product_name" placeholder="Tên danh mục sản phẩm">
                    </div>
                </div>
                @if ($errors->has('category_product_name'))
                    <p style="color: red">{{ $errors->first('category_product_name') }}</p>
                @endif


                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Chú thích danh mục sản phẩm</label>
                        <textarea  name="category_product_desc" id="editor1" rows="10" cols="80"></textarea>
                    </div>

                </div>
                @if ($errors->has('category_product_desc'))
                    <p style="color: red">{{ $errors->first('category_product_desc') }}</p>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="">
            </div>
        </div>

    </form>



@endsection
