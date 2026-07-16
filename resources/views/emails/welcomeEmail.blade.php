<x-mail::message>
# Welcome to NexaCRM, {{ $user->name }}!

Thank you for registering for our CRM. We are excited to have you.

<x-mail::button :url="route('dashboard')">
Go to Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
