<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>{{$title ?? 'admin'}}</title>
    <meta name="keywords" content="admin toko onlen" />
    <meta name="description" content="admin toko onlen">
    <meta name="author" content="tokoonlen.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="/assets/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="/assets/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="/assets/vendor/dropzone/basic.css" />
    <link rel="stylesheet" href="/assets/vendor/dropzone/dropzone.css" />
    <link rel="stylesheet" href="/assets/vendor/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="/assets/vendor/codemirror/lib/codemirror.css" />
    <link rel="stylesheet" href="/assets/vendor/codemirror/theme/monokai.css" />


    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/assets/css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Head Libs -->
    <script src="/assets/vendor/modernizr/modernizr.js"></script>

</head>

<body>
    <section class="body">
        @include('admin/layouts/header')
        @include('admin/layouts/sidebar')
        @yield('content')
    </section>
    <section class=" bg-light">
        <div class="container container-with-sidebar">
            <div class="row">
                <div class="col-xl-9 p-0">
                    <div class="call-to-action-content ml-4 pt-xl-5 pb-4">
                        <h2 class=" text-dark">Praktikum Prognet @ 2020</h2>
                    </div>
                </div>

            </div>
        </div>

    </section>


    <!-- Vendor -->
    <script src="/assets/vendor/jquery/jquery.js"></script>
    <script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="/assets/vendor/popper/umd/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="/assets/vendor/common/common.js"></script>
    <script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="/assets/vendor/readmore-js/readmore.min.js"></script>
    <script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Specific Page Vendor -->
    <script src="/assets/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="/assets/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="/assets/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
    <script src="/assets/vendor/flot/jquery.flot.js"></script>
    <script src="/assets/vendor/flot/jquery.flot.pie.js"></script>
    <script src="/assets/vendor/flot/jquery.flot.categories.js"></script>

    <!-- Specific Page Vendor -->
    <script src="/assets/vendor/select2/js/select2.js"></script>
    <script src="/assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/examples/examples.datatables.default.js"></script>
    <!-- Specific Page Vendor -->
    <script src="/assets/vendor/select2/js/select2.js"></script>
    <script src="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <!-- Examples -->
    <script src="/assets/js/examples/examples.advanced.form.js"></script>
    <script src="/assets/js/examples/examples.modals.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="/assets/js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="/assets/js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="/assets/js/theme.init.js"></script>

    <!-- Examples -->
    <script src="/assets/js/examples/examples.dashboard.js"></script>

    @yield('footer')
</body>

</html>