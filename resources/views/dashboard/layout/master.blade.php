<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ProposiX Admin</title>
  <link rel="stylesheet" href="{{asset('assets/dashboard/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dashboard/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dashboard/css/vertical-layout-light/style.css')}}">
  <link rel="shortcut icon" href="{{asset('assets/dashboard/images/favicon.png')}}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
  <div class="container-scroller">
    @include('dashboard.layout.nav')
    <div class="container-fluid page-body-wrapper">
      @include('dashboard.layout.settings')
      @include('dashboard.layout.right-sidebar')
      @include('dashboard.layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('dashboard.layout.footer')
      </div>
    </div>   
  </div>
  <script src="{{asset('assets/dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/dashboard/js/dataTables.select.min.js')}}"></script>

  <script src="{{asset('assets/dashboard/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/dashboard/js/template.js')}}"></script>
  <script src="{{asset('assets/dashboard/js/settings.js')}}"></script>
  <script src="{{asset('assets/dashboard/js/todolist.js')}}"></script>
  <script src="{{asset('assets/dashboard/js/dashboard.js')}}"></script>
  <script src="{{asset('assets/dashboard/js/Chart.roundedBarCharts.js')}}"></script>
</body>

</html>

