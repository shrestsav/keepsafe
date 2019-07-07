<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Web Application Designed by Shrestsav">
  <meta name="author" content="{{env('DEVELOPED_BY','ShreStsaV')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{env('APP_NAME','System')}}</title>
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{env('APP_URL')}}" />
  <!-- Favicon -->
  <link rel="icon" href="{{asset('argon')}}/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('argon')}}/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{asset('argon')}}/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="{{asset('argon')}}/vendor/animate.css/animate.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('argon')}}/css/argon.min9f1e.css?v=1.1.0" type="text/css">
  <link rel="stylesheet" href="{{asset('system')}}/css/app.css" type="text/css">
  <style type="text/css">
    [data-notify="progressbar"] {
      margin-bottom: 0px;
      position: absolute;
      bottom: 0px;
      left: 0px;
      width: 100%;
      height: 5px;
    }
  </style>
  @stack('styles')
</head>

<body>

  <div id="app">
    <vue-progress-bar></vue-progress-bar>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">

      @include('layouts.inc.__sidebar')

    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
      <!-- Topnav -->
      <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">

        @include('layouts.inc.__header')

      </nav>

      <!-- Sub-header -->
      <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                {{-- <h6 class="h2 text-white d-inline-block mb-0">Default</h6> --}}
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">{{$title}}</a></li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">Default</li> --}}
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">

                <!-- Here Goes Sub Menus for Individual Modules -->
                @yield('subMenus')

              </div>
            </div>
            <div class="row">
              <!-- Here goes Page stats cards -->
              @yield('showcase')

            </div>
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--6">

        @yield('content')

        <!-- Footer -->
        <footer class="footer pt-0">

          @include('layouts.inc.__footer')
          
        </footer>
      </div>
    </div>
  </div>

  @stack('vueScripts')
  <!-- Core -->
  <script src="{{asset('argon')}}/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{asset('argon')}}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('argon')}}/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{asset('argon')}}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{asset('argon')}}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="{{asset('argon')}}/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{asset('argon')}}/vendor/chart.js/dist/Chart.extension.js"></script>
   <!-- Argon JS -->
  <script src="{{asset('argon')}}/js/argon.min9f1e.js?v=1.1.0"></script>
  <script src="{{asset('argon')}}/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
  <script src="{{asset('system')}}/js/app.js"></script>
  <script type="text/javascript">
      @if($errors->any())
        @foreach ($errors->all() as $error)
          showNotify('danger','{{$error}}')
        @endforeach
      @endif

      @if(\Session::has('error'))
        showNotify('danger','{{\Session::get("error")}}')
      @endif

      @if(\Session::has('message'))
        showNotify('primary','{{\Session::get("message")}}')
      @endif

      @if(\Session::has('success'))
        showNotify('primary','{{\Session::get("success")}}')
      @endif
  </script>
  @stack('scripts')

</body>
</html>