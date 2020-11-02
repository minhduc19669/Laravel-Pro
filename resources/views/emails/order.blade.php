@component('mail::message')
# Introduction

Dang giao hang`

@component('mail::table')

|Name|Mã đơn hàng|Tổng giá trị|Số điện thoại|
|:---|:----------|:-----------|:------------|
|{{$order['shipping_name']}}|{{$code}}|{{$total}}|{{$order['shipping_phone']}}|
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
