<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nobleseed|Admin</title>
    @include('includes.styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('includes.navbar')

        @include('includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <!-- Main content -->
        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- /.content -->
        <!-- /.content-wrapper -->
        @include('includes.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('includes.scripts')
</body>

</html>
