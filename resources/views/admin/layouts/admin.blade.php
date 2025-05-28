<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EvenPro') }} - Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/admin/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- CSS -->
  
        <link rel="stylesheet" href="https://prium.github.io/falcon/v3.24.0/assets/css/theme.min.css">

    <link href="https://prium.github.io/falcon/v3.24.0/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="https://prium.github.io/falcon/v3.24.0/vendors/dropzone/dropzone.min.css" rel="stylesheet">
    
    @stack('styles')
</head>
<body>
    <!-- Main Content -->
    <main class="main" id="top">
        <div class="container-fluid" data-layout="container">
            <!-- Sidebar -->
            @include('admin.layouts.partials.sidebar')

            <!-- Content -->
            <div class="content">
                <!-- Navbar -->
                @include('admin.layouts.partials.navbar')

                <!-- Page Content -->
                @yield('content')

                <!-- Footer -->
                @include('admin.layouts.partials.footer')
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/popper/popper.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/anchorjs/anchor.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/is/is.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/fontawesome/all.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/lodash/lodash.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/list.js/list.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/flatpickr/flatpickr.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/vendors/dropzone/dropzone.min.js"></script>
    <script src="https://prium.github.io/falcon/v3.24.0/assets/js/theme.js"></script>
    <script src="https://cdn.tiny.cloud/1/nlrz4gzggmdyovu08xwa72foywth7pwcr3a4g8iogl4rpfqp/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    @stack('scripts')
    @yield('scripts')
</body>
</html>
