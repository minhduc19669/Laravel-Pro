@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách sản phẩm</h4>
    <a href="{{route('product.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <input width="50px" type="text" name="search" id="search" class="form-control" placeholder="Tìm kiếm" />
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Brand</th>
                <th>Content</th>
                <th>Price </th>
                <th>Sale </th>
                <th>Image </th>
                <th>Desc</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            fetch_customer_data();
            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('product.search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }
            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
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
        // $(document).on('click', '#unactive', function() {
        //     var id = $(this).data('id');
        //     var slide_status =$(this).data('slide_status')
        //     var query = $(this).val();
        //     console.log(id);
        //     $.ajax({
        //         url: 'slide/un-active/'+id,
        //         method: 'get',
        //         dataType: 'json',
        //         type: 'unactive',
        //         data: {
        //             "id": id,
        //             'slide_status': slide_status,
        //         },
        //         success: function (data) {
        //         }
        //
        //     })
        //
        // });
    </script>
@endsection
