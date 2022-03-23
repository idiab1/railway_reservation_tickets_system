<!-- Sidebar -->
<aside class="sidebar min-sidebar">
    <ul class="navbar-nav ml-auto">
        <!-- Home -->
        <li class="nav-item">
            <a class="nav-link text-center" href="{{route('home')}}">
                <div class="icon d-block">
                    <i class="fa fa-home"></i>
                </div>
                <span>{{ trans('site.home') }}</span>
            </a>
        </li>

        <!-- Tickets -->
        <li class="nav-item">
            <a class="nav-link text-center" href="{{route("user.tickets.index")}}">
                <div class="icon d-block">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <span>{{ trans('site.tickets') }}</span>
            </a>
        </li>

        <!-- News -->
        <li class="nav-item">
            <a class="nav-link text-center" href="">
                <div class="icon d-block">
                    <i class="fas fa-rss"></i>
                </div>
                <span>{{ trans('site.news') }}</span>
            </a>
        </li>


        <!-- Contact us -->
        <li class="nav-item">
            <a class="nav-link text-center" href="{{route('contact.page')}}">
                <div class="icon d-block">
                    <i class="fas fa-id-card-alt"></i>
                </div>
                <span>{{ trans('site.contact_us') }}</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End of Sidebar -->
