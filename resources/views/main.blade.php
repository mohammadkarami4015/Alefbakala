<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="image/favicon.png" rel="icon"/>
    <title>@yield('title')</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap-rtl.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="/css/owl.transitions.css"/>
    <link rel="stylesheet" type="text/css" href="/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="/css/stylesheet-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="/css/responsive-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="/css/stylesheet-skin2.css"/>


    <!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
    <div id="header">
        <!-- Top Bar Start-->
        <nav id="top" class="htop">
            <div class="container">
                <div class="row"><span class="drop-icon visible-sm visible-xs"><i
                            class="fa fa-align-justify"></i></span>

                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
    @include('header')
    <!-- Header End-->
        <!-- Main آقایانu Start-->

       @yield('navbar')

        <!-- Main آقایانu End-->
    </div>
    <div id="container">

        <div class="container">
            @include('flash')
            @include('error')

            <div class="row">
                <!--Middle Part Start-->
                <!-- Banner End-->
                <!-- محصولات Tab Start -->
            @yield('content')

            <!-- دسته ها محصولات Slider End -->

                <!-- برند Logo Carousel Start-->

                <!-- برند Logo Carousel End -->
            </div>
            <!--Middle Part End-->
        </div>
    </div>
</div>

<!--Footer End-->
<!-- Twitter Side Block Start -->
<!-- Twitter Side Block End -->
<!-- Facebook Side Block Start -->
<!-- Facebook Side Block End -->

<!-- JS Part Start-->
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.dcjqaccordion.min.js"></script>

@yield('script')
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<!-- JS Part End-->

</body>
</html>
