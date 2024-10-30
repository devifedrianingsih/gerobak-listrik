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
  <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div class="logo-icon">
        <img src="{{ URL::asset('build/images/logo-icon.png') }}" class="logo-img" alt="">
      </div>
      <div class="logo-name flex-grow-1">
        <h5 class="mb-0">GerList</h5>
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
          <li>
            <a href="{{ url('/index') }}">
              <div class="parent-icon"><i class="material-icons-outlined">home</i>
              </div>
              <div class="menu-title">Beranda</div>
            </a>
          </li>

          <li>
            <a href="{{ url('/map-google-maps') }}">
              <div class="parent-icon"><i class="material-icons-outlined">map</i>
              </div>
              <div class="menu-title">Peta Franchise</div>
            </a>
          </li>

          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="material-icons-outlined"> <i class="lni lni-library"></i>
              </div>
              <div class="menu-title">Artikel</div>
            </a>
            <ul>
              <li><a href="{{ url('/ecommerce-article') }}"><i class="material-icons-outlined">arrow_right</i>Artikel</a>
              </li>
              <li><a href="{{ url('/ecommerce-add-article') }}"><i class="material-icons-outlined">arrow_right</i>Tambah Artikel</a>
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
              <li><a href="{{ url('/ecommerce-products') }}"><i class="material-icons-outlined">arrow_right</i>Produk</a>
              </li>
              <li><a href="{{ url('/ecommerce-add-product') }}"><i class="material-icons-outlined">arrow_right</i>Tambah Produk</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="material-icons-outlined"> <i class="lni lni-users"></i>
              </div>
              <div class="menu-title">Mitra</div>
            </a>
            <ul>
              <li><a href="{{ url('/ecommerce-customers') }}"><i class="material-icons-outlined">arrow_right</i>Mitra</a>
              </li>
              <li><a href="{{ url('/ecommerce-potential-partners') }}"><i class="material-icons-outlined">arrow_right</i>Calon Mitra</a>
              </li>
              <li><a href="{{ url('/ecommerce-customer-details') }}"><i class="material-icons-outlined">arrow_right</i>Detail Pelanggan</a>
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
              <li><a href="{{ url('/ecommerce-orders') }}"><i class="material-icons-outlined">arrow_right</i>Pesanan</a>
              </li>
              <li><a href="{{ url('/ecommerce-order-details') }}"><i class="material-icons-outlined">arrow_right</i>Detail Pesanan</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="{{ url('/app-invoice') }}">
              <div class="parent-icon"><i class="material-icons-outlined">description</i>
              </div>
              <div class="menu-title">Invoice</div>
            </a>
          </li>

          <li>
            <a href="{{ url('/sales-report') }}">
              <div class="material-icons-outlined"> <i class="lni lni-printer"></i>
              </div>
              <div class="menu-title">Laporan Penjualan</div>
            </a>
          </li>

          <li>
            <a href="{{ url('/user-profile') }}">
              <div class="parent-icon"><i class="material-icons-outlined">person</i>
              </div>
              <div class="menu-title">User Profile</div>
            </a>
          </li>
         </ul>
        <!--end navigation-->
    </div>
  </aside>
<!--end sidebar-->
</body>
</html>