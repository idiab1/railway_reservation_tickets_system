<!-- Footer -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Copyright -->
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!-- Logo Brand -->
                            <div class="logo-brand">
                                <h6 class="brand-name">{{$setting->web_name}}</h6>
                            </div>
                            <!-- ./end of logo Brand -->
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="copyright-info {{app()->getLocale() == "ar" ? "text-right" : "text-left" }}">
                                <p>&copy; 2022 {{ trans('site.copyright') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./end of copyright -->
            </div>
        </div> <!-- ./End of row -->
    </div>
</footer>
<!-- End Of Footer -->
