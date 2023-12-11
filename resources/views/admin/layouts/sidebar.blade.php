<div class="sidebar">
    <div class="sidebar__content">
        <header class="w-100 d-flex">
            <span class="d-flex logo-wrapper">
                <span class="header__logo h-100 d-flex align-items-center me-1">
                    <i class="fa fa-stream text-white"></i>
                </span>
                <span class="header__text d-flex flex-column text-light">
                    <span class="header-title">WorkPlex</span>
                    <span class="header-subtitle">Dashboard</span>
                </span>
            </span>
            <button class="sidebar-toggle transparent-btn">
                <i class="fa fa-caret-square-left text-white fs-4"></i>
            </button>
        </header>
        <hr class="bg-light my-3" />
        <main class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a
                        class="show-cat-btn {{ in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['admin.users', 'admin.roles']) ? 'active' : '' }}">
                        <i class="fa fa-user-circle"></i>
                        User Management
                        <span class="category__btn transparent-btn">
                            <i class="fa fa-chevron-circle-down"></i>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.users' ? 'active' : '' }}"
                                href="{{ route('admin.users') }}">
                                Users
                            </a>
                        </li>
                        <li>
                            <a class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.roles' ? 'active' : '' }}"
                                href="{{ route('admin.roles') }}">
                                Roles
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a
                        class="show-cat-btn {{ in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['admin.category', 'admin.job-types', 'admin.experience', 'admin.jobs']) ? 'active' : '' }}">
                        <i class="fa fa-edit"></i>Job Management
                        <span class="category__btn transparent-btn">
                            <i class="fa fa-chevron-circle-down"></i>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.jobs' ? 'active' : '' }}"
                                href="{{ route('admin.jobs') }}">Jobs</a>
                        </li>
                        <li>
                            <a class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.category' ? 'active' : '' }}"
                                href="{{ route('admin.category') }}">
                                Categories
                            </a>
                        </li>
                        <li>
                            <a class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.job-types' ? 'active' : '' }}"
                                href="{{ route('admin.job-types') }}">Job Types</a>
                        </li>
                        <li>
                            <a class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.experience' ? 'active' : '' }}"
                                href="{{ route('admin.experience') }}">Experiences</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </main>
    </div>
    <div class="sidebar__footer">
        <div class="sidebar-user d-flex py-1 ps-1 rounded-1">
            <div class="sidebar-user-img d-flex">
                <img style="width: 48px; height: 48px" class="rounded-circle"
                    src="{{ \Illuminate\Support\Facades\Auth::user()->getAvatarPath() }}" alt="" />
            </div>
            <div class="sidebar-user-info d-flex flex-column">
                <span class="sidebar-user-title">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                <span class="sidebar-user-subtitle">
                    {{ \Illuminate\Support\Str::title(\Illuminate\Support\Facades\Auth::user()->role->role) }} </span>
            </div>
        </div>
        <div class="mt-3">
            <a class="btn btn-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
