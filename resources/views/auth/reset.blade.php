@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-title">Reset password</div>
                            </div>
                            <div class="card-content">
                                <form action="{{ route('password.update') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

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
                                            <input type="password" id="password" name="password"
                                                   placeholder="Y0uR S3cRe1" required @class([
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
                                        <label for="password_confirmation" class="label">Repeat Password</label>
                                        <div class="control has-icons-left">
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                   placeholder="Y0uR S3cRe1 aGA1N" required @class([
                                                'input',
                                                'is-danger' => $errors->has('password_confirmation')
                                            ])>
                                            @error('password_confirmation')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-key"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <input type="submit"
                                                   class="button is-primary is-justify-content-center is-fullwidth is-outlined"
                                                   value="Reset Password">
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
