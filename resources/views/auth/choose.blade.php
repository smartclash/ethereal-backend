@extends('layout.app')

@section('content')
    @include('layout.navbar')

    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-7 is-offset-3 has-text-centered">
                        <p class="title">What do you wanna do?</p>
                        <div class="card">
                            <div class="card-content">
                                <a href="#" class="button is-fullwidth is-justify-content-center is-primary is-outlined">Register</a>
                                <div class="divider">OR</div>
                                <a href="#" class="button is-fullwidth is-justify-content-center is-outlined">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <button class="button is-primary is-outlined is-fullwidth" style="justify-content: center">Hello</button>
@endsection
