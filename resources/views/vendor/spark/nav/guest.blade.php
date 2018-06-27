<nav class="navbar navbar-inverse navbar-fixed-top hidden">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <div class="hamburger">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Branding Image -->
            @include('spark::nav.brand')
        </div>

        <div class="collapse navbar-collapse" id="spark-navbar-collapse">

        <ul class="nav navbar-nav navbar-right">

            <li><a href="/login">{{ __('common.login') }}</a></li>
            <li><a href="/register">{{ __('common.signup') }}</a></li>

        </ul>

        </div>
    </div>
</nav>
