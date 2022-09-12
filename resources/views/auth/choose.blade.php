@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-7 is-offset-3 has-text-centered">
                        <p class="title">What do you wanna do?</p>
                        <div class="card">
                            <div class="card-content">
                                <a href="{{ route('auth.register') }}" class="button is-fullwidth is-justify-content-center is-primary is-outlined">Register</a>
                                <div class="divider">OR</div>
                                <a href="{{ route('auth.login') }}" class="button is-fullwidth is-justify-content-center is-outlined">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
