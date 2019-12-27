@extends('client.master')

@section('title')

@endsection

@section('content')

<div class="page-wrapper">
    <div class="blog-title-area text-center">
        <ol class="breadcrumb hidden-xs-down">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active">{{ $post->title }}</li>
        </ol>

        <span class="color-orange"><a href="tech-category-01.html" title="">{{ $post->category->name }}</a></span>

        <h3>{{ $post->title }}</h3>

        <div class="blog-meta big-meta">
            <small><a href="tech-single.html" title="">21 July, 2017</a></small>
            <small><a href="tech-author.html" title="">by {{ $post->user->name }}</a></small>
            <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
        </div><!-- end meta -->

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
    </div><!-- end title -->

    <div class="single-post-media">
        <img src="{{ asset('img/upload/post/' . $post->image) }}" alt="" class="img-thumail" height="400">
    </div><!-- end media -->

    <div class="blog-content">  
        <div class="pp">
            {!! $post->content !!}
        </div><!-- end pp -->
    </div><!-- end content -->

    <div class="blog-title-area">
        <div class="tag-cloud-single">
            <span>Tags</span>
            <small><a href="#" title="">lifestyle</a></small>
            <small><a href="#" title="">colorful</a></small>
            <small><a href="#" title="">trending</a></small>
            <small><a href="#" title="">another tag</a></small>
        </div><!-- end meta -->

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
    </div><!-- end title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end col -->
    </div><!-- end row -->

    <hr class="invis1">

    <div class="custombox clearfix">
        <h4 class="small-title">3 Comments</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="comments-list">
                    @foreach($post->comments as $cm)
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="upload/author.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading user_name">{{ $cm->user->name }}<small>5 days ago</small></h4>
                                <p>{{ $cm->content }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end custom-box -->

    <hr class="invis1">

    <div class="custombox clearfix">
        <h4 class="small-title">Leave a Reply</h4>
        <div class="row">
            <div class="col-lg-12">
                @if($errors->count() > 0)
                        <p class="alert alert-danger">{{ $errors->first('comment') }}</p>
                @endif
                <form class="form-wrapper" action="{{ route('post.comment', $post->id) }}"" method="post">
                    @csrf
                    <textarea class="form-control" name="comment" placeholder="Your comment"></textarea>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- end page-wrapper -->
    
@endsection