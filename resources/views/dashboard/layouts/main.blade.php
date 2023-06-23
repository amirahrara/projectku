<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BAWASLU KOTA SURABAYA</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- plugins:css -->
    <link rel="stylesheet" href="/style-admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="/style-admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/style-admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/style-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/style-admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/style-admin/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/style-admin/css/vertical-layout-light/stylesheet.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/img/bawaslu2.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('dashboard.layouts.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            {{-- @include('admin.partials.sidebar') --}}

            <!-- partial -->
            {{-- <div class="main-panel"> --}}
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->
            {{-- </div> --}}
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="/style-admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/style-admin/vendors/chart.js/Chart.min.js"></script>
    <script src="/style-admin/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="/style-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    {{-- <script src="/style-admin/js/dataTables.select.min.js"></script> --}}

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/style-admin/js/off-canvas.js"></script>
    <script src="/style-admin/js/hoverable-collapse.js"></script>
    <script src="/style-admin/js/template.js"></script>
    <script src="/style-admin/js/settings.js"></script>
    <script src="/style-admin/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/style-admin/js/dashboard.js"></script>
    <script src="/style-admin/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
</body>

</html>

{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bawaslu</title>
    <link rel="shortcut icon" href="/img/bawaslu2.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    @include('dashboard.layouts.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html> --}}
