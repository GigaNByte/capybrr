<aside class="aside is-placed-left is-expanded">
    <div class="flex justify-center">
            <x-icon-capybara/>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">{{ __('General') }}</p>
        <ul class="menu-list">
            <li class="active">
                <a href="{{route('admin.dashboard')}}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">{{ __('Dashboard') }}</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">{{ __('Overview') }}</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="{{route('admin.dashboard.users')}}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">{{ __('Users') }}</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
                <a href="{{route('admin.dashboard.matches')}}">
                    <span class="icon"><i class="mdi mdi-heart"></i></span>
                    <span class="menu-item-label">{{ __('Matches') }}</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">{{ __('About') }}</p>
        <ul class="menu-list">
            <li>
                <a href="https://justboil.me/tailwind-admin-templates/free-dashboard/" class="has-icon">
                    <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                    <span class="menu-item-label">{{ __('About Dashboard') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ config('app.github', 'https://github.com/GigaNByte/capybrr') }}" class="has-icon">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span class="menu-item-label">{{ __('Capibrr on GitHub') }}</span>
                </a>
            </li>
        </ul>
    </div>
</aside>


