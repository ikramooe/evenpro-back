<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
            </button>
        </div>
    </div>
    
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span>
                            <span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                </li>

                <!-- Services Management -->
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#services" role="button" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('admin.services.*') ? 'true' : 'false' }}" aria-controls="services">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fas fa-concierge-bell"></span></span>
                            <span class="nav-link-text ps-1">Services</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ request()->routeIs('admin.services.*') ? 'show' : '' }}" id="services">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.services.index') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">All Services</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.services.create') ? 'active' : '' }}" href="{{ route('admin.services.create') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Add New Service</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Home Sections Management -->
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#home-sections" role="button" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('admin.home-sections.*') ? 'true' : 'false' }}" aria-controls="home-sections">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fas fa-home"></span></span>
                            <span class="nav-link-text ps-1">Home Sections</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ request()->routeIs('admin.home-sections.*') ? 'show' : '' }}" id="home-sections">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.home-sections.edit') ? 'active' : '' }}" href="{{ route('admin.home-sections.edit') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">All Home Sections</span>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <!-- about management -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.about-sections') ? 'active' : '' }}" href="{{ route('admin.about-sections.edit') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fas fa-info-circle"></span></span>
                            <span class="nav-link-text ps-1">About Sections</span>
                        </div>
                    </a>
                </li>
                <!-- Events Management -->
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('admin.events.*') ? 'true' : 'false' }}" aria-controls="events">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fas fa-calendar-alt"></span></span>
                            <span class="nav-link-text ps-1">Events</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ request()->routeIs('admin.events.*') ? 'show' : '' }}" id="events">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.events.index') ? 'active' : '' }}" href="{{ route('admin.events.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">All Events</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.events.create') ? 'active' : '' }}" href="{{ route('admin.events.create') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Add New Event</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- settings management -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fas fa-cog"></span></span>
                            <span class="nav-link-text ps-1">Settings</span>
                        </div>
                    </a>
                </li>

                <!-- registration management -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.registration') ? 'active' : '' }}" href="/admin/registrations">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fas fa-user"></span></span>
                            <span class="nav-link-text ps-1">Registration</span>
                        </div>
                    </a>
                </li>

                
            </ul>
        </div>
    </div>
</nav>
