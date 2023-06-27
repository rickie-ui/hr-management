@component('mail::message')
## Hello {{$user->fullName}},

Your leave request been accepted! Enjoy

Thanks,<br>
{{ config('app.name') }}

@endcomponent