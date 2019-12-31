<script src="{{ asset('client/js/jquery.min.js') }}"></script>
<script src="{{ asset('client/js/tether.min.js') }}"></script>
{{-- <script src="{{ asset('client/js/bootstrap.min.js') }}"></script> --}}
<script src="{{ asset('client/js/custom.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
crossorigin="anonymous"></script>

<script>
$( document ).ready( function () {
    $( '.dropdown-menu a.dropdown-toggle' ).on('mouseover', function ( e ) {
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