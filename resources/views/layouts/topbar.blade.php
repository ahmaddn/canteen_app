<div class="nav-header">
    <a href="#" class="brand-logo">
        <img src="{{ asset('images/C.png') }}" alt="" class="logo-abbr" width="90" height="40"
            viewbox="0 0 55 55">
        <div class="brand-title">
            <h2 class="">Canteen</h2>
            <span class="brand-sub-title">{{ Auth::user()->email }}</span>
        </div>
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<div class="header border-bottom">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        Dashboard
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/logocanteen.png') }}" width="56" alt="user profile" />
                        </a>

                        <div class="dropdown-menu dropdown-menu-end shadow-sm rounded-3 p-2" style="min-width: 160px;">

                            <!-- Profile -->
                            <a href="app-profile.html" class="dropdown-item d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                <span>Profile</span>
                            </a>

                            <!-- Logout -->
                            <form action="{{ route('sign-out') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item d-flex align-items-center gap-2 text-start w-100 bg-transparent border-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                        height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                        <polyline points="16 17 21 12 16 7" />
                                        <line x1="21" y1="12" x2="9" y2="12" />
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </form>

                        </div>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</div>
