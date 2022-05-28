<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item dropdown has-divider has-user-avatar">
                <a class="navbar-link" href="{{route("user.dashboard")}}">
                    <div class="user-avatar">
                        <img src="{{$user->info->getProfileImage()}}" alt="{{$user->name}}"
                             class="rounded-full">
                    </div>

                    <div class="is-user-name"><span>{{$user->name}}</span></div>
                </a>
            </div>
            <a href="{{route("user.app")}}"  class="navbar-item"> <span class="icon"><x-icon-capybara/></span></a>
            <a href="{{ config('app.github', 'https://github.com/GigaNByte/capybrr') }}" class="navbar-item has-divider desktop-icon-only">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span>{{ __('GitHub') }}</span>
            </a>
            <a href="{{route('logout')}}" title="Log out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="navbar-item desktop-icon-only">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>{{ __('Log Out') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</nav>
