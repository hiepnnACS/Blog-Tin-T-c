<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Starter</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
 
<div class="wrapper" id="app">
 
    @include('admin.layouts.navbar')

    @include('admin.layouts.sidebar')
 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                
                @yield('content')

            </div>
        </div><!-- /.content -->
    </div><!-- /.content-wrapper -->
    
        @include('admin.layouts.footer')
  
</div>
    @include('admin.layouts.js')
</body>
</html>