<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="{{ url('/') }}">E-Ligtas</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menus
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin_dashboard') }}" class="sidebar-link">
                    <i class="fa-solid fa-chart-line"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-file"></i>
                    Content Management
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{route('guidelines.index')}}" class="sidebar-link">
                            <i class="bi bi-bar-chart-steps"></i>
                                    Disaster Guidelines</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('hotlines.index')}}" class="sidebar-link">
                            <i class="fa-solid fa-phone"></i>
                                    Emergency Hotlines</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#reports" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-tower-broadcast"></i>
                    Reports
                </a>
                <ul id="reports" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('reports') }}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Pending
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('accepted_reports') }}" class="sidebar-link">
                            <i class="fa-solid fa-check-to-slot"></i>
                            Accepted
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('rejected_reports') }}" class="sidebar-link">
                            <i class="bi bi-folder-x"></i>
                            Rejected
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('completed.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-circle-check"></i>
                            Completed
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('users.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-users"></i>
                    User Management
                </a>
            </li>
        </ul>
    </div>
</aside>
