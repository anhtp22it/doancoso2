<div class="header">
    <div class="container">
        <nav class="navbar navbar-expand-xl p-0">
            <a class="navbar-brand" href="{{ '/' }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" />
            </a>
            <button class="navbar-toggler d-xl-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="lni lni-menu fw-bold fs-4 border-dark"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">
                            Home <i class="ti-angle-double-down fs-"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/job-search') }}">
                            Find Job <i class="ti-angle-double-down fs-"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav nav-right me-0 mb-lg-0 float-end">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="lni lni-user me-2"></i>{{ __('Login') }}
                                </a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                    <li class="addlisting nav-item">
                        <a class="nav-link" href="{{ route('post-job') }}">
                            <i class="lni lni-circle-plus me-1"></i>
                            Post a Job
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
