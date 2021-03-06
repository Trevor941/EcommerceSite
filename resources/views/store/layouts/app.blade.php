<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
         <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--dynamic meta data-->
   <?php echo $googlesearchconsole->name ?>
    <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('store/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{asset('store/lib/slick/slick-theme.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('store/css/style.css')}}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body>
        <!-- Top bar Start -->
       @include('store.layouts.partials.topbar')
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        @include('store.layouts.partials.navbar')
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
       @include('store.layouts.partials.bottombar')
        <!-- Bottom Bar End -->       
        @yield('content')
        <!-- Footer Start -->
        @include('store.layouts.partials.footer')

        <!-- Footer Bottom End -->       
         
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('store/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('store/lib/slick/slick.min.js')}}"></script>
        
        <!-- Template Javascript -->
        <script src="{{asset('store/js/main.js')}}"></script>
             @yield('scripts')

             <?php  echo $analytics->name ?>
             
    </body>
</html>
