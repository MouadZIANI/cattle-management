<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <br>
            <li class="heading">
                <h3 class="uppercase">Metier</h3>
            </li>
            <li class="start">
                <a href="{{ url('/') }}">
                    <i class="icon-graph"></i>
                    <span class="title">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item start {{ (Request::is(getUrlFromRoute('achat.index')) || Request::is(getUrlFromRoute('achat.create'))) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Achats</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('achat.index')) ? 'active' : '' }}">
                        <a href="{{ route('achat.index') }}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Liste des achats</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('achat.create')) ? 'active' : '' }}">
                        <a href="{{ route('achat.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">Nouvelle achat</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start {{ (Request::is(getUrlFromRoute('bovin.index')) || Request::is(getUrlFromRoute('bovin.create'))) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Bovins</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('bovin.index')) ? 'active' : '' }}">
                        <a href="{{ route('bovin.index') }}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Liste des bovins</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('bovin.create')) ? 'active' : '' }}">
                        <a href="{{ route('bovin.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">Nouveau bovin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>