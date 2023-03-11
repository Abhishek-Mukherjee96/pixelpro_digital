@include('frontend.include.header')
<title>FAQ - Pixel Pro Digital</title>
<div class="inner-banner" style="
background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
  url(public/frontend/assets/images/bg/inner-banner.png);
">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerdot.png" class="inner-bannerdot" alt="image">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerwave.png" class="inner-bannerwave" alt="image">
    <a class="down-arrow-icon" href="#faq">
        <svg viewBox="0 0 14 26" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8182 18.469L7.24862 25.7462L0.679032 18.469C0.272584 18.0188 0.592074 17.3 1.19862 17.3L6.74862 17.3L6.74862 1C6.74862 0.723857 6.97248 0.5 7.24862 0.5C7.52477 0.5 7.74862 0.723857 7.74862 1L7.74862 17.3L13.2986 17.3C13.9052 17.3 14.2247 18.0188 13.8182 18.469Z" />
        </svg>
    </a>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center text-center">
            <div class="col-md-6">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">FAQ</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb gap-3">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="faq-section pt-120 " id="faq">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <div class="col-lg-10">
                <div class="faq-wrap wow fadeInRight pb-120" data-wow-duration="1.5s" data-wow-delay=".2s">
                    @if(isset($faq))
                    @foreach($faq as $list)
                    <div class="faq-item hover-btn"><span></span>
                        <h5 id="heading10{{$list->id}}" class="accordion-button style-2 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse10{{$list->id}}" aria-controls="collapse10">
                            {{$list->title}}
                        </h5>
                        <div id="collapse10{{$list->id}}" class="accordion-collapse collapse" aria-labelledby="heading10{{$list->id}}">
                            <div class="faq-body style-2">
                                {!!$list->description!!}
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
<div class="form-section pt-120 pb-120" id="faq">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="section-title primary4">
                    <span>-Get in Touch-</span>
                    <h3>Let’s Get in Touch</h3>
                    <p class="para">Get the most of reduction in your team’s operating costs for the whole product which creates amazing UI/UX experiences.</p>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
            <form action="{{route('submit_contact_form')}}" method="post">
                    @csrf
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="form-inner">
                                <input type="text" value="{{old('name')}}" name="name" placeholder="Your Name: *">
                            </div>
                            @error('name')
                            <strong class="text text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-inner">
                                <input type="email" value="{{old('email')}}" name="email" placeholder="Your E-mail:">
                            </div>
                            @error('email')
                            <strong class="text text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-inner">
                                <input type="text" value="{{old('phone')}}" name="phone" placeholder="Phone Number:">
                            </div>
                            @error('phone')
                            <strong class="text text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-inner">
                                <input type="text" value="{{old('subject')}}" name="subject" placeholder="Subject:">
                            </div>
                            @error('subject')
                            <strong class="text text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <div class="form-inner">
                                <textarea name="message" cols="30" rows="6" placeholder="Write A Question ">{{old('message')}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <input type="submit" value="Send Now" class="eg-btn btn--submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('frontend.include.footer')