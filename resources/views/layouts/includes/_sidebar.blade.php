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
            <li class="start {{ (Request::is(getUrlFromRoute('dashboard.index')) || Request::is('/')) ? 'active open' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <i class="icon-graph"></i>
                    <span class="title">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item start {{ (Request::is(getUrlFromRoute('achat.index')) || Request::is(getUrlFromRoute('achat.create'))) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cart-plus"></i>
                    <span class="title">Achats</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('achat.index')) ? 'active' : '' }}">
                        <a href="{{ route('achat.index') }}" class="nav-link ">
                            <i class="fa fa-cart-plus"></i>
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
                    <i class="fa icon-ghost"></i>
                    <span class="title">Bovins</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('bovin.index')) ? 'active' : '' }}">
                        <a href="{{ route('bovin.index') }}" class="nav-link ">
                            <i class="icon-ghost"></i>
                            <span class="title">Liste des bovins</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="start {{ Request::is(getUrlFromRoute('available-bovin')) ? 'active open' : '' }}">
                <a href="{{ route('available-bovin') }}">
                    <i class="icon-diamond"></i>
                    <span class="title">Préparation au vente</span>
                </a>
            </li>
            <li class="nav-item start {{ (Request::is(getUrlFromRoute('visite.index')) || Request::is(getUrlFromRoute('visite.create'))) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-stethoscope"></i>
                    <span class="title">Visites</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('visite.index')) ? 'active' : '' }}">
                        <a href="{{ route('visite.index') }}" class="nav-link ">
                            <i class="fa fa-stethoscope"></i>
                            <span class="title">Liste des visites</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('visite.create')) ? 'active' : '' }}">
                        <a href="{{ route('visite.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">Nouvelle visite</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="start {{ Request::is(getUrlFromRoute('nourriture.create')) ? 'active open' : '' }}">
                <a href="{{ route('nourriture.create') }}">
                    <i class="icon-graph"></i>
                    <span class="title">Nourritures</span>
                </a>
            </li>
            <li class="nav-item start {{ (Request::is(getUrlFromRoute('veterinaire.index')) || Request::is(getUrlFromRoute('veterinaire.create'))) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user-md"></i>
                    <span class="title">Veterinaire</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('veterinaire.index')) ? 'active' : '' }}">
                        <a href="{{ route('veterinaire.index') }}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Liste des veterinaires</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('veterinaire.create')) ? 'active' : '' }}">
                        <a href="{{ route('veterinaire.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">Nouveau veterinaire</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start {{ (Request::is(getUrlFromRoute('pert.index')) || Request::is(getUrlFromRoute('pert.create'))) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-trash"></i>
                    <span class="title">Pert</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('pert.index')) ? 'active' : '' }}">
                        <a href="{{ route('pert.index') }}" class="nav-link ">
                            <i class="fa fa-trash"></i>
                            <span class="title">Liste des Pert</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('pert.create')) ? 'active' : '' }}">
                        <a href="{{ route('pert.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">Nouveau pert</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start {{ (Request::is(getUrlFromRoute('fournisseur.index')) || Request::is(getUrlFromRoute('fournisseur.create'))) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Fournisseurs</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('fournisseur.index')) ? 'active' : '' }}">
                        <a href="{{ route('fournisseur.index') }}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Liste des fournisseurs</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('fournisseur.create')) ? 'active' : '' }}">
                        <a href="{{ route('fournisseur.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">Nouveau fournisseur</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Depances</h3>
            </li>
            <li class="nav-item start {{ (Request::is(getUrlFromRoute('stockelement.index')) || Request::is(getUrlFromRoute('stockelement.create'))) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="con-social-dropbox"></i>
                    <span class="title">Gestion du stock</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('stockelement.index')) ? 'active' : '' }}">
                        <a href="{{ route('stockelement.index') }}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Stocks</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Request::is(getUrlFromRoute('stockelement.create')) ? 'active' : '' }}">
                        <a href="{{ route('stockelement.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">Nouveau element</span>
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