@component('mail::message')
# Tkanks for signing up
{{$data}}
@component('mail::button', ['url' => 'http://laravel-training.local/home/login'])
Click để tiếp tục trải nghiệm dịch vụ của chúng tôi
@endcomponent

Thanks,<br>
@endcomponent
