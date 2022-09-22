<style>
    .button.button-success {
        font-size: 23px;
    }
</style>

@component('mail::message')
# Yay, email is working 🎉

If you're seeing this email, it means the email functionality is working fine

@component('mail::button', ['url' => route('dashboard.show'), 'color' => 'success'])
Dashboard
@endcomponent

Now, go back to doing whatever you were doing

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
