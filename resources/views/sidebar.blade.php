@section('sidebar')
    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">

                        <ul class="nav nav-main">
                            <li>
                                <a class="nav-link" href="{{ URL::to('/dashboard') }}">
                                    <i class="bx bx-home-alt" aria-hidden="true"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="bx bx-file" aria-hidden="true"></i>
                                    <span>Papers</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('paper') }}">
                                            Submit Papers
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('bid') }}">
                                            Bid Papers
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('review') }}">
                                            Review Papers
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="bx bx-user" aria-hidden="true"></i>
                                    <span>Users</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{ URL::to('admin') }}">
                                            Manage User
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="bx bx-cog" aria-hidden="true"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="#">
                                            Menu Items
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#">
                                            Role Permission
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                </div>

                <script>
                    // Maintain Scroll Position
                    if (typeof localStorage !== 'undefined') {
                        if (localStorage.getItem('sidebar-left-position') !== null) {
                            var initialPosition = localStorage.getItem('sidebar-left-position'),
                                sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                            sidebarLeft.scrollTop = initialPosition;
                        }
                    }
                </script>

            </div>

        </aside>
        <!-- end: sidebar -->
@endsection
