@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-content">
                                @include('layout.steps')
                            </div>
                        </div>
                    </div>
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-content">
                                <p>
                                    After paying, you'll be automatically registered. You will get a
                                    <span class="has-text-weight-bold">secret code</span> that needs to be presented
                                    when entering into the campus.
                                </p>
                                <p class="mt-4">
                                    Any volunteer can ask for the <span class="has-text-weight-bold">secret code</span>
                                    to verify your registration details
                                </p>
                                <div class="divider">Information</div>
                                <span class="icon-text">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        Each participant has to pay 255₹ for entry
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        You're allowed only if you are currently a student at an accredited university
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        Your college ID must be submitted for verification during entry
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-danger">
                                        <i class="fas fa-close"></i>
                                    </span>
                                    <span>
                                        On spot registration is not allowed. Only online registration is allowed
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-danger">
                                        <i class="fas fa-close"></i>
                                    </span>
                                    <span>
                                        Entry without college ID card won't be allowed.
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-danger">
                                        <i class="fas fa-close"></i>
                                    </span>
                                    <span>
                                        No refunds will be processed for any reason
                                    </span>
                                </span>
                                <button id="razorpay-button" class="mt-5 button is-primary is-fullwidth is-justify-content-center">Pay 255₹</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('end')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        let options = {
            "key": "{{ config('services.razorpay.key') }}",
            "amount": "25500",
            "currency": "INR",
            "name": "Ethereal",
            "description": "Event ticket for one participant",
            "image": "https://example.com/your_logo",
            "order_id": "{{ auth()->user()->razorpay->order }}",
            "callback_url": "{{ route('payment.callback') }}",
            "prefill": {
                "name": "{{ auth()->user()->name }}",
                "email": "{{ auth()->user()->email }}",
                "contact": "{{ auth()->user()->phone }}"
            },
            "readonly": {
                "name": true,
                "email": true,
                "contact": true
            },
            "customer_id": "{{ auth()->user()->razorpay->customer }}",
            "theme": {
                "color": "#00D1B2"
            }
        };
        let razorpay = new Razorpay(options);
        document.getElementById('razorpay-button').onclick = function(e) {
            razorpay.open();
            e.preventDefault();
        }
    </script>
@endpush