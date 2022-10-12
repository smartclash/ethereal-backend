@extends('layout.app')

@section('content')
    <section class="hero has-background-white-bis is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-7 is-offset-3">
                        <p class="title">Welcome, Admin</p>
                    </div>
                </div>
                <div class="columns is-multiline">
                    <div class="column is-7 is-offset-3">
                        <div class="card mt-4">
                            <div class="card-header">
                                <p class="card-header-title">
                                    Export user details
                                </p>
                            </div>
                            <div class="card-content">
                                <form action="{{ route('admin.excel.export') }}" method="post">
                                    @csrf

                                    <div class="field">
                                        <label for="paid">Return only paid registrants</label>
                                        <div class="control has-icons-left is-expanded">
                                            <div class="select is-fullwidth">
                                                <select name="paid" id="paid">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                            <div class="icon is-left">
                                                <i class="fas fa-credit-card"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="kcg">Return only KCG registrants</label>
                                        <div class="control has-icons-left is-expanded">
                                            <div class="select is-fullwidth">
                                                <select name="kcg" id="kcg">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                            <div class="icon is-left">
                                                <i class="fas fa-university"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <input
                                                type="submit"
                                                class="button is-primary is-justify-content-center is-fullwidth is-outlined"
                                                value="Generate Sheet" />
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
