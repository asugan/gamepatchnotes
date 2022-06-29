@extends('layout.main')
@section('content')
    <!-- heading-news-section
			================================================== -->
    <section class="heading-news3">
        <div class="heading-news-box">
            <div class="container">
                <h1>Popular Games Out Now</h1>
            </div>
            <div class="owl-wrapper">
                <div class="owl-carousel" data-num="4">
                    @foreach($games as $game)
                        <div class="item">
                            <div class="news-post image-post">
                                <div class="post-gallery">
                                    <img src="{{ url('storage/' . $game->game_image) }}" alt=""/>
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post" href="game-category.html"
                                            >{{ $game->genre }}</a
                                            >
                                            <h2>
                                                <a href="single-post.html"
                                                >{{ $game->game_name }}</a
                                                >
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">Admin</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit. Donec odio. Quisque volutpat mattis eros. Nullam
                                                malesuada erat ut turpis. Suspendisse urna nibh,
                                                viverra non, semper suscipit, posuere a, pede.
                                            </p>
                                            <div class="rate-level">
                                                <p><span>9.2</span> Amazing</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End heading-news-section -->

    <!-- feature-video-section
          ================================================== -->
    <section class="feature-video">
        <div class="container">
            <div class="title-section white">
                <h1><span>Latest Reviews</span></h1>
            </div>

            <div class="features-video-box owl-wrapper">
                <div class="owl-carousel" data-num="4">
                    @foreach($patchnotes as $patchnote)
                        <div class="item news-post image-post3">
                            <img alt="" src="{{ url('storage/' . $patchnote->post_image) }}"/>
                            <div class="rate-level">
                                <p><span>9.2</span> Amazing</p>
                            </div>
                            <div class="hover-box">
                                <h2>
                                    <a href="single-post.html"
                                    >{{ $patchnote->post_title }}
                                    </a>
                                </h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End feature-video-section -->

    <!-- block-wrapper-section
          ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <!-- block content -->
                    <div class="block-content">
                        <!-- grid box -->
                        <div class="grid-box">
                            <div class="title-section">
                                <h1><span>Latest Game's</span></h1>
                            </div>

                            <ul class="category-filter-posts">
                                <li><a class="active" href="#">All</a></li>
                                <li><a href="#">Xbox one</a></li>
                                <li><a href="#">PS4</a></li>
                                <li><a href="#">WII U</a></li>
                                <li><a href="#">PC</a></li>
                            </ul>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-posts">
                                        @foreach($games->take(4) as $game)
                                            <li>
                                                <img src="{{ url('storage/' . $game->game_image) }}" alt=""/>
                                                <div class="post-content">
                                                    <h2>
                                                        <a href="single-post.html"
                                                        >{{ $game->game_name }}
                                                        </a>
                                                    </h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-posts">
                                        @foreach($latestgame as $game)
                                            <li>
                                                <img src="{{ url('storage/' . $game->game_image) }}" alt=""/>
                                                <div class="post-content">
                                                    <h2>
                                                        <a href="single-post.html"
                                                        >{{ $game->game_name }}
                                                        </a>
                                                    </h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End grid box -->

                        <!-- carousel box -->
                        <div class="carousel-box owl-wrapper">
                            <div class="title-section">
                                <h1><span>Most played games</span></h1>
                            </div>
                            <div class="owl-carousel" data-num="4">
                                @foreach($games->take(8) as $game)
                                    <div class="item news-post image-post3">
                                        <img src="{{ url('storage/' . $game->game_image) }}" alt=""/>
                                        <div class="hover-box">
                                            <h2>
                                                <a href="single-post.html"
                                                >{{ $game->game_name }}</a
                                                >
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End carousel box -->

                        <!-- google addsense -->
                        <div class="advertisement">
                            <div class="desktop-advert">
                                <span>Advertisement</span>
                                <img src="upload/addsense/728x90-white.jpg" alt=""/>
                            </div>
                            <div class="tablet-advert">
                                <span>Advertisement</span>
                                <img src="upload/addsense/468x60-white.jpg" alt=""/>
                            </div>
                            <div class="mobile-advert">
                                <span>Advertisement</span>
                                <img src="upload/addsense/300x250.jpg" alt=""/>
                            </div>
                        </div>
                        <!-- End google addsense -->

                        <!-- article box -->
                        <div class="article-box">
                            <div class="title-section">
                                <h1><span>Latest Articles</span></h1>
                            </div>

                            <div class="news-post article-post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="post-gallery">
                                            <img alt="" src="upload/news-posts/art1.jpg"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="post-content">
                                            <h2>
                                                <a href="single-post.html"
                                                >Pellentesque odio nisi, euismod in, pharetra a,
                                                    ultricies in, diam. Sed arcu. Cras consequat.</a
                                                >
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">John Doe</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                            <span class="post-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span>
                                            <p>
                                                Nullam malesuada erat ut turpis. Suspendisse urna
                                                nibh, viverra non, semper suscipit, posuere a, pede.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="news-post article-post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="post-gallery">
                                            <img alt="" src="upload/news-posts/art2.jpg"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="post-content">
                                            <h2>
                                                <a href="single-post.html"
                                                >Sed arcu. Cras consequat.</a
                                                >
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">John Doe</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                            <span class="post-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span>
                                            <p>
                                                Nullam malesuada erat ut turpis. Suspendisse urna
                                                nibh, viverra non, semper suscipit, posuere a, pede.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="news-post article-post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="post-gallery">
                                            <img alt="" src="upload/news-posts/art3.jpg"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="post-content">
                                            <h2>
                                                <a href="single-post.html"
                                                >Praesent dapibus, neque id cursus faucibus,
                                                    tortor neque egestas augue, eu vulputate magna
                                                    eros eu erat. Aliquam erat volutpat.
                                                </a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">John Doe</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                            <span class="post-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span>
                                            <p>
                                                Nullam malesuada erat ut turpis. Suspendisse urna
                                                nibh, viverra non, semper suscipit, posuere a, pede.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="news-post article-post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="post-gallery">
                                            <img alt="" src="upload/news-posts/art4.jpg"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="post-content">
                                            <h2>
                                                <a href="single-post.html"
                                                >Aliquam erat volutpat. Nam dui mi, tincidunt
                                                    quis, accumsan porttitor, facilisis luctus,
                                                    metus.</a
                                                >
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">John Doe</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                            <span class="post-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span>
                                            <p>
                                                Nullam malesuada erat ut turpis. Suspendisse urna
                                                nibh, viverra non, semper suscipit, posuere a, pede.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="center-button">
                                <a href="#">Show me more</a>
                            </div>
                        </div>
                        <!-- End article box -->
                    </div>
                    <!-- End block content -->
                </div>

                <div class="col-sm-4">
                    <!-- sidebar -->
                    <div class="sidebar">
                        <div class="widget social-widget">
                            <div class="title-section">
                                <h1><span>Stay Connected</span></h1>
                            </div>
                            <ul class="social-share">
                                <li>
                                    <a href="#" class="rss"><i class="fa fa-rss"></i></a>
                                    <span class="number">9,455</span>
                                    <span>Subscribers</span>
                                </li>
                                <li>
                                    <a href="#" class="facebook"
                                    ><i class="fa fa-facebook"></i
                                        ></a>
                                    <span class="number">56,743</span>
                                    <span>Fans</span>
                                </li>
                                <li>
                                    <a href="#" class="twitter"
                                    ><i class="fa fa-twitter"></i
                                        ></a>
                                    <span class="number">43,501</span>
                                    <span>Followers</span>
                                </li>
                                <li>
                                    <a href="#" class="google"
                                    ><i class="fa fa-google-plus"></i
                                        ></a>
                                    <span class="number">35,003</span>
                                    <span>Followers</span>
                                </li>
                            </ul>
                        </div>

                        <div class="widget tab-posts-widget">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active">
                                    <a href="#option1" data-toggle="tab">Popular</a>
                                </li>
                                <li>
                                    <a href="#option2" data-toggle="tab">Recent</a>
                                </li>
                                <li>
                                    <a href="#option3" data-toggle="tab">Top Reviews</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="option1">
                                    <ul class="list-posts">
                                        <li>
                                            <img src="upload/news-posts/listw1.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Pellentesque odio nisi, euismod in, pharetra a,
                                                        ultricies in, diam.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw2.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Sed arcu. Cras consequat.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw3.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Phasellus ultrices nulla quis nibh. Quisque a
                                                        lectus.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw4.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Donec consectetuer ligula vulputate sem
                                                        tristique cursus.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw5.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Nam nulla quam, gravida non, commodo a, sodales
                                                        sit amet, nisi.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="option2">
                                    <ul class="list-posts">
                                        <li>
                                            <img src="upload/news-posts/listw3.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Phasellus ultrices nulla quis nibh. Quisque a
                                                        lectus.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw4.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Donec consectetuer ligula vulputate sem
                                                        tristique cursus.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw5.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Nam nulla quam, gravida non, commodo a, sodales
                                                        sit amet, nisi.</a
                                                    >
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="upload/news-posts/listw1.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Pellentesque odio nisi, euismod in, pharetra a,
                                                        ultricies in, diam.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw2.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Sed arcu. Cras consequat.</a
                                                    >
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="option3">
                                    <ul class="list-posts">
                                        <li>
                                            <img src="upload/news-posts/listw4.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Donec consectetuer ligula vulputate sem
                                                        tristique cursus.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw1.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Pellentesque odio nisi, euismod in, pharetra a,
                                                        ultricies in, diam.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw3.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Phasellus ultrices nulla quis nibh. Quisque a
                                                        lectus.
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw2.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Sed arcu. Cras consequat.</a
                                                    >
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="upload/news-posts/listw5.jpg" alt=""/>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="single-post.html"
                                                    >Nam nulla quam, gravida non, commodo a, sodales
                                                        sit amet, nisi.</a
                                                    >
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget post-widget">
                            <div class="title-section">
                                <h1><span>Most Commented</span></h1>
                            </div>
                            <ul class="list-posts">
                                <li>
                                    <img src="upload/news-posts/listw4.jpg" alt=""/>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Donec consectetuer ligula vulputate sem tristique
                                                cursus.
                                            </a>
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <img src="upload/news-posts/listw1.jpg" alt=""/>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Pellentesque odio nisi, euismod in, pharetra a,
                                                ultricies in, diam.
                                            </a>
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <img src="upload/news-posts/listw3.jpg" alt=""/>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Phasellus ultrices nulla quis nibh. Quisque a
                                                lectus.
                                            </a>
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <img src="upload/news-posts/listw2.jpg" alt=""/>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Sed arcu. Cras consequat.</a
                                            >
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <img src="upload/news-posts/listw5.jpg" alt=""/>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Nam nulla quam, gravida non, commodo a, sodales sit
                                                amet, nisi.</a
                                            >
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="advertisement">
                            <div class="desktop-advert">
                                <span>Advertisement</span>
                                <img src="upload/addsense/300x250.jpg" alt=""/>
                            </div>
                            <div class="tablet-advert">
                                <span>Advertisement</span>
                                <img src="upload/addsense/200x200.jpg" alt=""/>
                            </div>
                            <div class="mobile-advert">
                                <span>Advertisement</span>
                                <img src="upload/addsense/300x250.jpg" alt=""/>
                            </div>
                        </div>
                    </div>
                    <!-- End sidebar -->
                </div>
            </div>
        </div>
    </section>
    <!-- End block-wrapper-section -->

    <!-- block-wrapper-section
          ================================================== -->
    <section class="block-wrapper non-sidebar">
        <div class="container">
            <!-- block content -->
            <div class="block-content non-sidebar">
                <!-- grid-box -->
                <div class="grid-box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="title-section">
                                <h1><span>Latest Deals</span></h1>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="news-post standard-post">
                                        <div class="post-gallery">
                                            <img src="upload/news-posts/st1.jpg" alt=""/>
                                        </div>
                                        <div class="post-content">
                                            <h2>
                                                <a href="single-post.html"
                                                >Pellentesque odio nisi, euismod in, pharetra a,
                                                    ultricies in, diam.
                                                </a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">John Doe</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="news-post standard-post">
                                        <div class="post-gallery">
                                            <img src="upload/news-posts/st2.jpg" alt=""/>
                                        </div>
                                        <div class="post-content">
                                            <h2>
                                                <a href="single-post.html"
                                                >Pellentesque odio nisi, euismod in, pharetra a,
                                                    ultricies in, diam.
                                                </a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">John Doe</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-posts">
                                <li>
                                    <img src="upload/news-posts/list4.jpg" alt=""/>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Aliquam erat volutpat. Nam dui mi, tincidunt quis,
                                                accumsan porttitor, facilisis luctus, metus.</a
                                            >
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            <li>
                                                <i class="fa fa-user"></i>by
                                                <a href="#">John Doe</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                ><i class="fa fa-comments-o"></i
                                                    ><span>23</span></a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <img src="upload/news-posts/list5.jpg" alt=""/>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Nam dui mi, tincidunt quis, accumsan porttitor,
                                                facilisis luctus, metus.</a
                                            >
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            <li>
                                                <i class="fa fa-user"></i>by
                                                <a href="#">John Doe</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                ><i class="fa fa-comments-o"></i
                                                    ><span>23</span></a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <img src="upload/news-posts/list6.jpg" alt=""/>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Nullam malesuada erat ut turpis. Suspendisse urna
                                                nibh, viverra non, semper suscipit, posuere a,
                                                pede.</a
                                            >
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            <li>
                                                <i class="fa fa-user"></i>by
                                                <a href="#">John Doe</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                ><i class="fa fa-comments-o"></i
                                                    ><span>23</span></a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <div class="title-section">
                                <h1><span>Latest Reviews</span></h1>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="news-post standard-post">
                                        <div class="post-gallery">
                                            <img src="upload/news-posts/st3.jpg" alt=""/>
                                            <div class="rate-level">
                                                <p><span>5.0</span> Mediocre</p>
                                            </div>
                                        </div>
                                        <div class="post-content">
                                            <h2>
                                                <a href="single-post.html"
                                                >Pellentesque odio nisi, euismod in, pharetra a,
                                                    ultricies in, diam.
                                                </a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">John Doe</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="news-post standard-post">
                                        <div class="post-gallery">
                                            <img src="upload/news-posts/st4.jpg" alt=""/>
                                            <div class="rate-level">
                                                <p><span>7.4</span> Good</p>
                                            </div>
                                        </div>
                                        <div class="post-content">
                                            <h2>
                                                <a href="single-post.html"
                                                >Pellentesque odio nisi, euismod in, pharetra a,
                                                    ultricies in, diam.
                                                </a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li>
                                                    <i class="fa fa-user"></i>by
                                                    <a href="#">John Doe</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                    ><i class="fa fa-comments-o"></i
                                                        ><span>23</span></a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-posts">
                                <li>
                                    <img src="upload/news-posts/list1.jpg" alt=""/>
                                    <div class="rate-level">
                                        <p><span>5.0</span> Mediocre</p>
                                    </div>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Nam dui mi, tincidunt quis, accumsan porttitor,
                                                facilisis luctus, metus.</a
                                            >
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            <li>
                                                <i class="fa fa-user"></i>by
                                                <a href="#">John Doe</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                ><i class="fa fa-comments-o"></i
                                                    ><span>23</span></a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <img src="upload/news-posts/list2.jpg" alt=""/>
                                    <div class="rate-level">
                                        <p><span>6.0</span> Okay</p>
                                    </div>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Suspendisse urna nibh, viverra non, semper
                                                suscipit, posuere a, pede.</a
                                            >
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            <li>
                                                <i class="fa fa-user"></i>by
                                                <a href="#">John Doe</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                ><i class="fa fa-comments-o"></i
                                                    ><span>23</span></a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <img src="upload/news-posts/list3.jpg" alt=""/>
                                    <div class="rate-level">
                                        <p><span>9.0</span> Amazing</p>
                                    </div>
                                    <div class="post-content">
                                        <h2>
                                            <a href="single-post.html"
                                            >Aliquam porttitor mauris sit amet orci. Aenean
                                                dignissim pellentesque felis.</a
                                            >
                                        </h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            <li>
                                                <i class="fa fa-user"></i>by
                                                <a href="#">John Doe</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                ><i class="fa fa-comments-o"></i
                                                    ><span>23</span></a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End grid-box -->

                <!-- google addsense -->
                <div class="advertisement">
                    <div class="desktop-advert">
                        <span>Advertisement</span>
                        <img src="upload/addsense/728x90-white.jpg" alt=""/>
                    </div>
                    <div class="tablet-advert">
                        <span>Advertisement</span>
                        <img src="upload/addsense/468x60-white.jpg" alt=""/>
                    </div>
                    <div class="mobile-advert">
                        <span>Advertisement</span>
                        <img src="upload/addsense/300x250.jpg" alt=""/>
                    </div>
                </div>
                <!-- End google addsense -->
            </div>
            <!-- End block content -->
        </div>
    </section>
    <!-- End block-wrapper-section -->
@endsection


