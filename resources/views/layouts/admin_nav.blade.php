<nav class="navbar  navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <h3 class="m-2">{{ auth()->user()->userfrom}}</h3>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <div id="autorefresh">
                <a href="{{ route('reports') }}" class="btn link iconNotif">
                    <i class="bi bi-bell"></i>{{ $totalActiveReport }}
                </a>
            </div>
            <p class="m-2">{{ auth()->user()->responder_name}}</p>
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    @if (Auth::User()->userfrom === 'MDRRMO')
                        <img src="{{ asset('images/rescuer_img.png') }}" class="avatar img-fluid rounded" alt="">
                    @elseif ( Auth::User()->userfrom === 'PNP')
                        <img src="{{ asset('images/police.png') }}" class="avatar img-fluid rounded" alt="">
                    @elseif ( Auth::User()->userfrom === 'BFP')
                        <img src="{{ asset('images/fireman.png') }}" class="avatar img-fluid rounded" alt="">
                    @else
                        <img src="{{ asset('images/normal_user.jpg') }}" class="avatar img-fluid rounded" alt="">
                    @endif
 
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{route('admin_profile')}}" class="dropdown-item">Profile</a>
                    <a href="{{ route('settings.index') }}" class="dropdown-item">Settings</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                        @csrf

                        <a class="dropdown-item"
                            onclick="event.preventDefault();
                        this.closest('form').submit();"
                            type="submit">Logout</a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>


<script>
$(document).ready(function(){
    setInterval(function(){
        $("#autorefresh").load(window.location.href + " #autorefresh")
    }, 5000);
});

</script>
