
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title","PS Wallpaper|Dashboard")</title>
    <link rel="icon" href="http://localhost:8000/uploads/favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset("dashboard/assets/backend/css/animate.css") }}">
    <link rel="stylesheet" href="{{ asset("dashboard/assets/backend/css/style.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("dashboard/assets/font-awesome/css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("css/adminlte.css") }}">
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset("dashboard/assets/plugins/iCheck/flat/blue.css") }}>
    <!-- Morris chart -->
    <link rel="stylesheet" href={{ asset("dashboard/assets/plugins/morris/morris.css") }}>
    <!-- jvectormap -->
    <link rel="stylesheet" href={{ asset("dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css") }}>

    <!-- Color Picker -->
    <link href={{ asset("dashboard/assets/plugins/colorpicker/bootstrap-colorpicker.min.css") }} rel="stylesheet">

    <!-- Date Picker -->
    <link rel="stylesheet" href={{ asset("dashboard/assets/plugins/datepicker/datepicker3.css") }}>
    <!-- Daterange picker -->
    <link rel="stylesheet" href={{ asset("dashboard/assets/plugins/daterangepicker/daterangepicker-bs3.css") }}>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href={{ asset("dashboard/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}>
    <!-- Google Font: Source Sans Pro -->

    <!-- ChartJS 1.0.1 -->
    <script src={{ asset("dashboard/assets/plugins/chartjs-old/Chart.min.js") }}></script>
    <!-- jQuery -->
    <script src={{ asset("dashboard/assets/plugins/jquery/jquery.min.js") }}></script>
    <!-- Image Popup link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono|Work+Sans" rel="stylesheet">
    @yield("head")

</head>
<body id="dashboard">
    <div class="wrapper">

        @guest

            @yield("content")

        @else

            @include("layouts.header")
            <div class="container-fluid">
                <div class="content-wrapper">
                    <div class="row">

                        @include("layouts.sidebar")

                        <div class="col-sm-12 col-md-12 main teamps-sidebar-push">
                            @yield("content")
                        </div>
                    </div>
                </div>
            </div>

        @endguest

        <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="http://localhost:8000/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://localhost:8000/assets/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="http://localhost:8000/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="http://localhost:8000/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://localhost:8000/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="http://localhost:8000/assets/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="http://localhost:8000/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- color picker -->
    <script src="http://localhost:8000/assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- datepicker -->
    <script src="http://localhost:8000/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="http://localhost:8000/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="http://localhost:8000/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost:8000/assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App(This is sidebar and nav action) -->
    <script src="http://localhost:8000/assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost:8000/assets/dist/js/demo.js"></script>
    <script src="http://localhost:8000/assets/ckeditor4/ckeditor.js"></script>

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', "UA-79164209-2", 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->

    <script src="http://localhost:8000/assets/validator/jquery.validate.js"></script>
    <script type="text/javascript">

        // functions to run after jquery is loaded
        if ( typeof runAfterJQ == "function" ) runAfterJQ();


        // functions to run after jquery is loaded
        if ( typeof jqvalidate == "function" ) jqvalidate();


        $('.page-sidebar-menu li').removeClass('active');

        // highlight submenu item
        $('li a[href="' + this.location.pathname + '"]').parent().addClass('active');

        // Highlight parent menu item.
        $('ul a[href="' + this.location.pathname + '"]').parents('li').addClass('active');



    </script>
    @yield("foot")

</div>
<!-- ./ wrapper -->
</body>
</html>
