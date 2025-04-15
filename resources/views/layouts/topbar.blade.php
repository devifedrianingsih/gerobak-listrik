<!--start header-->
<header class="top-header">
  <nav class="navbar navbar-expand align-items-center gap-4">
     <div class="btn-toggle">
        <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
     </div>
     <div class="search-bar flex-grow-1">
        <!-- Search bar section -->
     </div>
     <ul class="navbar-nav gap-1 nav-right-links align-items-center">
        {{-- <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
              data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">notifications</i>
              <span class="badge-notify">5</span>
           </a>
           <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
              <!-- Notifications section -->
              <div class="notify-list">
                 <div>
                    <a class="dropdown-item border-bottom py-2" href="javascript:;">
                       <div class="d-flex align-items-center gap-3">
                          <div class="">
                             <img src="https://placehold.co/110x110/png" class="rounded-circle" width="45" height="45" alt="">
                          </div>
                          <div class="">
                             <!-- Menampilkan nama pengguna jika sudah login -->
                             @if(Auth::check())
                                <h5 class="notify-title">Selamat {{ Auth::user()->name }}!</h5>
                                <p class="mb-0 notify-desc">Selamat {{ Auth::user()->name }} penjualan hari ini memenuhi target.</p>
                             @else
                                <h5 class="notify-title">Selamat datang!</h5>
                                <p class="mb-0 notify-desc">Harap login untuk melihat informasi lebih lanjut.</p>
                             @endif
                             <p class="mb-0 notify-time">Hari Ini</p>
                          </div>
                          <div class="notify-close position-absolute end-0 me-3">
                             <i class="material-icons-outlined fs-6">close</i>
                          </div>
                       </div>
                    </a>
                 </div>
                 <!-- Other notifications here -->
              </div>
           </div>
        </li> --}}

        <!-- Profile dropdown -->
        <li class="nav-item dropdown">
           <a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
              <img src="https://placehold.co/110x110/png" class="rounded-circle p-1 border" width="45" height="45" alt="">
           </a>
           <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
              <a class="dropdown-item gap-2 py-2" href="javascript:;">
                 <div class="text-center">
                    <img src="https://placehold.co/110x110/png" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                       alt="">
                    <!-- Menampilkan nama pengguna jika sudah login -->
                    @if(Auth::check())
                       <h5 class="user-name mb-0 fw-bold">Hello, {{ Auth::user()->name }}</h5>
                    @else
                       <h5 class="user-name mb-0 fw-bold">Guest</h5>
                    @endif
                 </div>
              </a>
              <hr class="dropdown-divider">
              <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="user-profile">
                 <i class="material-icons-outlined">person_outline</i>Profil
              </a>
              <hr class="dropdown-divider">
              <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:void(0);" 
                 onclick="document.getElementById('logout-form').submit()">
                 <i class="material-icons-outlined">power_settings_new</i>Keluar
              </a>
              <form action="{{ route('logout') }}" method="POST" id="logout-form">
                 @csrf
              </form>
           </div>
        </li>
     </ul>
  </nav>
</header>
<!--end top header-->
