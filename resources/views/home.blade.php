@extends('client.master')

@section('title')
    Trang chủ
@endsection

@section('content')

<div class="page-wrapper">
    <div class="blog-top clearfix">
        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
    </div><!-- end blog-top -->

    <div class="blog-list clearfix">

        @foreach($data_product as $data)
            <div class="blog-box row">
                <div class="col-md-4">
                    <div class="post-media">
                        <a href="tech-single.html" title="">
                            <img src="{{ asset('client/upload/tech_blog_01.jpg') }}" alt="" class="img-fluid">
                            <div class="hovereffect"></div>
                        </a>
                    </div><!-- end media -->
                </div><!-- end col -->

                <div class="blog-meta big-meta col-md-8">
                    <h4><a href="{{ route('post.detail', $data->url_slug) }}" title="">{{ $data->title }}</a></h4>
                    <p>{{ $data->content_limit }}</p>
                    <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">{{ $data->category->name }}</a></small>
                    <small><a href="tech-single.html" title="">21 July, 2017</a></small>
                    <small><a href="tech-author.html" title="">by {{ $data->user->name }}</a></small>
                    <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i>{{ ' '. $data->views }}</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->

            <hr class="invis">
        @endforeach

        {{-- <hr class="invis"> --}}

        {{-- <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="{{ asset('client/upload/banner_02.jpg') }}" alt="" class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row --> --}}
    
    </div><!-- end blog-list -->
</div><!-- end page-wrapper -->

<hr class="invis">

<div class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-start">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div><!-- end col -->
</div><!-- end row -->
    
@endsection