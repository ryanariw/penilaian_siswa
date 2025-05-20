<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rekap Nilai</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
   <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  @include('layout.navbar')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->

  @include('layout.sidebar')
  <!-- End Sidebar-->
  <main id="main" class="main">
    @yield('content')
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->

 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/assets/js/main.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/assets/js/main.js')}}"></script>

</body>

</html>