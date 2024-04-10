<!DOCTYPE html>
<html lang="en" dir="ltr" data-color-theme="light">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ETaOaSaF: @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/images/favicon.ico') }}">

    @include('layouts.head-css')

</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')

    <!-- Page content -->
    <div class="page-content">

        <!-- sidebar -->
        @include('layouts.sidebar')

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                @yield('content')

            </div>
            <!-- /inner content -->

            @yield('survey-footer-content')

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- right-sidebar content -->
    @include('layouts.right-sidebar')

    <!-- notification -->
    @include('layouts.notification')

    @include('layouts.head-js')
</body>
</html>
