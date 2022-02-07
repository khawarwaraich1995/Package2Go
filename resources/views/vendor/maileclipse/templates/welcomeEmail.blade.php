@component('mail::message')

# Welcome, {{$user->name ?? '{name}'}}!

Thanks for trying {{config('app.name')}}. We’re thrilled to have you on board.


If you have any questions, feel free to [email our customer success team.]({{config('app.url')}}) (We're lightning quick at replying.) We also offer live chat during business hours.

Thanks,<br>
{{config('app.name')}} Team

@endcomponent
