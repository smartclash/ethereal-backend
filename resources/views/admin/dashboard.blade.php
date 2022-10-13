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
                <div class="columns">
                    <div class="column is-3">
                        <div class="box">
                            <p class="is-size-3 has-text-weight-bold">{{ $registrants }}</p>
                            <p class="is-size-5">Registrants</p>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="box">
                            <p class="is-size-3 has-text-weight-bold">{{ $paidRegistrants }}</p>
                            <p class="is-size-5">Paid Registrants</p>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="box">
                            <p class="is-size-3 has-text-weight-bold">{{ $kcgRegistrants }}</p>
                            <p class="is-size-5">KCG Registrants</p>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="box">
                            <p class="is-size-3 has-text-weight-bold">{{ $paidKcgRegistrants }}</p>
                            <p class="is-size-5">Paid KCG Registrants</p>
                        </div>
                    </div>
                </div>
                <div class="columns is-multiline">
                    <div class="column is-7 is-offset-3">
                        <div class="card mt-4">
                            <div class="card-header">
                                <p class="card-header-title">
                                    Verify secret code
                                </p>
                            </div>
                            <div class="card-content" x-data="initData()">
                                <div class="field">
                                    <label for="secret" class="label">Secret Code</label>
                                    <div class="control has-icons-left">
                                        <input type="text" id="secret" name="secret" required class="input" x-model="code">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input
                                            class="button is-primary is-justify-content-center is-fullwidth is-outlined"
                                            value="Verify"
                                            @click="verify()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-7 is-offset-3">
                        <div class="card">
                            <div class="card-content">
                                <div class="columns">
                                    <div class="column is-4">
                                        <a href="{{ route('blv.index') }}" target="_blank" class="button is-justify-content-center is-primary is-fullwidth is-outlined">Logs</a>
                                    </div>
                                    <div class="column is-4">
                                        <a href="{{ route('telescope') }}" target="_blank" class="button is-justify-content-center is-primary is-fullwidth is-outlined">Telescope</a>
                                    </div>
                                    <div class="column is-4">
                                        <a href="{{ route('admin.excel.export') }}" target="_blank" class="button is-justify-content-center is-primary is-fullwidth is-outlined">Exporter</a>
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

@push('start')
    @vite('resources/js/alpine.js')
@endpush

@push('end')
    <script>
        const initData = () => ({
            code: null,
            verify: async function() {
                const { data } = await axios.post("{{ route('admin.code.verify') }}", {
                    code: this.code
                });
                console.log(data)
            }
        });
    </script>
@endpush
