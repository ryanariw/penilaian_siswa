 <!-- Favicons -->
 <link href="{{ asset('assets/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <!-- Ini penulisan yang benar -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile">


  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/assets/css/style.css') }}" rel="stylesheet">

   <!-- ======= Header ======= -->
   <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="/home" class="logo d-flex align-items-center">
    <img src="{{ asset('assets/assets/img/logo.png')}}" alt="">
    <span class="d-none d-lg-block">Rekapan Nilai</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div>
<!-- End Logo -->
<nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


          <li class="nav-item dropdown pe-3">
  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="{{ asset('assets/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
  </a>
  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" aria-labelledby="profileDropdown">
    <li class="dropdown-header">
      <h6>{{ Auth::user()->name }}</h6>
      <span>{{ Auth::user()->role}}</span>
    </li>
    <li><hr class="dropdown-divider"></li>
     @if(in_array(Auth::user()->role, ['kepsek', 'admin', 'siswa']))
    <li>
      <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>My Profile</span>
      </a>
    </li>
    <li><hr class="dropdown-divider"></li>
      @endif
    <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="dropdown-item d-flex align-items-center">
          <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </button>
      </form>
    </li>
  </ul>
</li>

          

</header>
<!-- End Header -->


  <!-- Vendor JS Files -->
   <!-- Make sure this is included before your main.js -->
  <!-- Bootstrap JS -->
<script src="{{ asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

