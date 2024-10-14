<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Admin app</title>
    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport"
    />
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/eggryg0q6wnpxzmvxbb3xxbywaki58ri9bcabtatpbsa4onx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <link
        rel="icon"
        href="/assets/img/kaiadmin/favicon.ico"
        type="image/x-icon"
    />

    <!-- Fonts and icons --><!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {families: ["Public Sans:300,400,500,600,700"]},
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["/assets/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/plugins.min.css"/>
    <link rel="stylesheet" href="/assets/css/kaiadmin.min.css"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/assets/css/demo.css"/>
</head>
<style>
    .table-main-content {
        width: 50%;
    }

    .table-main-content td {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
    }

    .file-attachments td {
        padding: 10px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
    }

    .file-attachments a {
        color: #007bff;
        text-decoration: none;
    }

    .file-attachments a:hover {
        text-decoration: underline;
    }
</style>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    @include('main.sidebar')
    <!-- End Sidebar -->

    <div class="main-panel">
        @include('main.header')

        <div class="container">
            <div class="page-inner">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!--   Core JS Files   -->
<script src="/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="/assets/js/plugin/jsvectormap/world.js"></script>

<!-- Sweet Alert -->
<script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Kaiadmin JS -->
<script src="/assets/js/kaiadmin.min.js"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="/assets/js/setting-demo.js"></script>
<script src="/assets/js/demo.js"></script>
<script>
    $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
    });

    $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
    });

    $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
    });
</script>
</body>
</html>
