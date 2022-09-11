<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <img src="https://bulma.io/images/bulma-logo.png" alt="Ethereal, a silver jubilee cultural event at KCG College of Technology" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-end">
                <a class="navbar-item" href="{{ route('dashboard.show') }}">
                    Dashboard
                </a>
                @auth
                    <a class="navbar-item" href="{{ route('auth.logout') }}">
                        <button
                            class="button is-danger is-outlined"
                        >Logout</button>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

@push('end')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // Get all "navbar-burger" elements
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });

        });
    </script>
@endpush
