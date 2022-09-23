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
                                <p>Let us know which events you'd like to attend by clicking on the buttons below</p>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        You can register for both, the team event and solo events
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        You can participate in any event. The ticket covers cost for all events
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-primary">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                        Only registered participants will be allowed in the team
                                    </span>
                                </span>
                                <span class="icon-text mt-4">
                                    <span class="icon has-text-danger">
                                        <i class="fas fa-close"></i>
                                    </span>
                                    <span>
                                        No alterations in the team will be allowed once created
                                    </span>
                                </span>
                                <div class="divider"></div>
                                <div class="columns mt-4">
                                    <div class="column is-half">
                                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdCnHnd7AVOLpR2o30RKDSxV1Kc0sK3vncHade2g5SmlzcNNA/viewform" target="_blank" class="button is-justify-content-center is-primary is-fullwidth is-outlined">Team Registration</a>
                                    </div>
                                    <div class="column is-half">
                                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSclMBkbYK9KlMrLlKEhTG-jrMtQYOUW3t0_M8EO9ViwLlbifQ/viewform" target="_blank" class="button is-justify-content-center is-primary is-fullwidth is-outlined">Solo Registration</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
