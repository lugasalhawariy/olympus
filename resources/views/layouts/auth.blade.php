<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="argon-dashboard-master/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    TestCyberOlympus
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('argon-dashboard-master/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('argon-dashboard-master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('argon-dashboard-master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('argon-dashboard-master/assets/css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('login') }}">
              Authentication
            </a>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  @yield('content')
  <!--   Core JS Files   -->
  <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
  @stack('first-script')
  <script src="{{ asset('argon-dashboard-master/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('argon-dashboard-master/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('argon-dashboard-master/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('argon-dashboard-master/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('argon-dashboard-master/assets/js/argon-dashboard.min.js?v=2.0.2') }}"></script>
  @stack('last-script')
</body>

</html>