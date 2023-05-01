<header class="fixed-top main-header header-white header-logo-center" id="waituk-main-header">
    <div id="nav-section">
        <div class="mega-menus top-header">
            <nav class="p-static bg-gray-dark hidden-md-down">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden-xs float-left text-center-sm no-float-sm no-padding">
                            <ul class="i-list i-list-i-block i-list-i-block-sm i-list-i-block-no-hover pad-0-sm margin-bottom-0 float-left text-center">
                                <li>
                                    <div class="dropdown mini-nav">
                                        <a href="tel:9851108896" class="nav-link"><span class="custom-icon-phone-ring"></span> 9851108896</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown mini-nav mini-nav-no-bg-hover">
                                        <a href="mailto:youremail@waituk.com" class="nav-link"><span class="custom-icon-email1"></span> youremail@waituk.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 float-right hidden-xs pad-right-0">
                            <ul class="i-list i-list-i-block i-list-i-block-sm i-list-i-block-no-hover pad-0-sm margin-bottom-0 float-right">
                                {{-- <li>
                                    <div class="dropdown mini-nav mini-nav-no-bg-hover">
                                        <a href="#"> <span class="custom-icon-user"></span> Login </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown mini-nav mini-nav-no-bg-hover">
                                        <a href="#"> <span class="custom-icon-dollar"></span> USD </a>
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="dropdown mini-nav mini-nav-no-bg-hover">
                                        <a href="#"> EN </a>
                                        <ul class="dropdown-menu pad-small no-border-radius hidden-xs fadeIn">
                                            <li><a href="#" class="pad-narrow"> GB </a></li>
                                            <li><a href="#" class="pad-narrow"> DE </a></li>
                                            <li><a href="#" class="pad-narrow"> FR </a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="bottom-header container mega-menus" id="mega-menus">
            <nav class="navbar navbar-toggleable-md no-border-radius no-margin mega-menu-multiple flex-column" id="navbar-inner-container">
                <form action="mega-menu-5.html" id="top-search" class="no-margin top-search">
                    <div class="form-group no-margin">
                        <input class="form-control no-border" id="search_term" name="search_term" placeholder="Type & Press Enter" type="text">
                    </div>
                </form>
                <button type="button" class="navbar-toggler navbar-toggler-left" data-toggle="collapse" data-target="#mega-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand  justify-content-between mr-auto m-sm-auto" href="index.html"> <img src="{{ asset('assets/front/img/logo-dark.svg') }}" alt="SIGAYA"> </a>
                <div class="collapse navbar-collapse justify-content-center" id="mega-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/') }}" data-title="Home"> Beranda </a>
                        </li>
                        <li>
                            <a href="{{ route('list.cagarbudaya') }}" data-title="Home"> Cagar Budaya </a>
                        </li>
                        <li>
                            <a href="#"> Tentang Kami </a>
                        </li>
                        {{-- <li>
                                <a href="#" class="nav-search-link"><span class="icon-search"></span></a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>