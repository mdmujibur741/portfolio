<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('portfolio.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{-- //main --}}
    <li class="nav-item">
        <a class="nav-link" href="{{route('portfolio.main')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Main</span></a>
    </li>

    {{-- servises --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Servises</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               
                <a class="collapse-item" href="{{route('portfolio.service.create')}}">Create Service</a>
                <a class="collapse-item" href="{{route('portfolio.service.index')}}">Service list</a>

            </div>
        </div>
    </li>

    {{-- portfolio --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages99"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Portfolio</span>
        </a>
        <div id="collapsePages99" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               
                <a class="collapse-item" href="{{route('portfolio.sec.create')}}">Create Portfolio Item</a>
                <a class="collapse-item" href="{{route('portfolio.sec.index')}}">Portfolio list</a>
            </div>
        </div>
    </li>

      {{-- about --}}
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages100"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-user"></i>
            <span>About</span>
        </a>
        <div id="collapsePages100" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               
                <a class="collapse-item" href="{{route('portfolio.about.create')}}">Create About Item</a>
                <a class="collapse-item" href="{{route('portfolio.about.index')}}">About Manage</a>
            </div>
        </div>
    </li>

    <!-- Contact Message -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('portfolio.contact.index')}}">
            {{-- <i class="fas fa-fw fa-chart-area"></i> --}}
            <i class="fas fa-fw fa-address-card"></i>
            <span>Contact</span></a>
    </li>
     
    {{-- logout --}}
    {{-- <li class="nav-item">
    <a class="nav-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
     {{ __('Logout') }}
 </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
     @csrf
 </form>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          
            <i class="fas fa-fw fa-address-card"></i>
            <span>Logout</span></a>

            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
              @csrf
            </form>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->