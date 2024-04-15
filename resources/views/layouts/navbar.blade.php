    <!-- Main navbar -->
    <div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
        <div class="container-fluid">
            <div class="d-flex d-lg-none me-2">
                <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                    <i class="ph-list"></i>
                </button>
            </div>

            <div class="navbar-brand flex-1 flex-lg-0">
                <a href="index" class="d-inline-flex align-items-center">
                    <img src="{{ URL::asset('images/hrlogosvg.svg') }}" alt="svg_logo"
                        style="width:50px;height:50px;" />
                    <span class="d-none d-sm-inline-block h-30px ms-3 text-white"
                        style="font-family: Arial; font-size: 25px; font-weight:bold; text-decoration:none;">WORKFOLIO HUMAN RESOURCE</span>
                </a>
            </div>

            <ul class="nav flex-row justify-content-end order-1 order-lg-2">
                <li class="nav-item">
                    <a class="navbar-nav-link navbar-nav-link-icon rounded-pill animation" data-bs-toggle="offcanvas"
                        data-bs-target="#notifications">
                        <i class="ph-bell"></i>
                        <span id="notification-badge"
                            class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1"></span>
                    </a>
                </li>

                <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                    <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                        <div class="status-indicator-container">
                            @if(auth()->user()->image)
                                <img class="w-32px h-32px rounded-pill" alt=""
                                    src="{{ asset('storage/' . auth()->user()->image) }}"
                                    alt="Profile_Image">
                            @else
                                <img class="w-32px h-32px rounded-pill" alt=""
                                    src="{{ URL::asset('images/default-profile-picture.jpg') }}"
                                    alt="Default_Profile_Image">
                            @endif
                            <span class="status-indicator bg-success"></span>
                        </div>
                        <span class="d-none d-lg-inline-block mx-lg-2">Jefferson</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('profile.page') }}" class="dropdown-item">
                            <i class="ph-user-circle me-2"></i>
                            {{ __('My Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="ph-sign-out me-2"></i> {{ __('Logout') }}
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->
