<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>@yield('pagetitle',__('home.home'))</title>

  <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <!-- Custom fonts for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
  @stack('styles')

</head>

<body id="page-top" class="dark">
  <canvas id="canvas"></canvas>
  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('site.parts.header')

    @include('site.parts.navigation')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container">

          @yield('pageheading')

          <!-- Begin error display -->
          @if (session('success'))
              <div class="alert alert-success">
                  <span>{{ session('success') }}</span>
              </div>
          @endif
          @if (session('error'))
          <div class="alert alert-danger">        
              <span>{{ session('error') }}</span>
          </div>
          @endif

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul class="nav flex-column">
                      @foreach ($errors->all() as $error)
                          <li class="nav-item">{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        </div>

        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      @include('site.parts.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded d-none" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-tim">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.ready_to_leave') }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body bg-tim">{{ __('admin.select_logout') }}</div>
        <div class="modal-footer bg-tim">
          <button class="btn bg-cloud" type="button" data-dismiss="modal">{{ __('admin.cancel') }}</button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-warning" type="submit">{{ __('admin.logout') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Custom scripts for all admin pages-->
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')

</body>

</html>
