<!DOCTYPE html>
<html lang="en">
<head>

  @include('admin.layouts.head')

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