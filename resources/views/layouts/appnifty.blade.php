<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from themeon.net/nifty/v3.0.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Apr 2022 04:26:59 GMT -->
<head>
    <meta name="generator" content="Hugo 0.87.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="Nifty is a responsive admin dashboard template based on Bootstrap 5 framework. There are a lot of useful components.">
    <title>@yield('title')DIGILIB</title>

    <!-- STYLESHEETS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--- -->

    <!-- Fonts [ OPTIONAL ] -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.22/dist/sweetalert2.min.css">


    @vite(['resources/assets/css/bootstrap.min.75a07e3a3100a6fed983b15ad1b297c127a8c2335854b0efc3363731475cbed6.css','resources/assets/css/nifty.min.4d1ebee0c2ac4ed3c2df72b5178fb60181cfff43375388fee0f4af67ecf44050.css'])

    @vite('resources/js/app.js')
    @stack('css')
    <!-- Bootstrap CSS [ REQUIRED ] -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.75a07e3a3100a6fed983b15ad1b297c127a8c2335854b0efc3363731475cbed6.css"> -->

    <!-- Nifty CSS [ REQUIRED ] -->
    <!-- <link rel="stylesheet" href="assets/css/nifty.min.4d1ebee0c2ac4ed3c2df72b5178fb60181cfff43375388fee0f4af67ecf44050.css"> -->

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~---

    [ REQUIRED ]
    You must include this category in your project.


    [ OPTIONAL ]
    This is an optional plugin. You may choose to include it in your project.


    [ DEMO ]
    Used for demonstration purposes only. This category should NOT be included in your project.


    [ SAMPLE ]
    Here's a sample script that explains how to initialize plugins and/or components: This category should NOT be included in your project.


    Detailed information and more samples can be found in the documentation.

    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--- -->
</head>

<body class="jumping">

    <!-- PAGE CONTAINER -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div id="root" class="root mn--max hd--expanded">

        <!-- CONTENTS -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <section id="content" class="content">
            <div class="content__header content__boxed overlapping">
                <div class="content__wrap">

                    <!-- Breadcrumb -->
                    @yield('breadcrumb')
                    <!-- END : Breadcrumb -->

                    <!-- Page title and information -->
                    @yield('pagetitle')
                    <!-- END : Page title and information -->

                </div>

            </div>

            @yield('content')
            
            <!-- FOOTER -->
            @include('partials.footer')
            <!-- END - FOOTER -->

        </section>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - CONTENTS -->

        <!-- HEADER -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        @include('partials.header')
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - HEADER -->

        <!-- MAIN NAVIGATION -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        @include('partials.navigation')
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - MAIN NAVIGATION -->

        <!-- SIDEBAR -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - SIDEBAR -->

    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - PAGE CONTAINER -->

    <!-- SCROLL TO TOP BUTTON -->
    <div class="scroll-container">
        <a href="#root" class="scroll-page rounded-circle ratio ratio-1x1" aria-label="Scroll button"></a>
    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - SCROLL TO TOP BUTTON -->
    
    <!-- JAVASCRIPTS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @stack('js')
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

</body>


<!-- Mirrored from themeon.net/nifty/v3.0.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Apr 2022 04:26:59 GMT -->
</html>