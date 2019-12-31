
{{-- {{ dd($category) }} --}}
<ul>
    @foreach($category as $cate)
        <li>{{ $cate->name }}</li>
        <ul>
            @foreach($cate->childrenCategory as $submenu)
                <li>{{ $submenu->name }}</li>
                @if($submenu->categories)
                    <ul>
                        @foreach ($submenu->categories as $child )
                            {{ $child->name }}
                        @endforeach
                    </ul>
                @endif
            @endforeach
        </ul>
    @endforeach
</ul>

{{-- @foreach( $category as $cat ) --}}
{{-- nếu có submenu --}}
{{-- <li @if($cat->childrenCategory->count()) class="dropdown" @endif> --}}

    {{-- nếu có submenu thì cho vào ul và lặp ra submenu --}}
    {{-- @if($cat->childrenCategory->count())

        <ul class="dropdown-menu" role="menu">

        @foreach($cat->childrenCategory as $child)
            
        <li @if($child->childrenCategory->count()) class="dropdown" @endif>
            <a href="" @if($cat->childrenCategory->count()) class="dropdown-toggle nav-item" data-toggle="dropdown" role="button" aria-expanded="false" @endif>{{ $child->name }} @if($child->childrenCategory->count()) <span class="caret"></span> @endif</a>                               
            @if($child->childrenCategory->count())
            <ul class="dropdown-menu" role="menu">
            @foreach($child->childrenCategory as $c)
                <li>{{ $c->name }}</li>
            @endforeach
            @endif

        @endforeach

        </ul>

    @endif

</li>

@endforeach --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap NavBar</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="css/bootstrap-4-navbar.css" rel="stylesheet">


        <!--Demo purpose css-->
        <style>
            body {
                padding-top: 50px;
            }
            .navbar {
                margin:  40px 0;
            }

        </style>
    </head>
    <body>


<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                {{-- lặp tất cả menu cha --}}
                @foreach($category as $cate )
                    <li class="nav-item dropdown">
                        <a class="nav-link @if($cate->childrenCategory->count()) dropdown-toggle @endif" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $cate->name }}
                        </a>

                        {{-- Nếu trong menu cha có menu con --}}
                        @if($cate->childrenCategory->count())
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            {{-- Lấy ra menu cấp 2  --}}
                            @foreach($cate->childrenCategory as $child)

                                <li><a class="dropdown-item @if($child->childrenCategory->count()) dropdown-toggle @endif" href="#">{{ $child->name }}</a>
                                    
                                    {{-- xem trong menu cấp 2 có con không --}}
                                    @if($child->childrenCategory->count())
                                        <ul class="dropdown-menu">

                                            {{-- lấy ra menu con của cấp 2 --}}
                                            @foreach($child->childrenCategory as $subchild)

                                            <li><a class="dropdown-item" href="#">{{ $subchild->name }}</a></li>

                                            @endforeach
                                        </ul>
                                    @endif
                                </li>

                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>

</div> <!-- /container -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

<script>
    $( document ).ready( function () {
        $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
            var $el = $( this );
            $el.toggleClass('active-dropdown');
            var $parent = $( this ).offsetParent( ".dropdown-menu" );
            if ( !$( this ).next().hasClass( 'show' ) ) {
                $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
            }
            var $subMenu = $( this ).next( ".dropdown-menu" );
            $subMenu.toggleClass( 'show' );
            
            $( this ).parent( "li" ).toggleClass( 'show' );

            $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
                $( '.dropdown-menu .show' ).removeClass( "show" );
                $el.removeClass('active-dropdown');
            } );
            
            if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
                $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
            }

            return false;
        } );
    } );
</script>
    </body>
</html>
