
<!DOCTYPE html>
<html xmlns:https="http://www.w3.org/1999/xhtml" t>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title","PS Wallpaper|Dashboard")</title>
    @foreach($photos as $p)
        @if($p->img_type == "favicon")
            <link rel="icon" href="{{ asset("storage/backend/favicon/".$p->photo) }}">
        @endif
    @endforeach


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

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

    <script src="{{ asset("dashboard/assets/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("js/app.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>


                $(".nav-treeview li").on("click",function () {
                    console.log("click");
                })

                $("body").on('keyup','#searchterm',function () {
                    let search_content = $(this).val();
                    console.log(search_content);
                    if(search_content != '') {
                        $.ajax({
                            url:"{{ route('color.search') }}",
                            method : 'GET',
                            data:{
                                searchterm : search_content
                            },
                            dataType:'json',
                            success:function (data) {
                                console.log(data.table_data);
                                $('tbody').html(data.table_data);
                            }

                        })
                    } else {
                        $.ajax({
                            url:"{{ route('color.search') }}",
                            method : 'GET',
                            data:{
                                searchterm : search_content
                            },
                            dataType:'json',
                            success:function (data) {
                                console.log(data.table_data);
                                $('tbody').html(data.table_data);
                            }

                        })
                    }
                });

            </script>


            <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset("dashboard/assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset("dashboard/assets/plugins/morris/morris.min.js") }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset("dashboard/assets/plugins/sparkline/jquery.sparkline.min.js") }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset("dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
    <script src="{{ asset("dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset("dashboard/assets/plugins/knob/jquery.knob.js") }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset("dashboard/assets/plugins/daterangepicker/daterangepicker.js") }}"></script>
    <!-- color picker -->
    <script src="{{ asset("dashboard/assets/plugins/colorpicker/bootstrap-colorpicker.min.js") }}"></script>
    <!-- datepicker -->
    <script src="{{ asset("dashboard/assets/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset("dashboard/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset("dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
    <!-- FastClick -->
    <script src="{{ asset("dashboard/assets/plugins/fastclick/fastclick.js") }}"></script>
    <!-- AdminLTE App(This is sidebar and nav action) -->
    <script src="{{ asset("dashboard/assets/dist/js/adminlte.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset("dashboard/assets/dist/js/demo.js") }}"></script>
    <script src="{{ asset("dashboard/assets/ckeditor4/ckeditor.js") }}"></script>

    <script src="{{ asset("dashboard/assets/validator/jquery.validate.js") }}"></script>
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
    <x-sweet-toast></x-sweet-toast>
    @yield("foot")






</div>
<!-- ./ wrapper -->
</body>
</html>
