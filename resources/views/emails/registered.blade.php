<style>
    .button.button-success {
        font-size: 23px;
    }
</style>

@component('mail::message')
# Yay, you're registered 🎉

Welcome to KCG's **Ethereal**, {{ $user->name }}. We're pleased to have you.
Show the code below when entering into college.

@component('mail::button', ['url' => route('dashboard.show'), 'color' => 'success'])
{{ $user->details->code }}
@endcomponent

Don't forget to bring your ID card. If you have any queries, send it to us by replying to this email.

Thanks,<br>
{{ config('app.name') }}

<hr />
<br />

<span style="font-size: 12px">
Website developed by <a href="https://alphaman.me/" target="_blank">Karan Sanjeev Nair</a>.
</span>

<span style="font-size: 12px">
View my resume by <a href="{{ asset('files/karan-resume.pdf') }}" target="_blank">clicking here</a>.
</span>
@endcomponent
