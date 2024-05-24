  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perpustakaan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{asset('template_admin')}}/assets/img/favicon.png" rel="icon"> --}}
  <link rel="shortcut icon" href="{{asset('template-pinterest')}}/docs/assets/img/logo.png" type="image/x-icon">

  <link href="{{asset('template_admin')}}/img/favicon.ico" rel="icon">

  <link href="{{asset('template_admin')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template_admin')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('template_admin')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('template_admin')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('template_admin')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('template_admin')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{asset('template_admin')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('template_admin')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('template_admin')}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Perpustakaan - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    @yield('css_admin')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{asset('template_admin')}}/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Perpustakaan</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      {{-- <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form> --}}
      @include('waktu.index')
    </div>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-clock-history"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('template_admin')}}/assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('template_admin')}}/assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('template_admin')}}/assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('template_admin')}}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{auth()->user()->name}}</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>                            
            
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
            <form action="{{url('logout')}}" method="Post"  class="dropdown-item d-flex align-items-center">
                  @csrf
                  <i class="bi bi-box-arrow-right"></i>
                  <button class="btn">Sign Out</button>
            </form>  

            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


      @if(auth()->user()->is_admin == 1)
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/dashboard')) collapsed @endif" href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/rak')) collapsed @endif" href="{{ url('admin/rak') }}">
          <i class="bi bi-hdd-rack"></i>
          <span>Rak</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/category')) collapsed @endif" href="{{ url('admin/category') }}">
          <i class="bi bi-life-preserver"></i>
          <span>Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/buku')) collapsed @endif" href="{{ url('admin/buku') }}">
          <i class="bi bi-book"></i>
          <span>Buku</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/user')) collapsed @endif" href="{{ url('admin/user') }}">
          <i class="bi bi-arrow-bar-right"></i>
          <span>Data Login</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/murid')) collapsed @endif" href="{{ url('admin/murid') }}">
          <i class="bi bi-person"></i>
          <span>Murid</span>
        </a>
      </li>



      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{asset('template_admin')}}/components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>        
        </ul>
      </li> --}}

      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/pinjam_buku/show/*') && !request()->is('admin/pinjam_buku')) collapsed @endif" href="{{ url('admin/pinjam_buku') }}">
          <i class="bi bi-arrow-90deg-right"></i>
          <span>Peminjaman</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/pengembalian_buku/show/*') && !request()->is('admin/pengembalian_buku')) collapsed @endif" href="{{ url('admin/pengembalian_buku') }}">
          <i class="bi bi-arrow-90deg-left"></i>
          <span>Pengembalian</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/denda')) collapsed @endif" href="{{ url('admin/denda') }}">
          <i class="bx bx-money"></i>
          <span>Denda</span>
        </a>
      </li>


      <li class="nav-heading">Laporan</li>
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/laporan')) collapsed @endif" href="{{ url('admin/laporan') }}">
          <i class="bi bi-arrow-90deg-right"></i>
          <span>Laporan</span>
        </a>
      </li>
      
      @else
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('siswa/dashboard')) collapsed @endif" href="{{ url('siswa/dashboard') }}">
          <i class="bi bi-person"></i>
          <span>Detail Murid</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(!request()->is('siswa/daftar_pinjam_buku')) collapsed @endif" href="{{ url('siswa/daftar_pinjam_buku') }}">
          <i class="bi bi-arrow-90deg-right"></i>
          <span>Daftar Pinjam Buku</span>
        </a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('siswa/daftar_pengembalian_buku')) collapsed @endif" href="{{ url('siswa/daftar_pengembalian_buku') }}">
          <i class="bi bi-arrow-90deg-left"></i>
          <span>Daftar Pengembalian Buku</span>
        </a>
      </li>
      @endif
      

    
      {{-- <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/pinjam_buku/laporan')) collapsed @endif" href="{{ url('admin/pinjam_buku/laporan') }}">
          <i class="bi bi-arrow-90deg-right"></i>
          <span>Laporan Peminjaman</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/pengembalian_buku/laporan')) collapsed @endif" href="{{ url('admin/pengembalian_buku/laporan') }}">
          <i class="bi bi-arrow-90deg-left"></i>
          <span>Laporan Pengembalian</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/denda/laporan')) collapsed @endif" href="{{ url('admin/denda/laporan') }}">
          <i class="bx bx-money"></i>
          <span>Laporan Denda</span>
        </a>
      </li> --}}


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('content_admin')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Perpustakaan</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="{{url('/')}}">Perpustakaan</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('template_admin')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('template_admin')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('template_admin')}}/assets/vendor/chart.js/chart.min.js"></script>
  <script src="{{asset('template_admin')}}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{asset('template_admin')}}/assets/vendor/quill/quill.min.js"></script>
  <script src="{{asset('template_admin')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{asset('template_admin')}}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{asset('template_admin')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('template_admin')}}/assets/js/main.js"></script>

</body>

</html>