<!DOCTYPE html>
<html>

<head>
   @include('backend.layouts.head')
</head>

<body>
    <div class="main-wrapper" id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Kitchenette Admin</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <header class="topbar">
            @include('backend.layouts.nav')
        </header>
             @include('backend.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
   

        @yield('content')

    </div>
    
    @include('backend.layouts.footer')
</body>

</html>