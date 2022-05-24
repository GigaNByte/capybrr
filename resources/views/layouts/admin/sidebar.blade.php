<aside class="aside is-placed-left is-expanded">
    <div class="flex justify-center">
            <x-icon-capybara/>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="active">
                <a href="index.html">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">{{ __('Overview') }}</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="tables.html">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">{{ __('Users') }}</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
                <a href="forms.html">
                    <span class="icon"><i class="mdi mdi-heart"></i></span>
                    <span class="menu-item-label">{{ __('Matches') }}</span>
                </a>
            </li>
            <li class="--set-active-profile-html">
                <a href="profile.html">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Profile</span>
                </a>
            </li>
            <li>
                <a href="login.html">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    <span class="menu-item-label">Login</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">About</p>
        <ul class="menu-list">
            <li>
                <a href="https://justboil.me/tailwind-admin-templates/free-dashboard/" class="has-icon">
                    <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                    <span class="menu-item-label">About</span>
                </a>
            </li>
            <li>
                <a href="{{ config('app.github', 'https://github.com/GigaNByte/capybrr') }}" class="has-icon">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span class="menu-item-label">GitHub</span>
                </a>
            </li>
        </ul>
    </div>
</aside>


