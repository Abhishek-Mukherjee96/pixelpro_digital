@include('frontend.include.header')
@php
$client = DB::table('clients')->latest()->get();
@endphp
<title>{{@$service->title}} - Pixel Pro Digital</title>
<div class="inner-banner" style="
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
          url(asset(public/frontend/assets/images/bg/inner-banner.png));
      ">
    <img src="{{asset('public/frontend/')}}/assets/images/bg/inner-bannerdot.png" class="inner-bannerdot" alt="image" />
    <img src="{{asset('public/frontend/')}}/assets/images/bg/inner-bannerwave.png" class="inner-bannerwave" alt="image" />
    <a class="down-arrow-icon" href="#service-details">
        <svg viewBox="0 0 14 26" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8182 18.469L7.24862 25.7462L0.679032 18.469C0.272584 18.0188 0.592074 17.3 1.19862 17.3L6.74862 17.3L6.74862 1C6.74862 0.723857 6.97248 0.5 7.24862 0.5C7.52477 0.5 7.74862 0.723857 7.74862 1L7.74862 17.3L13.2986 17.3C13.9052 17.3 14.2247 18.0188 13.8182 18.469Z" />
        </svg>
    </a>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center text-center">
            <div class="col-md-6">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">

                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb gap-3">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('service-details/'.@$service->slug)}}">Service</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{@$service->title}}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="service-details pt-120" id="service-details">
    <div class="container">
        <div class="row justify-content-center gy-5">
            <div class="col-lg-4 order-lg-1 order-2">
                <div class="service-sidebar">
                    <div class="service-widget service-list-area">
                        <h4 class="sidebar-title">All Services</h4>
                        <ul class="service-list">
                            @if(isset($services))
                            @foreach($services as $list)
                            <li>
                                <a href="{{url('service-details/'.@$list->slug)}}">{{@$list->title}}</a>
                                <svg width="20" height="16" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.7496 15.4594C12.4954 15.4594 12.2385 15.41 11.9928 15.3082C11.2572 15.0038 10.7819 14.2953 10.7819 13.5034V11.8225C10.7819 11.3909 11.1316 11.0411 11.5631 11.0411C11.9946 11.0411 12.3445 11.3909 12.3445 11.8225V13.5034C12.3445 13.7374 12.5165 13.8337 12.5903 13.8644C12.6656 13.8955 12.8587 13.9497 13.0272 13.7811L18.2094 8.59248C18.5147 8.28685 18.5147 7.78956 18.2094 7.48393L13.0272 2.29548C12.8587 2.12687 12.6656 2.18088 12.5905 2.21201C12.5165 2.24268 12.3445 2.33912 12.3445 2.57319V7.29594C12.3445 8.1576 11.6435 8.85859 10.7819 8.85859H0.781251C0.349732 8.85859 0 8.50886 0 8.07734C0 7.64582 0.349732 7.29594 0.781251 7.29594H10.7819V2.57319C10.7819 1.78126 11.2572 1.07264 11.9928 0.768223C12.731 0.462742 13.571 0.628758 14.1327 1.1912L19.3149 6.37965C20.2283 7.29426 20.2283 8.7823 19.3149 9.69691L14.1327 14.8854C13.7579 15.2606 13.2593 15.4592 12.7496 15.4594Z" />
                                </svg>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="service-widget service-banner">
                        <span>Offer Banner</span>
                        <h3>Do You Have a Project In Your Mind</h3>
                        <a href="{{route('contact')}}" class="eg-btn btn--primary btn--lg">Get Started</a>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 order-lg-2 order-1">
                <div class="service-details-area">
                    <img src="{{asset('public/admin/assets/service/'.$service->img_details)}}" class="img-fluid" alt="image" />
                    <h3>{{@$service->heading}}</h3>
                    <p class="para">
                        {!!@$service->description!!}
                    </p>
                    <!-- <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="service-subtitle">Planning Project</h3>
                            <ul class="proj-planlist">
                                <li>
                                    <svg width="24" height="11" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.9995 0.454667V5.50002V10.5454C16.9995 10.7194 17.2064 10.8104 17.3347 10.6928L22.9995 5.50002L17.3347 0.307236C17.2064 0.189646 16.9995 0.280646 16.9995 0.454667Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8217 1.32396V9.67604L22.5347 5.5L17.8217 1.32396ZM16.8316 0.671268C16.8316 0.0883502 17.5485 -0.216486 17.993 0.177416L24 5.5L17.993 10.8226C17.5485 11.2165 16.8316 10.9117 16.8316 10.3287V5.97853H0.49506C0.221646 5.97853 0 5.76429 0 5.5C0 5.23571 0.221646 5.02147 0.49506 5.02147H16.8316V0.671268Z" />
                                    </svg>
                                    Analyzing research data and identifying.
                                </li>
                                <li>
                                    <svg width="24" height="11" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.9995 0.454667V5.50002V10.5454C16.9995 10.7194 17.2064 10.8104 17.3347 10.6928L22.9995 5.50002L17.3347 0.307236C17.2064 0.189646 16.9995 0.280646 16.9995 0.454667Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8217 1.32396V9.67604L22.5347 5.5L17.8217 1.32396ZM16.8316 0.671268C16.8316 0.0883502 17.5485 -0.216486 17.993 0.177416L24 5.5L17.993 10.8226C17.5485 11.2165 16.8316 10.9117 16.8316 10.3287V5.97853H0.49506C0.221646 5.97853 0 5.76429 0 5.5C0 5.23571 0.221646 5.02147 0.49506 5.02147H16.8316V0.671268Z" />
                                    </svg>Conducting usability testing sessions.
                                </li>
                                <li>
                                    <svg width="24" height="11" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.9995 0.454667V5.50002V10.5454C16.9995 10.7194 17.2064 10.8104 17.3347 10.6928L22.9995 5.50002L17.3347 0.307236C17.2064 0.189646 16.9995 0.280646 16.9995 0.454667Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8217 1.32396V9.67604L22.5347 5.5L17.8217 1.32396ZM16.8316 0.671268C16.8316 0.0883502 17.5485 -0.216486 17.993 0.177416L24 5.5L17.993 10.8226C17.5485 11.2165 16.8316 10.9117 16.8316 10.3287V5.97853H0.49506C0.221646 5.97853 0 5.76429 0 5.5C0 5.23571 0.221646 5.02147 0.49506 5.02147H16.8316V0.671268Z" />
                                    </svg>Amazing Timing and Experience.
                                </li>
                                <li>
                                    <svg width="24" height="11" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.9995 0.454667V5.50002V10.5454C16.9995 10.7194 17.2064 10.8104 17.3347 10.6928L22.9995 5.50002L17.3347 0.307236C17.2064 0.189646 16.9995 0.280646 16.9995 0.454667Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8217 1.32396V9.67604L22.5347 5.5L17.8217 1.32396ZM16.8316 0.671268C16.8316 0.0883502 17.5485 -0.216486 17.993 0.177416L24 5.5L17.993 10.8226C17.5485 11.2165 16.8316 10.9117 16.8316 10.3287V5.97853H0.49506C0.221646 5.97853 0 5.76429 0 5.5C0 5.23571 0.221646 5.02147 0.49506 5.02147H16.8316V0.671268Z" />
                                    </svg>Gathering user feedback through surveys.
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('public/frontend/')}}/assets/images/bg/service-details2.png" class="img-fluid" alt="image" />
                        </div>
                    </div> -->
                    <div class="work-process-area">
                        <h3 class="service-subtitle text-center">Work Process</h3>
                        <div class="row g-4">
                            <div class="col-md-3 col-sm-6">
                                <div class="work-process-item">
                                    <img src="{{asset('public/frontend/')}}/assets/images/icons/work-procs1.svg" alt="image" />
                                    <h4>Research</h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="work-process-item">
                                    <img src="{{asset('public/frontend/')}}/assets/images/icons/work-procs2.svg" alt="image" />
                                    <h4>Idea</h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="work-process-item">
                                    <img src="{{asset('public/frontend/')}}/assets/images/icons/work-procs3.svg" alt="image" />
                                    <h4>Develop</h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="work-process-item">
                                    <img src="{{asset('public/frontend/')}}/assets/images/icons/work-procs4.svg" alt="image" />
                                    <h4>Launch</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="service-faq-area">
                        <h3 class="service-subtitle text-md-start text-center mb-4">
                            FAQ This Services
                        </h3>
                        <div class="faq-wrap wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".2s">
                            <div class="faq-item hover-btn">
                                <span></span>
                                <h5 id="heading10" class="accordion-button style-2 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-controls="collapse10">
                                    01. Curious about how to build your own UX strategy? Here
                                    are five simple steps.
                                </h5>
                                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10">
                                    <div class="faq-body style-2">
                                        Morbi aliquam quis quam in luctus. Nullam tincidunt
                                        pulvinar imperdiet. Sed varius, diam vitae posuere
                                        semper, libero ex hendrerit nunc, ac sagittis eros metus
                                        ut diam. Donec a nibh in libero maximus vehicula. Etiam
                                        sit amet condimentum erat. Pellentesque ultrices
                                        sagittis turpis, quis tempus ante viverra et.Morbi
                                        aliquam quis quam in luctus. Nullam tincidunt pulvinar
                                        imperdiet. Sed varius, diam vitae posuere semper,
                                        tincidunt pulvinar imperdiet. Sed varius, diam vitae
                                        posuere semper.
                                    </div>
                                </div>
                            </div>
                            <div class="faq-item hover-btn">
                                <span></span>
                                <h5 id="heading11" class="accordion-button style-2 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-controls="collapse11">
                                    02. Where Could a Career in UX Take You? Agency vs.
                                    In-House vs. Freelance?
                                </h5>
                                <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11">
                                    <div class="faq-body style-2">
                                        Morbi aliquam quis quam in luctus. Nullam tincidunt
                                        pulvinar imperdiet. Sed varius, diam vitae posuere
                                        semper, libero ex hendrerit nunc, ac sagittis eros metus
                                        ut diam. Donec a nibh in libero maximus vehicula. Etiam
                                        sit amet condimentum erat. Pellentesque ultrices
                                        sagittis turpis, quis tempus ante viverra et.Morbi
                                        aliquam quis quam in luctus. Nullam tincidunt pulvinar
                                        imperdiet. Sed varius, diam vitae posuere semper,
                                        tincidunt pulvinar imperdiet. Sed varius, diam vitae
                                        posuere semper.
                                    </div>
                                </div>
                            </div>
                            <div class="faq-item hover-btn">
                                <span></span>
                                <h5 id="heading12" class="accordion-button style-2 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-controls="collapse12">
                                    03. What Is a Problem Statement in UX? (And How To Write
                                    One?
                                </h5>
                                <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12">
                                    <div class="faq-body style-2">
                                        Morbi aliquam quis quam in luctus. Nullam tincidunt
                                        pulvinar imperdiet. Sed varius, diam vitae posuere
                                        semper, libero ex hendrerit nunc, ac sagittis eros metus
                                        ut diam. Donec a nibh in libero maximus vehicula. Etiam
                                        sit amet condimentum erat. Pellentesque ultrices
                                        sagittis turpis, quis tempus ante viverra et.Morbi
                                        aliquam quis quam in luctus. Nullam tincidunt pulvinar
                                        imperdiet. Sed varius, diam vitae posuere semper,
                                        tincidunt pulvinar imperdiet. Sed varius, diam vitae
                                        posuere semper.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sponsor-section pb-120">
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
@include('frontend.include.footer')