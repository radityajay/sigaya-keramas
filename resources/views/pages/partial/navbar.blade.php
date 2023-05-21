<header class="fixed-top main-header header-white header-logo-center" id="waituk-main-header">
    <div id="nav-section">
        
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
                        {{-- <li>
                                <a href="#" class="nav-search-link"><span class="icon-search"></span></a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>