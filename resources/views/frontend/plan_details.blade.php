@include('frontend.include.header')
<title>{{@$plan->name}} - Pixel Pro Digital</title>
<div class="inner-banner" style="
          background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url(asset(public/frontend/assets/images/bg/inner-banner.png));
        ">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerdot.png" class="inner-bannerdot" alt="image">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerwave.png" class="inner-bannerwave" alt="image">
    <a class="down-arrow-icon" href="#portfolio">
        <svg viewBox="0 0 14 26" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8182 18.469L7.24862 25.7462L0.679032 18.469C0.272584 18.0188 0.592074 17.3 1.19862 17.3L6.74862 17.3L6.74862 1C6.74862 0.723857 6.97248 0.5 7.24862 0.5C7.52477 0.5 7.74862 0.723857 7.74862 1L7.74862 17.3L13.2986 17.3C13.9052 17.3 14.2247 18.0188 13.8182 18.469Z" />
        </svg>
    </a>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center text-center">
            <div class="col-md-6">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{@$plan->name}}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb gap-3">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="plans.html">Plans</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{@$plan->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="portfolio-section pt-120 pb-120" id="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="section-title primary5">
                    <span>-Our Plans-</span>
                    <h3>Best Plans Showcase</h3>
                    <p class="para">We focus on maintaining a consistency in quality & pricing. There are different online marketing services available. Each business has its exclusive needs & requirements. We render pricing models depending upon our client’s specific requirements.</p>
                </div>
            </div>
        </div>
        <div class="row position-relative justify-content-center g-4 service_wrap">
            <div class="table-responsive">
                <table class="table table-bordered tablePricing">
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th class="col-md-3" align="left" valign="top">
                                <h1 class="text-center txt-white">Package Price</h1>
                            </th>
                            <th class="col-md-3" align="left" valign="top">
                                <div class="card-header">
                                    <h1 class="my-0 font-weight-normal txt-silver text-center">Silver</h1>
                                </div>
                                <h1 class="card-title pricing-card-title txt-white">$299 <small class="txt-white">/CAD</small></h1>
                            </th>
                            <th class="col-md-3" align="left" valign="top">
                                <!--<h3>Gold <span>CAD</span> <span id="search_percent">$499</span></h3>-->
                                <div class="card-header">
                                    <h1 class="my-0 font-weight-normal txt-gold text-center">Gold</h1>
                                </div>
                                <h1 class="card-title pricing-card-title txt-white">$499 <small class="txt-white">/CAD</small></h1>
                            </th>
                            <th class="col-md-3" align="left" valign="top">
                                <!--<h3>Platinum <span>CAD</span> <span id="plus_percent">$799</span></h3>-->
                                <div class="card-header">
                                    <h1 class="my-0 font-weight-normal txt-platinum text-center">Platinum</h1>
                                </div>
                                <h1 class="card-title pricing-card-title txt-white">$799 <small class="txt-white">/CAD</small></h1>
                            </th>
                            <!--<th width="22%;" align="left" valign="top">-->
                            <!--  <h3>Achiever <span>USD</span> <span id="achiever_percent">1599</span></h3>-->

                            <!--</th>-->
                        </tr>
                    </thead>

                    {!!@$plan->description!!}

                </table>
            </div>
        </div>

    </div>
</div>


<div class="sponsor-section pb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-lg-start justify-content-center">
                <div class="section-title primary5 text-start mb-0">
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