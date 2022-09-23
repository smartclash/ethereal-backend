@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-content">
                                @include('layout.steps')
                            </div>
                        </div>
                    </div>
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{ route('details.form') }}" method="post">
                                    @csrf

                                    <div class="field">
                                        <label for="college" class="label">College Name</label>
                                        <div class="control has-icons-left">
                                            <input type="text" id="college" name="college" placeholder="eg: KCG College of Technology" value="{{ old('college') }}" required @class([
                                                'input',
                                                'is-danger' => $errors->has('college')
                                            ])>
                                            @error('college')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-university"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="course" class="label">Course Name</label>
                                        <div class="control has-icons-left">
                                            <input type="text" id="course" name="course" placeholder="eg: BE Computer Science" value="{{ old('course') }}" required @class([
                                                'input',
                                                'is-danger' => $errors->has('course')
                                            ])>
                                            @error('course')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-graduation-cap"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="passing" class="label">Passing Year</label>
                                        <div class="control has-icons-left">
                                            <input type="number" id="passing" name="passing" placeholder="2023" value="{{ old('passing') }}" required @class([
                                                'input',
                                                'is-danger' => $errors->has('passing')
                                            ])>
                                            @error('passing')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <input type="submit" class="button is-justify-content-center is-primary is-fullwidth is-outlined" value="Save Details">
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
