<ul class="steps has-content-centered is-small">
    <li @class([
        'steps-segment',
        'is-active' => Route::is('auth.register')
    ])>
        <span class="steps-marker"></span>
        <div class="steps-content">
            <p class="is-size-5">Account</p>
        </div>
    </li>
    <li @class([
        'steps-segment',
        'is-active' => Route::is('details.form')
    ])>
        <span class="steps-marker"></span>
        <div class="steps-content">
            <p class="is-size-5">Information</p>
        </div>
    </li>
    <li @class([
        'steps-segment',
        'is-active' => Route::is('payment.show')
    ])>
        <span class="steps-marker"></span>
        <div class="steps-content">
            <p class="is-size-5">Payment</p>
        </div>
    </li>
</ul>
