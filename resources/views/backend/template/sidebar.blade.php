<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!--    <a href="index3.html" class="brand-link">
            <img src="{{ (asset('public/backend/img/AdminLTELogo.png')) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>-->

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard')}}" class="nav-link {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('advertisement.index')}}" class="nav-link {{ (request()->segment(2) == 'advertisement') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-link"></i>
                        <p>
                            Advertisement
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('menu-category.index')}}" class="nav-link {{ (request()->segment(2) == 'menu-category') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-sitemap"></i>
                        <p>
                            Menu Category
                        </p>
                    </a>
                </li>

                <!--                <li class="nav-item has-treeview {{ (request()->segment(3) == 'role') ? 'menu-open' : '' }}
                                                                 {{ (request()->segment(3) == 'user') ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link {{ (request()->segment(3) == 'role') ? 'active' : '' }}
                                                                {{ (request()->segment(3) == 'user') ? 'active' : '' }}">
                                        <i class="nav-icon fa fa-cogs"></i>
                                        <p>
                                            Management Role
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('data.index')}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Manage Data</p>
                                            </a>
                                        </li>
                
                                        <li class="nav-item">
                                            <a href="{{ route('role.index')}}" class="nav-link {{ (request()->segment(3) == 'role') ? 'active' : '' }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Manage Role</p>
                                            </a>
                                        </li>
                
                                        <li class="nav-item">
                                            <a href="{{ route('user.index')}}" class="nav-link {{ (request()->segment(3) == 'user') ? 'active' : '' }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Manage User</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>-->


                <li class="nav-item">
                    <a href="{{ route('news.index')}}" class="nav-link {{ (request()->segment(2) == 'news') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            News
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('social.index')}}" class="nav-link {{ (request()->segment(2) == 'social') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-paper-plane"></i>
                        <p>
                            Social Media
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('video.index')}}" class="nav-link {{ (request()->segment(2) == 'video') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-film"></i>
                        <p>
                            Video
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ (request()->segment(2) == 'footer') ? 'menu-open' : '' }}
                    {{ (request()->segment(2) == 'general') ? 'menu-open' : '' }}
                    {{ (request()->segment(2) == 'seo') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->segment(2) == 'footer') ? 'active' : '' }}
                       {{ (request()->segment(2) == 'general') ? 'active' : '' }}
                       {{ (request()->segment(2) == 'seo') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Setting Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('footer.index')}}" class="nav-link {{ (request()->segment(2) == 'footer') ? 'active' : '' }}">
                                <i class="fa fa-random"></i>
                                <p>Footer Setting</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('general.index')}}" class="nav-link {{ (request()->segment(2) == 'general') ? 'active' : '' }}">
                                <i class="fa fa-globe"></i>
                                <p>General Setting</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('seo.index')}}" class="nav-link {{ (request()->segment(2) == 'seo') ? 'active' : '' }}">
                                <i class="fa fa-wrench"></i>
                                <p>Seo Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>