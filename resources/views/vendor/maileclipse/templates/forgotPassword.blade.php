@component('mail::message')

Hi {{$name ?? '{name}'}},

You recently requested to reset your password for your {{config('app.name')}} account. Use the button below to reset it. **This password reset is only valid for the next 24 hours.**

@component('mail::button',  ['url' => $link, 'color' => 'primary'])
Reset your password
@endcomponent

If you did not request a password reset, please ignore this email.

Thanks,<br>
The {{config('app.name')}} Team
@endcomponent
