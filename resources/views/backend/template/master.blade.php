<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.template.header')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @include('backend.template.navbar')
            @include('backend.template.sidebar')
            @yield('content')
            @include('backend.template.footer')
        </div>
        @include('backend.template.script')
    </body>
</html>
