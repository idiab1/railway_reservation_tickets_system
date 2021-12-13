<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            {{$setting->web_name}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav m-auto">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">
                        {{ trans('site.home') }}
                    </a>
                </li>

                <!-- About us -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ trans('site.about_us') }}
                    </a>
                </li>

                <!-- Contact us -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.page')}}">
                        {{ trans('site.contact_us') }}
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item dropdown-globe globe-icon">
                    <a href="#" class="dropdown-toggle dropdown-menu-right nav-link" data-toggle="dropdown">
                        <i class="fas fa-globe"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <span>{{ $properties['native'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                {{ trans('site.login') }}
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                {{ trans('site.register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <!-- Setting link -->
                            <a class="dropdown-item" href="{{route('profile.setting')}}">
                                {{ trans('site.setting') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ trans('site.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- End of navbar -->
