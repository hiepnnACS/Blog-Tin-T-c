
<script src="/js/app.js"></script>
<script src={{ asset('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>

    @yield('js_cate')

    @yield('js_post')

@include('ckfinder::setup')
