<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title> @yield('title') </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('client/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('client/images/apple-touch-icon.png') }}">
    
    {{-- css --}}
    @include('client.layouts.css')

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">

                {{-- navbar --}}
                @include('client.layouts.navbar')

            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        {{-- highlight Post --}}
        <section class="section first-section">
            @yield('highlight-post')
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    
                    {{-- content --}}
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        @yield('content')
                    </div>

                    {{-- sidebar --}}
                    @include('client.layouts.sidebar')

                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        {{-- footer --}}
        @include('client.layouts.footer')

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    @include('client.layouts.js')

</body>
</html>