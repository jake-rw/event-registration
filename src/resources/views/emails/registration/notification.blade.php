@component('mail::message')
# Registration

You have a new S&P Global Platts 2020 event registration

@component('mail::button', ['url' => url('/admin/registrations')])
View Registrations
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
