@section('header')
    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="../4.0.0" class="logo">
                <img src="{{ asset('img/logo.png') }}" width="75" height="35" alt="Porto Admin" />
            </a>

            <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
            </div>

        </div>

        <!-- start: search & user box -->
        <div class="header-right">
            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-bs-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="{{ asset('img/!logged-user.jpg') }}" alt="Joseph Doe" class="rounded-circle" data-lock-picture="{{ asset('img/!logged-user.jpg') }}" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">{{ session('user_details')['user']['name'] }}</span>
                        <span class="role">{{ session('user_details')['user']['type'] }}</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled mb-2">
                        <li class="divider"></li>
{{--                        <li>--}}
{{--                            <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="bx bx-user-circle"></i> My Profile</a>--}}
{{--                        </li>--}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a
                                    role="menuitem"
                                    tabindex="-1"
                                    href="{{ URL::to('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                >
                                    <i class="bx bx-power-off"></i> Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->
@endsection
