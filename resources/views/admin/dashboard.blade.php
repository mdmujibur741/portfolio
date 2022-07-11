  @include('admin.partial.html_header')

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.partial.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

             @include('admin.partial.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                     @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.partial.moadal')

   @include('admin.partial.script')