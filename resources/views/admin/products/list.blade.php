@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách sản phẩm</h4>
    <a href="{{route('product.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row"><div class="col-sm-12 col-md-6">

            </div>
            <div class="col-sm-12 col-md-6">
                <div id="datatable_filter" class="dataTables_filter">
                    <label>Search:
                        <input name="search" id="search" type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                    <thead  class="col-sm-12">
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 10px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">#</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Mã</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;" aria-label="Office: activate to sort column ascending">Tên</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;" aria-label="Age: activate to sort column ascending">Danh mục</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;" aria-label="Age: activate to sort column ascending">Thương hiệu</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;" aria-label="Start date: activate to sort column ascending">Gía</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;" aria-label="Salary: activate to sort column ascending">khuyến mãi</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 100px;" aria-label="Salary: activate to sort column ascending">Ảnh</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 240px;" aria-label="Salary: activate to sort column ascending">Chi tiết</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 110px;" aria-label="Salary: activate to sort column ascending">Trạng thái</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 220px;" aria-label="action: activate to sort column ascending">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $row)
                    <tr id="item_{{$row->product_id}}" role="row" class="odd">
                        <td class="" tabindex="0">{{++$key}}</td>
                        <td class="sorting_1" style="font-size: 12px">{{$row->product_code}}</td>
                        <td style="font-size: 12px">{{$row->product_name }}</td>
                        <td style="font-size: 12px">{{$row->categories->category_product_name }}</td>
                        <td style="font-size: 12px">{{$row->brands->brand_name }}</td>
                        <td style="font-size: 12px">{{$row->product_price }}</td>
                        <td style="font-size: 12px">{{$row->product_price_sale }}</td>
                        <td >
                            @foreach ($row->images as $value)
                            <img width="50px" src=" /storage/{{$value->image}} " alt="">
                            @endforeach
                        </td><td style="font-size: 12px">{{$row->product_content }}</td>

                        @if ($row->product_status == 0)
                        <td style="font-size: 12px">Hết hàng</td>

                        @else

                        <td style="font-size: 12px">Còn hàng</td>
                        @endif

                        <td style="font-size: 12px"><a href='{{route('product.edit',$row->product_id)}}'><button style="font-size: 12px" class="btn  btn-dark" type="submit">sửa</button></a>  <button style="font-size: 12px" id="delete"  data-id="{{$row->product_id}}" class="btn  btn-danger delete" type="submit">xóa</button> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {!! $data->render() !!}

        <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{route('product.search')}}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            console.log(id);
            if (confirm('bạn có muốn xóa không?')) {
                $.ajax({
                    url: 'product/remove/'+id,
                    method: 'get',
                    dataType: 'json',
                    type: 'delete',
                    data: {
                        "product_id": id,
                    },
                    success: function (data) {
                        $('#item_'+id).remove();
                    }
                })
            }
        });

    </script>
@endsection
