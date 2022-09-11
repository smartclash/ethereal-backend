@extends('layout.app')

@section('content')
    @include('layout.navbar')

    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-7 is-offset-3">
                        @error('credentials')
                            <div class="notification is-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-title">Login to access account</div>
                            </div>
                            <div class="card-content">
                                <form action="{{ route('auth.login') }}" method="post">
                                    @csrf

                                    <div class="field">
                                        <label for="email" class="label">Email</label>
                                        <div class="control has-icons-left">
                                            <input type="email" id="email" name="email" placeholder="your@email.com" value="{{ old('email') }}" required @class([
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
                                        <label for="password" class="label">Password</label>
                                        <div class="control has-icons-left">
                                            <input type="password" id="password" name="password" placeholder="Y0uR S3cRe1" required @class([
                                                'input',
                                                'is-danger' => $errors->has('password')
                                            ])>
                                            @error('password')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-key"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <input type="submit" class="button is-primary is-fullwidth is-outlined" value="Login">
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
