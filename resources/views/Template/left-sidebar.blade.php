<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between mb-3">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{ asset('SEOdash/src/assets/images/logos/SiRebon.png')}}" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
        @if (auth()->user()->level == "admin")
          <li class="sidebar-item mt-3">
            <a class="sidebar-link" href="{{ route('home')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Beranda</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('rekening.index')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:report-money" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Rekening Pembayaran Retribusi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('kategori-retribusi.index')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:info-circle" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Kategori Retribusi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('wajib-retribusi.index')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:user-screen" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Wajib Retribusi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('kapal.index')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:ship" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Kapal Wajib Retribusi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('pembayaran.index')}}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:user-dollar" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Pembayaran Retribusi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:report-analytics" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Laporan</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                <a href="./retribusi.html" class="sidebar-link">
                    <span><iconify-icon icon="tabler:arrow-big-right-filled"></iconify-icon></span>
                  <span class="hide-menu">Retribusi</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="./belum-bayar-retribusi.html" class="sidebar-link">
                    <span><iconify-icon icon="tabler:arrow-big-right-filled"></iconify-icon></span>
                  <span class="hide-menu">Belum Membayar Retribusi</span>
                </a>
              </li>
            </ul>
          </li>    
          <li class="sidebar-item">
            <a class="sidebar-link" onclick="confirmLogout();">
                <span>
                    <iconify-icon icon="tabler:logout" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Logout</span>
            </a>
        </li>        
        @endif
        @if (auth()->user()->level == "retribusi")
          <li class="sidebar-item mt-3">
            <a class="sidebar-link" href="{{ route('profil.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Profil</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('kategori-retribusi.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:info-circle" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Kategori Retribusi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('wajib-retribusi.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:anchor" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Kapalku</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('kapal.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:ship" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Kapal Wajib Retribusi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('konfirmasi-pembayaran.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:shopping-cart-check" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Konfirmasi Pembayaran Retribusi</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
              <span>
                <iconify-icon icon="tabler:report-analytics" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Laporan</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" onclick="confirmLogout();">
                <span>
                    <iconify-icon icon="tabler:logout" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Logout</span>
            </a>
        </li>
         
        @endif
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
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
