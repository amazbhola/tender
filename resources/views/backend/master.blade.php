@include('backend.partials.header');

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        @include('backend.partials.dashboardheader')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        @include('backend.partials.sidebar')
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    @include('backend.partials.contentheader')
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        @yield('content')
                        @yield('tenderlist')
                        @yield('two')
                        @yield('three')
                        @yield('fore')
                        @yield('five')
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
@include('backend.partials.footer');
