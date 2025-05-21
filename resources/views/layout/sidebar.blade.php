  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" >
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
   @if(Auth::user()->role != 'siswa')
      <li class="nav-item  active">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Siswa</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route ('siswa.index') }}">
              <i class="bi bi-circle"></i><span>Data Siswa</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
   
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Guru</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route ('guru.index') }}">
              <i class="bi bi-circle"></i><span>Data Guru</span>
            </a>
          </li>
        
        </ul> 
      </li><!-- End Forms Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>PENILAIAN</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route ('penilaian.mapel')}}">
              <i class="bi bi-circle"></i><span>Mata Pelajaran</span>
            </a>
          </li>
          <li>
              <a href="{{ route('penilaian.kelas.index') }}">
              <i class="bi bi-circle"></i><span>Kelas</span>
              </a>
          <li>
            <a href="{{route ('penilaian.nilai') }}">
              <i class="bi bi-circle"></i><span>Nilai</span>
            </a>
          </li>
        </ul>
    @if(auth()->check() && auth()->user()->role === 'kepsek')
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lines-fill"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('kepsek.index')}}">
              <i class="bi bi-circle"></i><span>Data User</span>
            </a>
          </li>
        </ul>
      </li>
      @endif


          @endif
         @if (Auth::user()->role == 'siswa')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('siswa.profile', Auth::user()->id) }}">
        <i class="bi bi-grid"></i> <span>Rangkuman Nilai</span>
      </a>
    </li>
  @endif
 
      </ul>

  </aside><!-- End Sidebar-->

 <!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>