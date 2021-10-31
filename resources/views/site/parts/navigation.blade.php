<nav class="navbar navbar-expand-lg navbar-light bg-cloud text-uppercase font-weight-bold">
    <div class="container">
        <button class="navbar-toggler bg-blue2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars"></i></span>
        </button>
        
        @include('site.parts.usertopbtn',['mobile'=>true])
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./">{{ __('home.home') }} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{ __('home.nav_lichhoc') }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    {{ __('home.nav_lichthi') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{ __('home.nav_bangdiem') }}</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 d-none">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{ __('home.search') }}" aria-label="{{ __('home.search') }}" aria-describedby="mainnav-search">
                <div class="input-group-append">
                  <button class="btn bg-vang text-white" id="mainnav-search">{{ __('home.search') }}</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</nav>