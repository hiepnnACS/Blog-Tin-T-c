
<script src="/js/app.js"></script>
<script src={{ asset('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>

    @yield('js_cate')

    @yield('js_post')
<script>
        window.setTimeout(function() {
            $(".alert").fadeTo(600, 0).slideUp(600, function(){
                $(this).remove(); 
            });
        }, 2000);
      </script>
@include('ckfinder::setup')
