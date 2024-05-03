<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{csrf_token() }}">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{asset("admin/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css")}}">
    <link rel="stylesheet" href="{{asset("admin/vendors/base/vendor.bundle.base.css")}}">
    <link rel="stylesheet" href="{{asset("admin/vendors/mdi/css/materialdesignicons.min.css")}}">

    <link rel="shortcut icon" href="{{asset("admin/images/favicon.png")}}">
</head>
<body>
    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
            @include('layouts.inc.admin.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
    </div>


    <script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('admin/vendors/datatable.net/jquery.dataTable.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/template.js')}}"></script>
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/data-table.js')}}"></script>
    <script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>
</body>
</html>

