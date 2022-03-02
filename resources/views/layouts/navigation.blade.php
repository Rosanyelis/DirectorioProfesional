<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ url('dashboard') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="list-divider"></li>

                <li class="nav-small-cap"><span class="hide-menu">MÓDULOS</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-building"></i>
                        <span class="hide-menu">Negocios</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow active" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span class="hide-menu">Configuraciones</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line in">
                        <li class="sidebar-item">
                            <a href="{{ url('ciudades') }}" class="sidebar-link">
                                <span class="hide-menu"> Ciudades</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('sectores') }}" class="sidebar-link">
                                <span class="hide-menu"> Sectores</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('categorias') }}" class="sidebar-link">
                                <span class="hide-menu"> Categorías</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('subcategorias') }}" class="sidebar-link">
                                <span class="hide-menu"> Subcategorias</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
