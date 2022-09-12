@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-7 is-offset-3">
                        <p class="title">Welcome, {{ auth()->user()->name }}</p>
                        <div class="notification is-warning is-light">
                            We will <strong>only</strong> communicate information by sending emails and posting about
                            it on our official social media handles. You are requested to keep checking these sources.
                        </div>
                        <div class="card mt-4">
                            <div class="card-content">
                                <div class="level">
                                    <div class="level-left">
                                        <p class="is-size-4">Your secret code</p>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <code class="is-size-4">{{ auth()->user()->details->code }}</code>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-content">
                                <p>If you'd like to participate in a team event, a form will be circulated soon.</p>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        Only the team leader should fill that form.
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        Every participant in the team must complete registration individually.
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        Only registered participants will be allowed in the team.
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-danger">
                                        <i class="fas fa-close"></i>
                                    </span>
                                    <span>
                                        No alterations in the team will be allowed once created.
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
