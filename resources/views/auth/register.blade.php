@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-7 is-offset-3 has-text-centered">
                        <div class="card">
                            <div class="card-content">
                                @include('layout.steps')
                            </div>
                        </div>
                    </div>
                    <div class="column is-7 is-offset-3">
                        <div class="box">
                            <form action="{{ route('auth.register') }}" method="post">
                                @csrf

                                <div class="field">
                                    <label for="name" class="label">Name</label>
                                    <div class="control has-icons-left">
                                        <input type="text" id="name" name="name" placeholder="My name is..." value="{{ old('name') }}" required @class([
                                            'input',
                                            'is-danger' => $errors->has('name')
                                        ])>
                                        @error('name')
                                            <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                </div>

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
                                    <label for="phone" class="label">Phone</label>
                                    <div class="control has-icons-left">
                                        <input type="tel" id="phone" name="phone" placeholder="98412942024" value="{{ old('phone') }}" required @class([
                                            'input',
                                            'is-danger' => $errors->has('phone')
                                        ])>
                                        @error('phone')
                                            <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-phone"></i>
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
                                    <p>
                                        Already have an account? <a href="{{ route('auth.login') }}">Login here</a>
                                    </p>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input type="submit" class="button is-justify-content-center is-primary is-fullwidth is-outlined" value="Register">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
