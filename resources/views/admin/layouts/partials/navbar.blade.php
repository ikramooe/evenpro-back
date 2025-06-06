<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
    </button>

    <a class="navbar-brand me-1 me-sm-3" href="{{ route('admin.dashboard') }}">
        <div class="d-flex align-items-center">
            <img class="me-2" src="/assets/admin/logo.png" alt="" width="40" />
            <span class="font-sans-serif">{{ config('app.name') }}</span>
        </div>
    </a>

    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
        <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns"></ul>
    </div>

    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
        <!-- Language Switcher -->
       

        <!-- User -->
        <li class="nav-item dropdown">
            <a class="nav-link pe-0" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="/assets/admin/user.png" alt="" />
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <span class="dropdown-item-text">{{ auth()->user()->name }}</span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
    </ul>
</nav>
