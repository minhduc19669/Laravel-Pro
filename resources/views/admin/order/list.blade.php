@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Đơn hàng</h4>
    <a href="{{route('order.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <input width="50px" type="text" name="search" id="search" class="form-control" placeholder="Tìm kiếm" />

    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Tổng giá tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
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
                    url:"{{ route('order.search') }}",
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
                    url: 'order/remove/'+id,
                    method: 'get',
                    dataType: 'json',
                    type: 'delete',
                    data: {
                        "order_id": id,
                    },
                    success: function (data) {
                        $('#item_'+id).remove();
                    }
                })
            }
        });


    </script>
@endsection
