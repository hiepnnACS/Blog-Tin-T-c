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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    
    {{-- css --}}
    @include('client.layouts.css')

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div id="wrapper">
        {{-- navbar --}}
        @include('client.layouts.navbar')

        {{-- jumbotron category  --}}
        @yield('jumbotron')

        {{-- highlight Post --}}
        @yield('highlight-post')

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