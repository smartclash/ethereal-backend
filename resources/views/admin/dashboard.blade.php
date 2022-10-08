@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-7 is-offset-3">
                        <p class="title">Welcome, Admin</p>
                        <div class="card mt-4">
                            <div class="card-header">
                                <p class="card-header-title">
                                    Verify secret code
                                </p>
                            </div>
                            <div class="card-content">
                                <form action="">
                                    @csrf

                                    <div class="field">
                                        <label for="secret" class="label">Secret Code</label>
                                        <div class="control has-icons-left">
                                            <input type="text" id="secret" name="secret" value="{{ old('secret') }}" required @class([
                                                'input',
                                                'is-danger' => $errors->has('secret')
                                            ])>
                                            @error('secret')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <input type="submit" class="button is-primary is-justify-content-center is-fullwidth is-outlined" value="Verify">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-content">
                                <div class="columns">
                                    <div class="column is-half">
                                        <a href="{{ route('blv.index') }}" target="_blank" class="button is-justify-content-center is-primary is-fullwidth is-outlined">Logs</a>
                                    </div>
                                    <div class="column is-half">
                                        <a href="{{ route('telescope') }}" target="_blank" class="button is-justify-content-center is-primary is-fullwidth is-outlined">System Telescope</a>
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
