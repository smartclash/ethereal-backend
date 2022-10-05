@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-title">Admin Login</div>
                            </div>
                            <div class="card-content">
                                <p>
                                    Only internal google emails using
                                    <span class="has-text-weight-bold">@kcgcollege.com</span>
                                    TLD will be allowed to login
                                </p>

                                <a
                                    href="{{ route('auth.google') }}"
                                    class="button is-justify-content-center is-primary is-fullwidth is-outlined mt-4">
                                    Login using Google
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
