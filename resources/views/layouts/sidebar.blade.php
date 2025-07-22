<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GerList Sidebar</title>

    <!-- Link CSS tambahan -->
    <link href="{{ URL::asset('build/css/extra-icons.css') }}" rel="stylesheet">

    <!-- Link CSS lainnya -->
    <link href="{{ URL::asset('build/css/main.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Start Sidebar-->
    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="{{ URL::asset('build/images/logo-icon.png') }}" class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
                <h6 class="mb-0">Gerobak Listrik Angkringan</h6>
            </div>
            <div class="sidebar-close">
                <span class="material-icons-outlined">close</span>
            </div>
        </div>
        <div class="sidebar-nav">
            <!-- Navigation -->
            <ul class="metismenu" id="sidenav">
                <li>
                    <a href="{{ url('/gerobaklistrik/dashboard') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">home</i>
                        </div>
                        <div class="menu-title">Beranda</div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/gerobaklistrik/peta-sebaran') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">map</i>
                        </div>
                        <div class="menu-title">Peta Sebaran Mitra</div>
                    </a>
                </li>

                {{-- <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="material-icons-outlined"> <i class="lni lni-library"></i>
                        </div>
                        <div class="menu-title">Artikel</div>
                    </a>
                    <ul>
                        <li><a href="{{ url('/gerobaklistrik-artikel') }}"><i class="material-icons-outlined">arrow_right</i>Artikel</a>
                        </li>
                        <li><a href="{{ url('/gerobaklistrik-tambah-artikel') }}"><i class="material-icons-outlined">arrow_right</i>Tambah Artikel</a>
                        </li>
                    </ul>
                </li> --}}

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="material-icons-outlined"> <i class="lni lni-users"></i>
                        </div>
                        <div class="menu-title">Mitra</div>
                    </a>
                    <ul>
                        <li><a href="{{ url('/gerobaklistrik/calon-mitra') }}"><i class="material-icons-outlined">arrow_right</i>Calon Mitra</a>
                        </li>
                        <li><a href="{{ url('/gerobaklistrik/mitra') }}"><i class="material-icons-outlined">arrow_right</i>Mitra</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                        </div>
                        <div class="menu-title">Produk</div>
                    </a>
                    <ul>
                        <li><a href="{{ url('/ecommerce/products') }}"><i class="material-icons-outlined">arrow_right</i>Produk</a>
                        </li>
                        <li><a href="{{ url('/ecommerce/products/create') }}"><i class="material-icons-outlined">arrow_right</i>Tambah Produk</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="material-icons-outlined"> <i class="lni lni-cart-full"></i>
                        </div>
                        <div class="menu-title">Pesanan</div>
                    </a>
                    <ul>
                        <li><a href="{{ url('/ecommerce/payments') }}"><i class="material-icons-outlined">arrow_right</i>Pembayaran</a>
                        </li>
                        <li><a href="{{ url('/ecommerce/orders') }}"><i class="material-icons-outlined">arrow_right</i>Pesanan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/user-profile') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">person</i>
                        </div>
                        <div class="menu-title">User Profile</div>
                    </a>
                </li>
            </ul>
            <!-- End Navigation -->
        </div>
    </aside>
    <!-- End Sidebar-->
</body>

</html>
