<nav id="navbar-main" class="navbar pl-0 is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-brand is-right">
        <div class="flex basis-full justify-center">
            <a href="{{route("user.dashboard")}}"  class="navbar-item"> <x-icon-capybara class="block h-full"/></a>
        </div>
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="flex w-full justify-center lg:justify-left">
            <div class=" hidden lg:flex basis-1/5">
            </div>
            <div class="hidden lg:flex  basis-3/5 justify-center">
                <a href="{{route("user.dashboard")}}"  class="navbar-item"> <x-icon-capybara class="block h-full"/></a>
            </div>
            <div class="flex lg:basis-1/5">
                <div class="navbar-item flex lg:justify-center dropdown has-divider has-user-avatar">
                    <a class="navbar-link" href="{{route("user.dashboard")}}">
                        <div class="user-avatar">

                            <img src="{{$user->info->getProfileImage()}}" alt="{{$user->name}}"
                                 class="rounded-full w-full">
                        </div>

                        <div class="is-user-name"><span>{{$user->name}}</span></div>
                    </a>
                </div>

                <a href="{{ config('app.github', 'https://github.com/GigaNByte/capybrr') }}" class="navbar-item has-divider desktop-icon-only flex sm:justify-center">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span>{{ __('GitHub') }}</span>
                </a>
                <a href="{{route('logout')}}" title="Log out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="navbar-item desktop-icon-only flex sm:justify-center">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span>{{ __('Log Out') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</nav>
