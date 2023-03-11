@include('frontend.include.header')
<title>Blogs - Pixel Pro Digital</title>
<div class="inner-banner" style="
background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
  url(public/frontend/assets/images/bg/inner-banner.png);
">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerdot.png" class="inner-bannerdot" alt="image">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerwave.png" class="inner-bannerwave" alt="image">
    <a class="down-arrow-icon" href="#blog-standard">
        <svg viewBox="0 0 14 26" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8182 18.469L7.24862 25.7462L0.679032 18.469C0.272584 18.0188 0.592074 17.3 1.19862 17.3L6.74862 17.3L6.74862 1C6.74862 0.723857 6.97248 0.5 7.24862 0.5C7.52477 0.5 7.74862 0.723857 7.74862 1L7.74862 17.3L13.2986 17.3C13.9052 17.3 14.2247 18.0188 13.8182 18.469Z" />
        </svg>
    </a>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center text-center">
            <div class="col-md-6">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Blogs</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb gap-3">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Standard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="blog-standard pt-120 pb-120" id="blog-standard">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-8">
                <div class="blog-standard-area">
                    @if(isset($blogs))
                    @foreach($blogs as $list)
                    <div class="blog-standard-single">
                        <h3>{{@$list->title}}</h3>
                        <ul class="meta ms-0 ps-0">
                            <li class="author">
                                <img src="{{asset('public/admin/assets/blog/'.$list->author_image)}}" alt="image"><span>{{@$list->author_name}}</span>
                            </li>
                            <li class="date">
                                @php
                                $newtime = strtotime($list->created_at);
                                $time = date('M d, Y',$newtime);
                                @endphp
                                <img src="{{asset('public/frontend')}}/assets/images/icons/blog-stand-calndr.svg" alt="image"><span>{{$time}}</span>
                            </li>
                        </ul>
                        <div class="image">
                            <!-- <div class="react-ellips">
                                <i class="bi bi-heart"></i>
                                <h5>520</h5>
                            </div> -->
                            <img src="{{asset('public/admin/assets/blog/'.$list->image)}}" class="img-fluid" alt="image">
                        </div>
                        <div class="content">
                            <p class="para">{{@$list->description}}</p>
                        </div>
                        <div class="bottom-area">
                            <div class="blog-btn">
                                <a href="{{url('blog-details/'.@$list->slug)}}">Read More</a>
                            </div>
                            <div class="blog-share">
                                <div class="front">
                                    <img src="{{asset('public/frontend')}}/assets/images/icons/blog-share-icon.svg" alt="image"><span>SHARE</span>
                                </div>
                                <div class="back">
                                    <ul class="share-list d-flex flex-row align-items-start gap-3">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/{{'blog-details'}}/{{@$list->slug}}"><i class='bx bxl-facebook'></i></a></li>
                                        <li><a href="https://www.twitter.com/share?text={{url('/')}}/{{'blog-details'}}/{{@$list->slug}}"><i class='bx bxl-twitter'></i></a></li>
                                        <li><a href="https://www.linkedin.com/sharing/share-offsite/?url={{url('/')}}/{{'blog-details'}}/{{@$list->slug}}"><i class='bx bxl-linkedin'></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <div class="blog-widget-item">
                        <div class="search-area">
                            <div class="blog-widget-body">
                                <form>
                                    <div class="search-with-btn">
                                        <input type="text" placeholder="Search Here">
                                        <button><i class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="blog-widget-item">
                        <div class="recent-blog">
                            <h5 class="blog-widget-title">Recent Posts</h5>
                            <div class="blog-widget-body">
                                <ul class="recent-post-list">
                                    @if(isset($blogs))
                                    @foreach($blogs as $list)
                                    <li>
                                        <a href="{{url('blog-details/'.@$list->slug)}}">
                                            <div class="recent-post-item">
                                                <div class="recent-post-img">
                                                    <img src="{{asset('public/admin/assets/blog/'.$list->image)}}" alt="image" width="80px">
                                                </div>
                                                <div class="recent-post-content">
                                                    <h6>{{@$list->title}}</h6>
                                                    <div class="meta">
                                                        @php
                                                        $newtime = strtotime($list->created_at);
                                                        $time = date('M d, Y',$newtime);
                                                        @endphp
                                                        <img src="{{asset('public/frontend')}}/assets/images/icons/post-calendar.svg" alt="image">
                                                        <p>{{$time}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.include.footer')