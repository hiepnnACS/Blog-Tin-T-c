

<script src="/js/app.js"></script>
<script src={{ asset('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'text', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>

    @yield('js_cate')

@include('ckfinder::setup')
