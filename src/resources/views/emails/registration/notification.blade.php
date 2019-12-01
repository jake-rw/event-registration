@component('mail::message')
# Registration

You have a new Future Focused event registration

@component('mail::button', ['url' => url('/admin/registrations')])
View Registrations
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
