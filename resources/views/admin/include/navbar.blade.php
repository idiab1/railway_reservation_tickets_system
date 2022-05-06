<!-- Navbar -->
<nav class="main-header navbar navbar-expand ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link icon-bars" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <!-- Overview -->
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{route('home')}}" target="_blank">{{ trans('site.overview') }}</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{route('setting.edit', ['id' => $setting->id])}}">{{ trans('site.system_settings') }}</a>
        </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3 mr-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="{{ trans('site.search') }}" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="mdi mdi-magnify" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav {{app()->getLocale() == 'ar' ? "mr-auto" : "ml-auto"}}">

        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> --}}

        <!-- Add new button -->
        <li class="nav-item dropdown add-new">
            <a class="nav-link btn btn-secondaryy btn-add-new dropdown-toggle"
                id="navbarDropdown" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                <!-- Icon -->
                <i class="fas fa-plus"></i>
                {{-- {{ trans('site.add_new') }} --}}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <!-- Dropdown menu links -->
                <a class="dropdown-item" href="{{route('users.create')}}">
                    {{ trans('site.user') }}
                </a>
                <a class="dropdown-item" href="{{route('passengers.create')}}">
                    {{ trans('site.passenger') }}
                </a>
                <a class="dropdown-item" href="{{route('stations.create')}}">
                    {{ trans('site.station') }}
                </a>
                <a class="dropdown-item" href="{{route('trains.create')}}">
                    {{ trans('site.train') }}
                </a>
                <a class="dropdown-item" href="">
                    {{ trans('site.ticket') }}
                </a>
                <a class="dropdown-item" href="{{route('posts.create')}}">
                    {{ trans('site.post') }}
                </a>

            </div>
        </li>
        <!-- End of add new button -->

        <!-- Languages -->
        <li class="nav-item nav-language dropdown d-none d-md-block">
            <a class="nav-link pr-0 dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-language-icon d-inline-block">
                    @if (app()->getLocale() == 'en')
                        <i class="flag-icon flag-icon-us" title="us" id="us"></i>
                    @else
                        <i class="flag-icon flag-icon-eg" title="eg" id="eg"></i>
                    @endif
                </div>
                <div class="nav-language-text d-inline-block">
                    <p class="mb-1 text-black">
                        {{app()->getLocale() == 'en' ? trans('site.english') : trans('site.arabic')}}
                    </p>
                </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <div class="nav-language-text">
                            <p class="mb-1 text-black">{{ $properties['native'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </li>

        <!-- User dropdown -->
        <li class="nav-item dropdown user-dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <div class="image d-inline-block mr-2 ml-2">
                    <img class="img-circle border border-dark elevation-2" width="30px" src="{{asset("uploads/users/". Auth::user()->profile->image)}}" alt="User Image">
                </div>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                <!-- Setting -->
                <a class="dropdown-item" href="{{route('profile.setting')}}" target="_blank">
                    <i class="mdi mdi-account-cog" aria-hidden="true"></i>
                    {{ trans('site.setting') }}
                </a>

                <!-- Logout -->
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout" aria-hidden="true"></i>
                    {{ trans('site.logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        <!-- End of user dropdown -->



    </ul>
</nav>
<!-- /.navbar -->
