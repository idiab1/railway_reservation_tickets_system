<!-- Navbar -->
<nav class="navbar navbar-expand-md fixed-top navbar-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            {{$setting->web_name}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Languages -->
                <li class="nav-item nav-language dropdown d-none d-md-block dropdown-globe globe-icon">
                    <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
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
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <div class="nav-language-text">
                                    <p class="mb-1 text-black">{{ $properties['native'] }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
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
                    <li class="nav-item dropdown dropdown-profile">

                        <!-- User image -->
                        <div class="user-image d-inline-block mx-2">
                            <img class="rounded-circle border border-dark elevation-2"
                                src="{{asset('uploads/users/' . Auth::user()->profile->image)}}"
                                alt="{{ Auth::user()->name }}" width="30px">
                        </div>
                        <!-- End of user image -->
                        <a  class="nav-link dropdown-toggle d-inline-block" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <!-- Setting link -->
                            <a class="dropdown-item d-inline-block" href="{{route('profile.setting')}}">
                                <div class="icon mr-1 d-inline-block">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                {{ trans('site.setting') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <div class="icon mr-1 d-inline-block">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
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

