<section class="section first-section">
    <div class="container-thumnail">
        <div class="masonry-blog clearfix">
            <div class="first-slot">
                <div class="masonry-box post-media">
                     <img src="{{ asset('img/upload/post/'. $highlight_post[0]->image) }}" width="788" height="443" alt="" class="img-thumnail">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">{{ $highlight_post[0]->category->name }}</a></span>
                                <h4><a href="{{ route('post.detail', $highlight_post[0]->url_slug) }}" title="">{{ $highlight_post[0]->title }}</a></h4>
                                <small><a href="tech-single.html" title="">24 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">{{ $highlight_post[0]->category->name }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->

            <div class="second-slot">
                <div class="masonry-box post-media">
                     <img src="{{ asset('img/upload/post/'. $highlight_post[1]->image) }}" alt="" width="394" height="449" class="img-thumnail">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">{{ $highlight_post[1]->category->name }}</a></span>
                                <h4><a href="{{ route('post.detail', $highlight_post[1]->url_slug) }}" title="">{{ $highlight_post[1]->title }}</a></h4>
                                <small><a href="tech-single.html" title="">03 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">{{ $highlight_post[1]->user->name }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                     </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->

            <div class="last-slot">
                <div class="masonry-box post-media">
                     <img src="{{ asset('img/upload/post/'. $highlight_post[2]->image) }}" width="394" height="449" alt="" class="img-thumnail">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">{{ $highlight_post[2]->category->name }}</a></span>
                                <h4><a href="{{ route('post.detail', $highlight_post[2]->url_slug) }}" title="">{{ $highlight_post[2]->title }}</a></h4>
                                <small><a href="tech-single.html" title="">01 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">{{ $highlight_post[2]->user->name }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                     </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->
        </div><!-- end masonry -->
    </div>
</section>