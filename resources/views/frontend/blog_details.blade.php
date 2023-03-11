@include('frontend.include.header')
<title>{{@$blog->title}} - Pixel Pro Digital</title>
<div class="inner-banner" style="
background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
  url(asset(public/frontend/assets/images/bg/inner-banner.png));
">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerdot.png" class="inner-bannerdot" alt="image">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerwave.png" class="inner-bannerwave" alt="image">
    <a class="down-arrow-icon" href="#blog-details">
        <svg viewBox="0 0 14 26" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8182 18.469L7.24862 25.7462L0.679032 18.469C0.272584 18.0188 0.592074 17.3 1.19862 17.3L6.74862 17.3L6.74862 1C6.74862 0.723857 6.97248 0.5 7.24862 0.5C7.52477 0.5 7.74862 0.723857 7.74862 1L7.74862 17.3L13.2986 17.3C13.9052 17.3 14.2247 18.0188 13.8182 18.469Z" />
        </svg>
    </a>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center text-center">
            <div class="col-md-6">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{@$blog->title}}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb gap-3">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('blogs')}}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{@$blog->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="blog-details pt-120 pb-120" id="blog-details">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-8">
                <div class="blog-details-area">
                    <div class="blog-details-single">
                        <h3>{{@$blog->title}}</h3>
                        <ul class="meta ms-0 ps-0">
                            <li class="author">
                                <img src="{{asset('public/admin/assets/blog/'.$blog->author_image)}}" alt="image"><span>{{@$blog->author_name}}</span>
                            </li>
                            @php
                            $newtime = strtotime($blog->created_at);
                            $time = date('M d, Y',$newtime);
                            @endphp
                            <li class="date">
                                <img src="{{asset('public/frontend')}}/assets/images/icons/blog-stand-calndr.svg" alt="image"><span>{{@$time}}</span>
                            </li>
                        </ul>
                        <div class="image">
                            <!-- <div class="react-ellips">
                                <i class="bi bi-heart"></i>
                                <h5>520</h5>
                            </div> -->
                            <img src="{{asset('public/admin/assets/blog/'.$blog->image)}}" class="img-fluid" alt="image">
                        </div>
                        <div class="content">

                            <p class="para">{{@$blog->description}}</p>
                            <!-- <div class="row mt-60 mb-45 g-4">
                                <div class="col-md-6">
                                    <div class="blog-qoote-area style-2">
                                        <h5> "Don’t bunt. Aim out of the ballpark. Aim for the company of immortals."</h5>
                                        <h4>-David Ogilvy-</h4>
                                        <div class="quote-area">
                                            <img src="{{asset('public/frontend')}}/assets/images/icons/blog-stand-qote.svg" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="quote-details">
                                        <h5>Foundations of UX Writing by the University of Washington</h5>
                                        <p class="para">Worked in customer service? You have a deep understanding of the customer experience. What annoys them and what services they wish were available. With some creative thinking, you can work almost any previous work experience.</p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <h4>Think Like an Editor (Content Strategy and UX Writing)</h4>
                            <p class="para">geism in the web development field is certainly out there. Though it needn’t prevent you from embarking on an intellectually rewarding (and well-paid) career path! A willingness to learn, and some creative thinking to tie in your past experience goes a long way.</p>
                            <p class="para mb-0">Try to find a way to connect your past experience to your present. Don’t be afraid to throw in a silly anecdote or two about your journey. Test it out on some friends to see if it makes sense. That’s your narrative!</p>
                            <div class="row blog-format g-4">
                                <div class="col-lg-6">
                                    <div class="blog-image-slider mb-0">
                                        <div class="swiper blog-standard-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{asset('public/frontend')}}/assets/images/blog/blog-stand-slide1.png" class="img-fluid" alt="image">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{asset('public/frontend')}}/assets/images/blog/blog-stand-slide2.png" class="img-fluid" alt="image">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{asset('public/frontend')}}/assets/images/blog/blog-stand-slide3.png" class="img-fluid" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider-arrows2 style-5 d-flex justify-content-between gap-4 w-100">
                                            <div class="blogstan-prev1 swiper-prev-arrow" tabindex="0" role="button" aria-label="Previous slide">
                                                <svg width="40" height="40" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="20" cy="20" r="20" stroke-width="1.5" />
                                                    <path d="M20 27.573V23V18.427C20 18.2574 19.8022 18.1648 19.672 18.2734L14 23L19.672 27.7266C19.8022 27.8352 20 27.7426 20 27.573Z" />
                                                    <path d="M32 23.5C32.2761 23.5 32.5 23.2761 32.5 23C32.5 22.7239 32.2761 22.5 32 22.5V23.5ZM19.672 27.7266L19.9921 27.3425V27.3425L19.672 27.7266ZM14 23L13.6799 22.6159L13.219 23L13.6799 23.3841L14 23ZM19.672 18.2734L19.3519 17.8893L19.3519 17.8893L19.672 18.2734ZM32 22.5H20V23.5H32V22.5ZM19.5 23V27.573H20.5V23H19.5ZM19.9921 27.3425L14.3201 22.6159L13.6799 23.3841L19.3519 28.1107L19.9921 27.3425ZM14.3201 23.3841L19.9921 18.6575L19.3519 17.8893L13.6799 22.6159L14.3201 23.3841ZM19.5 18.427V23H20.5V18.427H19.5ZM19.9921 18.6575C19.7967 18.8203 19.5 18.6814 19.5 18.427H20.5C20.5 17.8335 19.8078 17.5093 19.3519 17.8893L19.9921 18.6575ZM19.5 27.573C19.5 27.3186 19.7967 27.1797 19.9921 27.3425L19.3519 28.1107C19.8078 28.4907 20.5 28.1665 20.5 27.573H19.5Z" />
                                                </svg>
                                            </div>
                                            <div class="blogstan-next1 swiper-next-arrow" tabindex="0" role="button" aria-label="Next slide">
                                                <svg width="40" height="40" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="20" cy="20" r="20" />
                                                    <path d="M26 18.427V23V27.573C26 27.7426 26.1978 27.8352 26.328 27.7266L32 23L26.328 18.2734C26.1978 18.1648 26 18.2574 26 18.427Z" />
                                                    <path d="M14 22.5C13.7239 22.5 13.5 22.7239 13.5 23C13.5 23.2761 13.7239 23.5 14 23.5V22.5ZM26.328 18.2734L26.0079 18.6575V18.6575L26.328 18.2734ZM32 23L32.3201 23.3841L32.781 23L32.3201 22.6159L32 23ZM26.328 27.7266L26.6481 28.1107L26.6481 28.1107L26.328 27.7266ZM14 23.5H26V22.5H14V23.5ZM26.5 23V18.427H25.5V23H26.5ZM26.0079 18.6575L31.6799 23.3841L32.3201 22.6159L26.6481 17.8893L26.0079 18.6575ZM31.6799 22.6159L26.0079 27.3425L26.6481 28.1107L32.3201 23.3841L31.6799 22.6159ZM26.5 27.573V23H25.5V27.573H26.5ZM26.0079 27.3425C26.2033 27.1797 26.5 27.3186 26.5 27.573H25.5C25.5 28.1665 26.1922 28.4907 26.6481 28.1107L26.0079 27.3425ZM26.5 18.427C26.5 18.6814 26.2033 18.8203 26.0079 18.6575L26.6481 17.8893C26.1922 17.5093 25.5 17.8335 25.5 18.427H26.5Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="blog-details-video">
                                        <div class="video-play style-2">
                                            <a href="https://www.youtube.com/watch?v=u31qwQUeGuM" class="popup-youtube video-icon"><i class="bx bx-play"></i></a>
                                        </div>
                                        <img src="{{asset('public/frontend')}}/assets/images/blog/blog-stand2.png" class="img-fluid" alt="image">
                                    </div>
                                </div>
                            </div>
                            <h4>What You Should Do Now</h4>
                            <ul class="blog-details-list">
                                <li>You’ll use these concepts in whichever programming language you learn in the future.</li>
                                <li>That way you have an overview before you start mastering a dedicated language..</li>
                                <li>Amazing Timing and Experience</li>
                            </ul>
                            <p class="para">Orem ipsum dolor sit &, sdt consectetu adipiscing elit. Aenean commodo ligula eget dolor. Cum socis Theme sed natoque ut penatibus Etiam ultricies nisi vel augue. Cura bitur an ultricies dictum felis eu pede sit. Etiam rhoncus. Maecenas tempus, tellus eget penatibus Rtiam.</p> -->
                            <div class="row blog-details-share gap-3">
                                <div class="col-lg-6 text-lg-start text-center">
                                    <h5>Share Your Timeline :</h5>
                                </div>
                                <div class="col-lg-6 text-lg-end text-center">
                                    <ul class="social gap-3">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/{{'blog-details'}}/{{@$blog->slug}}"><i class='bx bxl-facebook'></i></a></li>
                                        <li><a href="https://www.twitter.com/share?text={{url('/')}}/{{'blog-details'}}/{{@$blog->slug}}"><i class='bx bxl-twitter'></i></a></li>
                                        <li><a href="https://www.linkedin.com/sharing/share-offsite/?url={{url('/')}}/{{'blog-details'}}/{{@$blog->slug}}"><i class='bx bxl-linkedin'></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row blogd-category-area g-4">
                            <div class="col-lg-6">
                                <div class="category-box">
                                    <h4>Categories:</h4>
                                    <ul class="cat-list">
                                        <li><a href="#">Branding</a></li>
                                        <li><a href="#">Agency</a></li>
                                        <li><a href="#">Design</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="category-box">
                                    <h4>Tags:</h4>
                                    <ul class="cat-list">
                                        <li><a href="#">Ui/Ux</a></li>
                                        <li><a href="#">Develop</a></li>
                                        <li><a href="#">Advertising</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="commetn-area">
                        <div class="comment-title">
                            <h3>03 Comments</h3>
                        </div>
                        <ul class="comment-list">
                            <li>
                                <div class="comment-item">
                                    <div class="image">
                                        <img src="{{asset('public/frontend')}}/assets/images/blog/comment-author1.png" alt="image">
                                    </div>
                                    <div class="content">
                                        <div class="comment-meta">
                                            <h5>Loretta Shelton</h5><span>25 January, 2022</span>
                                        </div>
                                        <p>With the most complete toolkit on the market for businesses that want to accept online payments, Stripe has established itself as “The new standard in online payments</p>
                                        <button class="reply">Reply<i class="bi bi-reply"></i></button>
                                    </div>
                                </div>
                                <ul class="comment-reply">
                                    <li>
                                        <div class="comment-item">
                                            <div class="image">
                                                <img src="{{asset('public/frontend')}}/assets/images/blog/comment-author2.png" alt="image">
                                            </div>
                                            <div class="content">
                                                <div class="comment-meta">
                                                    <h5>Loretta Shelton</h5><span>25 January, 2022</span>
                                                </div>
                                                <p>With the most complete toolkit on the market for businesses that want to accept online payments, Stripe has established itself as “The new standard in online payments</p>
                                                <button class="reply">Reply<i class="bi bi-reply"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment-item">
                                    <div class="image">
                                        <img src="{{asset('public/frontend')}}/assets/images/blog/comment-author3.png" alt="image">
                                    </div>
                                    <div class="content">
                                        <div class="comment-meta">
                                            <h5>Darrell Steward</h5><span>25 August, 2022</span>
                                        </div>
                                        <p>With the most complete toolkit on the market for businesses that want...</p>
                                        <button class="reply">Reply<i class="bi bi-reply"></i></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="comment-respond">
                        <div class="comment-title">
                            <h3>Write A Comments</h3>
                            <p>Your email address will not be published.</p>
                        </div>
                        <form>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="form-inner">
                                        <input type="text" name="fname" placeholder="Your Name: *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-inner">
                                        <input type="text" name="fname" placeholder="Email Address:">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <input type="text" name="fname" placeholder="Website:">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <textarea name="message" cols="30" rows="6" placeholder="Write a Comments"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-start">
                                    <input type="submit" value="Submit Now " class="eg-btn btn--submit">
                                </div>
                            </div>
                        </form>
                    </div> -->
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
                                                        $newtime = strtotime($blog->created_at);
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
                    <!-- <div class="blog-widget-item">
                        <div class="blog-category">
                            <h5 class="blog-widget-title">Post Category</h5>
                            <div class="blog-widget-body">
                                <ul class="category-list">
                                    <li><a href="#"><span>Branding</span><span><i class="bi bi-chevron-right"></i></span></a></li>
                                    <li><a href="#"><span>Creative Agency</span><span><i class="bi bi-chevron-right"></i></span></a></li>
                                    <li><a href="#"><span>One Page Template</span><span><i class="bi bi-chevron-right"></i></span></a></li>
                                    <li><a href="#"><span>Inspiration</span><span><i class="bi bi-chevron-right"></i></span></a></li>
                                    <li><a href="#"><span>Business</span><span><i class="bi bi-chevron-right"></i></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="blog-widget-item">
                        <div class="post-tag">
                            <h5 class="blog-widget-title">Post Tag</h5>
                            <div class="blog-widget-body">
                                <ul class="tag-list d-flex justify-content-start flex-wrap gap-4">
                                    <li><a href="#">Advertising</a></li>
                                    <li><a href="#">Website UI</a></li>
                                    <li><a href="#">Agency</a></li>
                                    <li><a href="#">Advertising</a></li>
                                    <li><a href="#">ui/Ux </a></li>
                                    <li><a href="#">Website UI</a></li>
                                    <li><a href="#">branding</a></li>
                                    <li><a href="#">agency branding</a></li>
                                    <li><a href="#">Website UI</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="blog-widget-item">
                        <div class="follow-area">
                            <h5 class="blog-widget-title mb-1">Follow Us</h5>
                            <p class="para">Follow us on Social Network</p>
                            <div class="blog-widget-body">
                                <ul class="follow-list d-flex flex-row align-items-start gap-4">
                                    <li><a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i></a></li>
                                    <li><a href="https://www.twitter.com/"><i class='bx bxl-twitter'></i></a></li>
                                    <li><a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a></li>
                                    <li><a href="https://www.pinterest.com/"><i class='bx bxl-pinterest'></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.include.footer')