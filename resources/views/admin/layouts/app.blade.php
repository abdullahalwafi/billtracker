@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
<div class="page-content">
    <div class="container-fluid">
        @yield('content')
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@include('admin.layouts.footer')
