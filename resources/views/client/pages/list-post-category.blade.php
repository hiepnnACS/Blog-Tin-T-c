@extends('client.master')

@section('title')
    Category
@endsection

@section('jumbotron')
<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-play bg-orange"></i> {{ $listPost[0]->category->name }} <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active">{{ $listPost[0]->category->name }}</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div>
@endsection
@section('content')

    <div class="page-wrapper">
        <div class="blog-custom-build">
            @foreach($listPost as $post)
                <div class="blog-box">
                    <div class="post-media">
                        <a href="{{ route('post.detail', $post->url_slug) }}" title="">
                            <img height="500" src="{{ asset('img/upload/post/'. $post->image) }}" alt="" class="img-thumnail">
                            <div class="hovereffect">
                                <span class="videohover"></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                        <h4><a href="{{ route('post.detail', $post->url_slug) }}" title="">{{ $post->title }}</a></h4>
                        <p>{{ $post->content_limit }}</p>
                        <small><a href="tech-category.html" title="">{{ $post->category->name }}</a></small>
                        <small><a href="{{ route('post.detail', $post->url_slug) }}" title="">18 July, 2017</a></small>
                        <small><a href="tech-author.html" title="">by {{ $post->user->name }}</a></small>
                        <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->

                <hr class="invis">
                
            @endforeach

        </div><!-- end blog-custom-build -->
    </div><!-- end page-wrapper -->

    <hr class="invis">

    <div class="row">
        {{ $listPost->links() }}
    </div><!-- end row -->            
    
@endsection