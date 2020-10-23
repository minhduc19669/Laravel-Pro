@component('mail::message')
# Click vào link bên dưới để đặt lại mật khẩu của bạn



@component('mail::button', ['url' => $url ])
Button Text
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
