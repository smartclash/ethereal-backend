@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-7 is-offset-3">
                        @if(session('status'))
                            <div class="notification is-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-title">Forgot Password?</div>
                            </div>
                            <div class="card-content">
                                <form action="{{ route('password.request') }}" method="post">
                                    @csrf

                                    <div class="field">
                                        <label for="email" class="label">Email</label>
                                        <div class="control has-icons-left">
                                            <input type="email" id="email" name="email" placeholder="your@email.com"
                                                   value="{{ old('email') }}" required @class([
                                                        'input',
                                                        'is-danger' => $errors->has('email')
                                                    ])>
                                            @error('email')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <input type="submit"
                                                   class="button is-primary is-justify-content-center is-fullwidth is-outlined"
                                                   value="Request Reset Link">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
