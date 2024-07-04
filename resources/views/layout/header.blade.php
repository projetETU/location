
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>MADA-IMMO </h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('adminDashboard') }}" class="nav-item nav-link {{ request()->is('admin/Dashboard') ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->is('admin/TypeDeBien')  ? 'active' : '' }}"  {{ request()->is('admin/commission') ? 'active' : '' }}" data-bs-toggle="dropdown">
                            <i class="fa fa-laptop me-2"></i>Elements
                        </a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('formLocation') }}" class="dropdown-item {{ request()->is('admin/Location') ? 'active' : '' }}">Location</a>
                            <a href="{{ route('formTypeDeBien') }}" class="dropdown-item {{ request()->is('admin/TypeDeBien') ? 'active' : '' }}">Type de Biens</a>
                            <a href="{{ route('formcommission') }}" class="dropdown-item {{ request()->is('admin/commission') ? 'active' : '' }}">Commission</a>

                    </div>


                    </div>
                </div>
            </nav>
        </div>
     </div>
</div>
