<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  {{-- font --}}
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.svg') }}" type="image/x-icon">

  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/toastify/toastify.css') }}">

  {{-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"> --}}

  {{-- datatables --}}
  <link href="{{ asset('dashboard/assets/vendors/datatables/dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  @stack('style')
</head>

<body>
  <div id="app">

    @include('dashboard.layouts.sidebar')

    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      @yield('content')

      @include('dashboard.layouts.footer')

    </div>
  </div>

  {{-- <script src="{{ asset('dashboard/assets/vendors/jquery/jquery.min.js') }}"></script> --}}
  <script src="{{ asset('dashboard/assets/vendors/jquery/jquery.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>

  <script src="{{ asset('dashboard/assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

  <!-- toastify -->
  <script src="{{ asset('dashboard/assets/vendors/toastify/toastify.js') }}"></script>

  <!-- datatable -->
  <script src="{{ asset('dashboard/assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('dashboard/assets/vendors/jquery-validate/jquery.validate.js') }}"></script>

  {{-- ckeditor --}}
  <script src="{{ asset('dashboard/assets/vendors/ckeditor/ckeditor.js') }}"></script>

  @stack('script')

  @include('sweetalert::alert')
</body>

</html>
