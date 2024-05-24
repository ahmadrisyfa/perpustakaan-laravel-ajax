
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  {{-- <title>Pages / Not Found 404 - NiceAdmin Bootstrap Template</title> --}}
  <title>Perpustakaan | Landing Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{asset('template_admin')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('template_admin')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}
  <link rel="shortcut icon" href="{{asset('template-pinterest')}}/docs/assets/img/logo.png" type="image/x-icon">

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
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h2>PERPUSTAKAAN</h2>
        <h3 class="text-center">Temukan Buku-Buku Menarik Untuk Memperluas Pengetahuan Dan Imajinasi Anda</h3>
        <div class="row mt-4">
            @auth
                <div class="col-6">        
                    <a class="btn" href="{{url('daftar_buku')}}">Buku</a>
                </div>
                <div class="col-6">     
                    @if (auth()->user()->is_admin == 1)                
                        <a class="btn" href="{{url('admin/dashboard')}}">Dashboard</a>
                    @else
                        <a class="btn" href="{{url('siswa/dashboard')}}">Dashboard</a>
                    @endif
                </div>
            @else
                <div class="col-6">        
                    <a class="btn" href="{{url('daftar_buku')}}">Buku</a>
                </div>
                <div class="col-6">     
                    <a class="btn" href="{{url('login')}}">Login</a>
                </div>
            @endauth
        </div>
        <img src="{{asset('template_admin')}}/assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
          Designed by <a href="#">Perpustakaan</a>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

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