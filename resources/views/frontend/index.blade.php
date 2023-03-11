@include('frontend.include.header')
<title>Home - Pixel Pro Digital</title>
@if($banner->status == 1)
<div class="banner-section1">
  <ul class="banner-social gap-5">
    <li><a href="https://www.twitter.com/">Twitter</a></li>
    <li><a href="https://www.facebook.com/">Facebook</a></li>
    <li><a href="https://www.instagram.com/">Instagram</a></li>
  </ul>
  <img src="{{asset('public/frontend')}}/assets/images/bg/banner-rain.png" class="banner-rain" alt="images" />
  <img src="{{asset('public/frontend')}}/assets/images/bg/banner-spring1.png" class="banner-spring1" alt="images" />
  <img src="{{asset('public/frontend')}}/assets/images/bg/banner-spring2.png" class="banner-spring2" alt="images" />
  <img src="{{asset('public/frontend')}}/assets/images/bg/banner-spring3.png" class="banner-spring3" alt="images" />
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="banner-content wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <span>Wellcome to Our Agency</span>
          <h1>{{$banner->heading}}</h1>
          <p>
            {{$banner->description}}
          </p>
          <div class="button-group gap-4">
            <a href="{{$banner->button_url}}" class="eg-btn btn--primary btn--lg">Book an Appointment</a>
            <div class="btn-with-vdo d-flex align-items-center gap-4">
              <div class="video-play">
                <a href="https://www.youtube.com/watch?v=u31qwQUeGuM" class="popup-youtube video-icon"><i class="bx bx-play"></i></a>
              </div>
              <!-- <a
                    href="https://www.youtube.com/watch?v=u31qwQUeGuM"
                    class="video-btn popup-youtube"
                    >How it works</a
                  > -->
              <a href="#" class="eg-btn btn--primary btn--lg" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Get A Quote</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 position-relative">
        <div class="solar-vector-area wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <img src="{{asset('public/admin/assets/banner/'.$banner->image)}}" class="img-fluid banner1-v1" alt="image" />
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if($about->status == 1)
<div class="about1-section pt-120 pb-120" style="background: linear-gradient(270deg, rgba(0,0,0,0.5) 40%, rgba(255,255,255,1) 100%);">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6 order-lg-1 order-2">
        <div class="about1-content wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <span>-About Our Company-</span>
          <h3>
            {{$about->heading}}
          </h3>
          <p class="para">
            {{$about->description}}
          </p>
          <ul class="about-list">
            <li><span></span> {{$about->subhead_one}}</li>
            <li><span></span> {{$about->subhead_two}}</li>
            <li><span></span> {{$about->subhead_three}}</li>
          </ul>
          <a href="{{$about->button_url}}" class="eg-btn btn--primary btn--lg">KNOW MORE</a>
        </div>
      </div>
      <div class="col-lg-6 order-lg-2 order-1">
        <div class="about-images wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <div class="row g-0">
            <div class="col-6">
              <img src="{{asset('public/admin/assets/about/'.$about->img_one)}}" class="about11 img-fluid" alt="image" />
              <div class="experience-tag">
                <div class="tag-inner">
                  <img src="{{asset('public/frontend')}}/assets/images/icons/medal-icon.svg" alt="image" />
                  <h5>{{$about->years_of_exp}}</h5>
                </div>
              </div>
            </div>
            <div class="col-6 position-relative">
              <img src="{{asset('public/admin/assets/about/'.$about->img_two)}}" class="about12 img-fluid" alt="image" />
              <img src="{{asset('public/admin/assets/about/'.$about->img_three)}}" class="about13 img-fluid" alt="image" />
              <img src="{{asset('public/frontend')}}/assets/images/icons/sun-icon.svg" class="sun-icon" alt="image" />
              <img src="{{asset('public/frontend')}}/assets/images/icons/about-dot.svg" class="about-dot" alt="image" />
              <img src="{{asset('public/frontend')}}/assets/images/icons/about-triangle.svg" class="about-triangle" alt="image" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
<div class="service-section pt-80 pb-80">
  <img src="{{asset('public/frontend')}}/assets/images/bg/water-mark1.png" alt="image" class="img-fluid water-mark1" />
  <img src="{{asset('public/frontend')}}/assets/images/bg/water-mark2.png" alt="image" class="img-fluid water-mark2" />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-title primary4">
          <span>-What We Offer-</span>
          <h3>Our Best Solution</h3>
          <p class="para">
            Get the most of reduction in your team’s operating costs for the
            whole product which creates amazing UI/UX experiences.
          </p>
        </div>
      </div>
    </div>
    <div class="row position-relative justify-content-center">
      <div class="swiper service-slider1 swiper-fix">
        <div class="swiper-wrapper">
          @if(isset($service))
          @foreach($service as $list)
          <div class="swiper-slide">
            <div class="service-item1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
              <div class="service-img">
                <a href="{{url('service-details/'.@$list->slug)}}" class="service-details-btn"><img src="{{asset('public/frontend')}}/assets/images/icons/arrow.svg" alt="image" /></a>
                <img alt="image" src="{{asset('public/admin/assets/service/'.$list->image)}}" />
                <div class="overlay"></div>
              </div>
              <div class="service-content">
                <div class="service-icon">
                  <img src="{{asset('public/admin/assets/service/'.$list->icon)}}" alt="image" />
                </div>
                <h4>
                  <a href="{{url('service-details/'.@$list->slug)}}">{{$list->title}}</a>
                </h4>
                <p class="para">
                  {!!$list->sub_desc!!}
                </p>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          <!-- <div class="swiper-slide">
            <div class="service-item1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.4s">
              <div class="service-img">
                <a href="service-details.html" class="service-details-btn"><img src="{{asset('public/frontend')}}/assets/images/icons/arrow.svg" alt="image" /></a>
                <img alt="image" src="{{asset('public/frontend')}}/assets/images/bg/service12.png" />
                <div class="overlay"></div>
              </div>
              <div class="service-content">
                <div class="service-icon">
                  <img src="{{asset('public/frontend')}}/assets/images/icons/brandsolution.svg" alt="image" />
                </div>
                <h4>
                  <a href="service-details.html">Branding Solution</a>
                </h4>
                <p class="para">
                  Get the most of reduction in your team’s operating costs
                  for the whole product
                </p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="service-item1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.6s">
              <div class="service-img">
                <a href="service-details.html" class="service-details-btn"><img src="{{asset('public/frontend')}}/assets/images/icons/arrow.svg" alt="image" /></a>
                <img alt="image" src="{{asset('public/frontend')}}/assets/images/bg/service13.png" />
                <div class="overlay"></div>
              </div>
              <div class="service-content">
                <div class="service-icon">
                  <img src="{{asset('public/frontend')}}/assets/images/icons/uiux.svg" alt="image" />
                </div>
                <h4><a href="service-details.html">Ui/Ux Design</a></h4>
                <p class="para">
                  Get the most of reduction in your team’s operating costs
                  for the whole product
                </p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="service-item1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.8s">
              <div class="service-img">
                <a href="service-details.html" class="service-details-btn"><img src="{{asset('public/frontend')}}/assets/images/icons/arrow.svg" alt="image" /></a>
                <img alt="image" src="{{asset('public/frontend')}}/assets/images/bg/service12.png" />
                <div class="overlay"></div>
              </div>
              <div class="service-content">
                <div class="service-icon">
                  <img src="{{asset('public/frontend')}}/assets/images/icons/webdev.svg" alt="image" />
                </div>
                <h4><a href="service-details.html">Graphics Design </a></h4>
                <p class="para">
                  Get the most of reduction in your team’s operating costs
                  for the whole product
                </p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="slider-arrows text-center d-xl-flex d-none justify-content-between">
        <div class="service-prev1 swiper-prev-arrow" tabindex="0" role="button" aria-label="Previous slide">
          <svg width="46" height="46" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
            <circle cx="23" cy="23" r="22.25" stroke-width="1.5" />
            <path d="M20 27.573V23V18.427C20 18.2574 19.8022 18.1648 19.672 18.2734L14 23L19.672 27.7266C19.8022 27.8352 20 27.7426 20 27.573Z" />
            <path d="M32 23.5C32.2761 23.5 32.5 23.2761 32.5 23C32.5 22.7239 32.2761 22.5 32 22.5V23.5ZM19.672 27.7266L19.9921 27.3425V27.3425L19.672 27.7266ZM14 23L13.6799 22.6159L13.219 23L13.6799 23.3841L14 23ZM19.672 18.2734L19.3519 17.8893L19.3519 17.8893L19.672 18.2734ZM32 22.5H20V23.5H32V22.5ZM19.5 23V27.573H20.5V23H19.5ZM19.9921 27.3425L14.3201 22.6159L13.6799 23.3841L19.3519 28.1107L19.9921 27.3425ZM14.3201 23.3841L19.9921 18.6575L19.3519 17.8893L13.6799 22.6159L14.3201 23.3841ZM19.5 18.427V23H20.5V18.427H19.5ZM19.9921 18.6575C19.7967 18.8203 19.5 18.6814 19.5 18.427H20.5C20.5 17.8335 19.8078 17.5093 19.3519 17.8893L19.9921 18.6575ZM19.5 27.573C19.5 27.3186 19.7967 27.1797 19.9921 27.3425L19.3519 28.1107C19.8078 28.4907 20.5 28.1665 20.5 27.573H19.5Z" />
          </svg>
        </div>
        <div class="service-next1 swiper-next-arrow" tabindex="0" role="button" aria-label="Next slide">
          <svg width="46" height="46" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
            <circle cx="23" cy="23" r="23" />
            <path d="M26 18.427V23V27.573C26 27.7426 26.1978 27.8352 26.328 27.7266L32 23L26.328 18.2734C26.1978 18.1648 26 18.2574 26 18.427Z" />
            <path d="M14 22.5C13.7239 22.5 13.5 22.7239 13.5 23C13.5 23.2761 13.7239 23.5 14 23.5V22.5ZM26.328 18.2734L26.0079 18.6575V18.6575L26.328 18.2734ZM32 23L32.3201 23.3841L32.781 23L32.3201 22.6159L32 23ZM26.328 27.7266L26.6481 28.1107L26.6481 28.1107L26.328 27.7266ZM14 23.5H26V22.5H14V23.5ZM26.5 23V18.427H25.5V23H26.5ZM26.0079 18.6575L31.6799 23.3841L32.3201 22.6159L26.6481 17.8893L26.0079 18.6575ZM31.6799 22.6159L26.0079 27.3425L26.6481 28.1107L32.3201 23.3841L31.6799 22.6159ZM26.5 27.573V23H25.5V27.573H26.5ZM26.0079 27.3425C26.2033 27.1797 26.5 27.3186 26.5 27.573H25.5C25.5 28.1665 26.1922 28.4907 26.6481 28.1107L26.0079 27.3425ZM26.5 18.427C26.5 18.6814 26.2033 18.8203 26.0079 18.6575L26.6481 17.8893C26.1922 17.5093 25.5 17.8335 25.5 18.427H26.5Z" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="portfolio-section pt-120 pb-120">
  <img src="{{asset('public/frontend')}}/assets/images/bg/section-bg-bttm.png" alt="image" class="img-fluid section-bg-top" />
  <img src="{{asset('public/frontend')}}/assets/images/bg/section-bg-bttm.png" alt="image" class="img-fluid section-bg-bottom" />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-title primary5">
          <span>-Portfolio-</span>
          <h3>Best Work Showcase</h3>
          <p class="para">
            Get the most of reduction in your team’s operating costs for the
            whole product which creates amazing UI/UX experiences.
          </p>
        </div>
      </div>
    </div>
    <div class="row position-relative justify-content-center">
      <div class="swiper portfolio-slider1 swiper-fix">
        <div class="swiper-wrapper">
          @if(isset($project))
          @foreach($project as $list)
          <div class="swiper-slide">
            <div class="portfolio-item1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
              <div class="portfolio-img">
                <img alt="image" src="{{asset('public/admin/assets/project/'.$list->image)}}" />
              </div>
              <div class="portfolio-content">
                <span><a href="project-details.html">{{$list->project_type}}</a></span>
                <h4>
                  <a href="#">{{$list->project_title}}</a>
                </h4>
                <!-- <a href="project-details.html" class="text-btn">Live Preview<svg width="18" height="10" viewBox="0 0 18 10" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1818 1.38021V5V8.61979C11.1818 8.78083 11.3624 8.87583 11.4951 8.7846L17 5L11.4951 1.2154C11.3624 1.12417 11.1818 1.21917 11.1818 1.38021Z" />
                    <path d="M1 4.5C0.723858 4.5 0.5 4.72386 0.5 5C0.5 5.27614 0.723858 5.5 1 5.5V4.5ZM11.4951 1.2154L11.2119 1.62742L11.2119 1.62742L11.4951 1.2154ZM17 5L17.2833 5.41202L17.8826 5L17.2833 4.58798L17 5ZM11.4951 8.7846L11.2119 8.37258L11.2119 8.37258L11.4951 8.7846ZM1 5.5H11.1818V4.5H1V5.5ZM11.6818 5V1.38021H10.6818V5H11.6818ZM11.2119 1.62742L16.7167 5.41202L17.2833 4.58798L11.7784 0.803376L11.2119 1.62742ZM16.7167 4.58798L11.2119 8.37258L11.7784 9.19662L17.2833 5.41202L16.7167 4.58798ZM11.6818 8.61979V5H10.6818V8.61979H11.6818ZM11.2119 8.37258C11.4109 8.23573 11.6818 8.37824 11.6818 8.61979H10.6818C10.6818 9.18342 11.3139 9.51593 11.7784 9.19662L11.2119 8.37258ZM11.6818 1.38021C11.6818 1.62176 11.4109 1.76427 11.2119 1.62742L11.7784 0.803377C11.3139 0.484066 10.6818 0.81658 10.6818 1.38021H11.6818Z" />
                  </svg>
                </a> -->
              </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
      <div class="slider-bottom d-flex justify-content-between align-items-center">
        <div class="swiper-pagination style-3 d-block"></div>
      </div>
    </div>
  </div>
</div>

<div class="activities-section pt-80 pb-80">
  <img src="{{asset('public/frontend')}}/assets/images/bg/water-mark1.png" alt="image" class="img-fluid water-mark1" />
  <img src="{{asset('public/frontend')}}/assets/images/bg/water-mark2.png" alt="image" class="img-fluid water-mark2" />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-title primary3">
          <span>-Our Video-</span>
          <h3>Our Company Activities</h3>
          <p class="para">
            Get the most of reduction in your team’s operating costs for the
            whole product which creates amazing UI/UX experiences.
          </p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="activities-area">
        <div class="company-vdo position-relative wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <div class="video-play style-2">
            <a href="https://www.youtube.com/watch?v=u31qwQUeGuM" class="popup-youtube video-icon"><i class="bx bx-play"></i></a>
          </div>
        </div>
        <div class="company-counter wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <div class="row g-4 d-flex justify-content-center">
            @if(isset($counter))
            @foreach($counter as $list)
            <div class="col-lg-3 col-md-6 col-sm-10 col-10">
              <div class="counter-single text-center d-flex flex-row wow animate fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.6s">
                <div class="coundown d-flex flex-column">
                  <h2 class="odometer" data-odometer-final="{{$list->count_no}}">&nbsp;</h2>
                  <a href="#">{{$list->heading}}</a>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="team-section pt-120 pb-120">
  <img src="{{asset('public/frontend')}}/assets/images/bg/section-bg2.png" alt="image" class="img-fluid water-mark1" />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-title primary2">
          <span>-Our Team-</span>
          <h3>Our Creative Minds</h3>
          <p class="para">
            Get the most of reduction in your team’s operating costs for the
            whole product which creates amazing UI/UX experiences.
          </p>
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-center g-4">
      @if(isset($team))
      @foreach($team as $list)
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
        <div class="single-team1 hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <div class="team-image">
            <img src="{{asset('public/admin/assets/team/'.$list->image)}}" alt="image" />
            <div class="social-area gap-3">
              <div class="social-plus"><i class="bx bx-plus"></i></div>
              <ul class="social-links d-flex justify-content-center align-items-center flex-column gap-3">
                <li>
                  <a href="{{$list->fb_link}}"><i class="bx bxl-instagram"></i></a>
                </li>
                <li>
                  <a href="{{$list->instagram_link}}"><i class="bx bxl-facebook"></i></a>
                </li>
                <li>
                  <a href="{{$list->twitter_link}}"><i class="bx bxl-twitter"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="team-content">
            <h4 class="name">{{$list->name}}</h4>
            <p class="designation">{{$list->designation}}</p>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>

<div class="testimonial-section pb-120">
  <img src="{{asset('public/frontend')}}/assets/images/bg/section-bg-bttm.png" class="section-bg-bottom" alt="image" />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-title primary5">
          <span>-Testimonial-</span>
          <h3>What They’re Saying</h3>
          <p class="para">
            Get the most of reduction in your team’s operating costs for the
            whole product which creates amazing UI/UX experiences.
          </p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center position-relative">
      <div class="swiper testimonial-slider1 swiper-fix">
        <div class="swiper-wrapper">
          @if(isset($testimonial))
          @foreach($testimonial as $list)
          <div class="swiper-slide">
            <div class="testimonial-single hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
              <img alt="image" src="{{asset('public/frontend')}}/assets/images/icons/quote-icon.svg" class="quote-icon" />
              <div class="testi-img">
                <img alt="image" src="{{asset('public/admin/assets/testimonial/'.$list->image)}}" />
              </div>
              <div class="testi-content">
                <div class="testi-designation">
                  <a href="#">
                    <h5>{{$list->name}}</h5>
                  </a>

                  <p>{{$list->designation}}</p>
                </div>
                <p>
                  {!!$list->description!!}
                </p>
              </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
      <div class="slider-arrows text-center d-xl-flex d-none justify-content-between">
        <div class="testi-prev1 swiper-prev-arrow" tabindex="0" role="button" aria-label="Previous slide">
          <svg width="46" height="46" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
            <circle cx="23" cy="23" r="22.25" stroke-width="1.5" />
            <path d="M20 27.573V23V18.427C20 18.2574 19.8022 18.1648 19.672 18.2734L14 23L19.672 27.7266C19.8022 27.8352 20 27.7426 20 27.573Z" />
            <path d="M32 23.5C32.2761 23.5 32.5 23.2761 32.5 23C32.5 22.7239 32.2761 22.5 32 22.5V23.5ZM19.672 27.7266L19.9921 27.3425V27.3425L19.672 27.7266ZM14 23L13.6799 22.6159L13.219 23L13.6799 23.3841L14 23ZM19.672 18.2734L19.3519 17.8893L19.3519 17.8893L19.672 18.2734ZM32 22.5H20V23.5H32V22.5ZM19.5 23V27.573H20.5V23H19.5ZM19.9921 27.3425L14.3201 22.6159L13.6799 23.3841L19.3519 28.1107L19.9921 27.3425ZM14.3201 23.3841L19.9921 18.6575L19.3519 17.8893L13.6799 22.6159L14.3201 23.3841ZM19.5 18.427V23H20.5V18.427H19.5ZM19.9921 18.6575C19.7967 18.8203 19.5 18.6814 19.5 18.427H20.5C20.5 17.8335 19.8078 17.5093 19.3519 17.8893L19.9921 18.6575ZM19.5 27.573C19.5 27.3186 19.7967 27.1797 19.9921 27.3425L19.3519 28.1107C19.8078 28.4907 20.5 28.1665 20.5 27.573H19.5Z" />
          </svg>
        </div>
        <div class="testi-next1 swiper-next-arrow" tabindex="0" role="button" aria-label="Next slide">
          <svg width="46" height="46" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
            <circle cx="23" cy="23" r="23" />
            <path d="M26 18.427V23V27.573C26 27.7426 26.1978 27.8352 26.328 27.7266L32 23L26.328 18.2734C26.1978 18.1648 26 18.2574 26 18.427Z" />
            <path d="M14 22.5C13.7239 22.5 13.5 22.7239 13.5 23C13.5 23.2761 13.7239 23.5 14 23.5V22.5ZM26.328 18.2734L26.0079 18.6575V18.6575L26.328 18.2734ZM32 23L32.3201 23.3841L32.781 23L32.3201 22.6159L32 23ZM26.328 27.7266L26.6481 28.1107L26.6481 28.1107L26.328 27.7266ZM14 23.5H26V22.5H14V23.5ZM26.5 23V18.427H25.5V23H26.5ZM26.0079 18.6575L31.6799 23.3841L32.3201 22.6159L26.6481 17.8893L26.0079 18.6575ZM31.6799 22.6159L26.0079 27.3425L26.6481 28.1107L32.3201 23.3841L31.6799 22.6159ZM26.5 27.573V23H25.5V27.573H26.5ZM26.0079 27.3425C26.2033 27.1797 26.5 27.3186 26.5 27.573H25.5C25.5 28.1665 26.1922 28.4907 26.6481 28.1107L26.0079 27.3425ZM26.5 18.427C26.5 18.6814 26.2033 18.8203 26.0079 18.6575L26.6481 17.8893C26.1922 17.5093 25.5 17.8335 25.5 18.427H26.5Z" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="blog-section pt-80 pb-80">
  <img src="{{asset('public/frontend')}}/assets/images/bg/water-mark1.png" alt="image" class="img-fluid water-mark1" />
  <img src="{{asset('public/frontend')}}/assets/images/bg/water-mark2.png" alt="image" class="img-fluid water-mark2" />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-title primary1">
          <span>-Our News-</span>
          <h3>Learn Something From Blog</h3>
          <p class="para">
            Get the most of reduction in your team’s operating costs for the
            whole product which creates amazing UI/UX experiences.
          </p>
        </div>
      </div>
    </div>
    <div class="row position-relative justify-content-center g-4">
      @if(isset($blog))
      @foreach($blog as $list)
      <div class="col-lg-4 col-md-6 col-sm-10">
        <div class="sigle-blog-1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <div class="blog-image">
            <img src="{{asset('public/admin/assets/blog/'.$list->image)}}" class="img-fluid" alt="image" />
          </div>
          <div class="blog-content hover-border1">
            <span>{{$list->type}}</span>
            <h4>
              <a href="{{url('blog-details/'.@$list->slug)}}">{{$list->title}}</a>
            </h4>
            <div class="blog-meta">
              <div class="author-img">
                <img src="{{asset('public/admin/assets/blog/'.$list->author_image)}}" alt="image" />
              </div>
              <div class="designation">
                <h5>{{$list->author_name}}</h5>
                <div class="date">
                  @php
                  $newtime = strtotime($list->created_at);
                  $time = date('M d, Y',$newtime);
                  @endphp
                  {{$time}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>

<div class="sponsor-section pt-80 pb-80">
  <div class="container">
    <div class="row align-items-center justify-content-lg-start justify-content-center">
      <div class="col-md-6 text-lg-start text-center">
        <div class="section-title primary5 text-lg-start text-center mb-0">
          <span>-Our Partners-</span>
          <h3 class="mb-0">People Who Trust Us</h3>
        </div>
      </div>
      <div class="col-md-6 d-lg-flex justify-content-end d-none">
        <div class="slider-arrows2 text-center d-flex gap-4">
          <div class="sponsor-prev1 swiper-prev-arrow" tabindex="0" role="button" aria-label="Previous slide">
            <svg width="46" height="46" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
              <circle cx="23" cy="23" r="22.25" stroke-width="1.5" />
              <path d="M20 27.573V23V18.427C20 18.2574 19.8022 18.1648 19.672 18.2734L14 23L19.672 27.7266C19.8022 27.8352 20 27.7426 20 27.573Z" />
              <path d="M32 23.5C32.2761 23.5 32.5 23.2761 32.5 23C32.5 22.7239 32.2761 22.5 32 22.5V23.5ZM19.672 27.7266L19.9921 27.3425V27.3425L19.672 27.7266ZM14 23L13.6799 22.6159L13.219 23L13.6799 23.3841L14 23ZM19.672 18.2734L19.3519 17.8893L19.3519 17.8893L19.672 18.2734ZM32 22.5H20V23.5H32V22.5ZM19.5 23V27.573H20.5V23H19.5ZM19.9921 27.3425L14.3201 22.6159L13.6799 23.3841L19.3519 28.1107L19.9921 27.3425ZM14.3201 23.3841L19.9921 18.6575L19.3519 17.8893L13.6799 22.6159L14.3201 23.3841ZM19.5 18.427V23H20.5V18.427H19.5ZM19.9921 18.6575C19.7967 18.8203 19.5 18.6814 19.5 18.427H20.5C20.5 17.8335 19.8078 17.5093 19.3519 17.8893L19.9921 18.6575ZM19.5 27.573C19.5 27.3186 19.7967 27.1797 19.9921 27.3425L19.3519 28.1107C19.8078 28.4907 20.5 28.1665 20.5 27.573H19.5Z" />
            </svg>
          </div>
          <div class="sponsor-next1 swiper-next-arrow" tabindex="0" role="button" aria-label="Next slide">
            <svg width="46" height="46" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
              <circle cx="23" cy="23" r="23" />
              <path d="M26 18.427V23V27.573C26 27.7426 26.1978 27.8352 26.328 27.7266L32 23L26.328 18.2734C26.1978 18.1648 26 18.2574 26 18.427Z" />
              <path d="M14 22.5C13.7239 22.5 13.5 22.7239 13.5 23C13.5 23.2761 13.7239 23.5 14 23.5V22.5ZM26.328 18.2734L26.0079 18.6575V18.6575L26.328 18.2734ZM32 23L32.3201 23.3841L32.781 23L32.3201 22.6159L32 23ZM26.328 27.7266L26.6481 28.1107L26.6481 28.1107L26.328 27.7266ZM14 23.5H26V22.5H14V23.5ZM26.5 23V18.427H25.5V23H26.5ZM26.0079 18.6575L31.6799 23.3841L32.3201 22.6159L26.6481 17.8893L26.0079 18.6575ZM31.6799 22.6159L26.0079 27.3425L26.6481 28.1107L32.3201 23.3841L31.6799 22.6159ZM26.5 27.573V23H25.5V27.573H26.5ZM26.0079 27.3425C26.2033 27.1797 26.5 27.3186 26.5 27.573H25.5C25.5 28.1665 26.1922 28.4907 26.6481 28.1107L26.0079 27.3425ZM26.5 18.427C26.5 18.6814 26.2033 18.8203 26.0079 18.6575L26.6481 17.8893C26.1922 17.5093 25.5 17.8335 25.5 18.427H26.5Z" />
            </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center position-relative mt-60">
      <div class="swiper sponsor-slider swiper-fix wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
        <div class="swiper-wrapper">
          @if(isset($client))
          @foreach($client as $list)
          <div class="swiper-slide">
            <a href="#" class="single-sponsor">
              <img src="{{asset('public/admin/assets/client/'.$list->image)}}" alt="image" />
            </a>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<div class="icon-bar sticky_call_back">
  <button class="facebook open-call">
    <span></span>
    Request A Call
  </button>
  <div id="request_wrap">
    <div class="contents">
      <h3>Request A Call</h3>
      <button class="close-call"><i class="fab bi-x-circle"></i></button>
      <form class="row g-3">
        <div class="col-md-12">

          <input type="text" class="form-control" id="imputName" placeholder="Full Name">
        </div>
        <div class="col-md-12">

          <input type="email" class="form-control" id="inputEmail4" placeholder="abc@gmail.com">
        </div>
        <div class="col-md-12">

          <input type="number" class="form-control" id="inputNumber" placeholder="Phone Number">
        </div>
        <div class="col-12">

          <input type="text" class="form-control" id="inputAddress" placeholder="Address">
        </div>

        <div class="col-12">
          <button type="submit" class="right eg-btn btn--submit" style="float: right;padding:8px 12px;font-size: 14px;">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
@include('frontend.include.footer')