<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <title>{{ $title ?? '' }} | Sewa Mobil</title>
    @include('include.head')
</head>


<body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        @include('include.topbar')
        @include('include.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        @include('include.footer')
      </div>
    </div>

    @include('include.vendor-script')
    @stack('script')
</body>
</html>
