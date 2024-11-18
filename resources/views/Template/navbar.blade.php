
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
              <span class="nav-link me-2 fs-5">{{ auth()->user()->name }}</span>
              <img src="{{ asset('SEODash/src/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <a onclick="confirmLogout();" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <script>
      function confirmLogout() {
        Swal.fire({
            title: "Yakin Logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Logout"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('logout') }}';
            }
        });
    }

    </script>
