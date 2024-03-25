        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Sidebar header -->
                <div class="sidebar-section">
                    <div class="sidebar-section-body d-flex justify-content-center">
                        <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                        <div>
                            <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="ph-arrows-left-right"></i>
                            </button>

                            <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                                <i class="ph-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /sidebar header -->


                <!-- Main navigation -->
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" id="navbar-nav" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item-header pt-0">
                            <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                            <i class="ph-dots-three sidebar-resize-show"></i>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="index" class="nav-link">
                                <i class="ph-house"></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                             <ul class="nav-group-sub collapse">
                                <li class="nav-item"><a href="{{ route('etao.dashboard') }}" class="nav-link"><i class="ph-diamonds-four"></i>Termination and Offboarding</a></li>
                                <li class="nav-item"><a href="{{ route('esaf.dashboard') }}" class="nav-link"><i class="ph-diamonds-four"></i>Employee Survey and Feedback</a></li>
                            </ul>
                        </li>

                        <!-- Forms -->
                        <li class="nav-item-header">
                            <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Termination and Offboarding</div>
                            <i class="ph-dots-three sidebar-resize-show"></i>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a class="nav-link">
                                <i class="ph-user-circle-minus"></i>
                                <span>Offboarding</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item"><a href="{{ route('offboarding.page') }}" class="nav-link"><i class="ph-table"></i>Offboarding Table</a></li>
                                <li class="nav-item"><a href="{{ route('requests.page') }}" class="nav-link">
                                <i class="ph-clipboard-text"></i>
                                <span>Requests</span>
                            </a>
                        </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('termination.page') }}" class="nav-link">
                                <i class="ph-user-circle-gear"></i>
                                <span>Termination</span>
                            </a>
                        </li>

                        <!-- Employee Surveys and Feedback -->
                        <li class="nav-item-header">
                            <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Employee Surveys and Feedback</div>
                            <i class="ph-dots-three sidebar-resize-show"></i>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-clipboard"></i>
                                <span>Survey</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item"><a href="#" class="nav-link"><i class="ph-pencil-simple-line"></i>Create Survey</a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="ph-table"></i>Survey Table</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-clipboard-text"></i>
                                <span>Feedback</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item"><a href="#" class="nav-link"><i class="ph-table"></i>Employee Responses Table</a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="ph-chart-bar-horizontal"></i>Survey Analytics</a></li>
                            </ul>
                        </li>
                        <!-- /forms -->

                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->
