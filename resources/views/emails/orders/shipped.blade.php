@component('mail::message')
# Cảm ơn bạn đã mua hàng
Xin chào, Chúng tôi đã nhận được đặt hàng của bạn và đã sẵn sàng để vận chuyển. Chúng tôi sẽ thông báo cho bạn khi đơn hàng được gửi đi.
@component('mail::panel')
PET_LOVE
@endcomponent
@component('mail::button', ['url' => 'http://laravel-training.local/home/login'])
Xem đơn hàng
@endcomponent

Thanks,<br>
@endcomponent
