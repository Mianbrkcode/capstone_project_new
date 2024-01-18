<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">E-Ligtas</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Admin Elements
            </li>
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="fa-solid fa-chart-line"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('sector.contacts') }}" class="sidebar-link">
                    <i class="fa-solid fa-phone"></i>
                    Hotlines
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('sector.reports') }}" class="sidebar-link">
                    <i class="fa-solid fa-check-to-slot"></i>
                    Accepted Reports
                </a>
            </li>
        </ul>
    </div>
</aside>
