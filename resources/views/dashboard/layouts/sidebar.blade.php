<div>
    <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
        aria-controls="MobNav">
        <i class="fas fa-bars me-2"></i>Dashboard Navigation
    </a>
    <div class="collapse" id="MobNav">
        <div class="dashboard-nav">
            <div class="dashboard-inner">
                <ul data-submenu-title="Candidate">
                    <li
                        class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="lni lni-dashboard me-2"></i>Dashboard
                        </a>
                    </li>
                    <li
                        class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'user.bookmark-jobs' ? 'active' : '' }}">
                        <a href="{{ route('user.bookmark-jobs') }}">
                            <i class="lni lni-bookmark me-2"></i>Bookmark Jobs
                        </a>
                    </li>
                    <li
                        class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'user.appliedJob' ? 'active' : '' }}">
                        <a href="{{ route('user.appliedJob') }}">
                            <i class="lni lni-briefcase me-2"></i>Applied jobs
                        </a>
                    </li>
                </ul>
                <ul data-submenu-title="Employer">
                    <li
                        class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'post-job' ? 'active' : '' }}">
                        <a href="{{ route('post-job') }}"><i class="lni lni-circle-plus me-2"></i>Post New Job</a>
                    </li>
                    <li
                        class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'user.manage-jobs' ? 'active' : '' }}">
                        <a href="{{ route('user.manage-jobs') }}">
                            <i class="lni lni-add-files me-2"></i>Manage Jobs
                        </a>
                    </li>
                    <li
                        class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'user.manage-applicant' ? 'active' : '' }}">
                        <a href="{{ route('user.manage-applicant') }}">
                            <i class="lni lni-briefcase-alt me-2"></i>Manage Applicant
                        </a>
                    </li>
                </ul>
                <ul data-submenu-title="My Accounts">
                    <li
                        class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'myProfile' ? 'active' : '' }}">
                        <a href="{{ route('myProfile') }}"><i class="lni lni-user me-2"></i>My Profile
                        </a>
                    </li>
                    <li
                        class="{{ \Illuminate\Support\Facades\Route::currentRouteName() === 'change-password' ? 'active' : '' }}">
                        <a href="{{ route('change-password') }}"><i class="lni lni-lock-alt me-2"></i>Change
                            Password</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class="lni lni-power-switch me-2"></i>Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
