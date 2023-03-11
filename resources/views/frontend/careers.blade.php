@include('frontend.include.header')
@php
$tab_name = DB::table('career_tabs')->where('status','=',1)->take(6)->get();
$job_list = [];

foreach($tab_name as $tab) {
$job_list[] = DB::table('careers')->where("tab_name", $tab->tab_name)->get();
}

@endphp
<title>Careers - Pixel Pro Digital</title>
<div class="inner-banner" style="
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
          url(public/frontend/assets/images/bg/inner-banner.png);
      ">
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerdot.png" class="inner-bannerdot" alt="image" />
    <img src="{{asset('public/frontend')}}/assets/images/bg/inner-bannerwave.png" class="inner-bannerwave" alt="image" />
    <a class="down-arrow-icon" href="#job-list">
        <svg viewBox="0 0 14 26" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8182 18.469L7.24862 25.7462L0.679032 18.469C0.272584 18.0188 0.592074 17.3 1.19862 17.3L6.74862 17.3L6.74862 1C6.74862 0.723857 6.97248 0.5 7.24862 0.5C7.52477 0.5 7.74862 0.723857 7.74862 1L7.74862 17.3L13.2986 17.3C13.9052 17.3 14.2247 18.0188 13.8182 18.469Z" />
        </svg>
    </a>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center text-center">
            <div class="col-md-6">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">
                    Career
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb gap-3">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Career
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="job-section pb-120" id="job-list">
    <div class="container">
        <div class="row mt-50">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="documentation-tab-wrap">
                    <ul class="nav nav-pills d-flex flex-row justify-content-center gap-3 mb-70" id="pills-tab" role="tablist">
                        <!-- <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-one-tab" data-bs-toggle="pill" data-bs-target="#pills-one" type="button" role="tab" aria-controls="pills-one" aria-selected="true">
                                All Job
                            </button>
                        </li> -->
                        <?php $i = 0; ?>
                        @if(isset($tab_name))
                        @foreach ($tab_name as $value)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if($i == 0) {echo "active";} $i++;?>" id="pills-two-tab" data-bs-toggle="pill" data-bs-target="#{{$value->tab_name}}" type="button" role="tab" aria-controls="pills-two" aria-selected="false">
                                {{str_replace('_',' ',$value->tab_name)}}
                            </button>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    <div class="tab-content tab-content-shape" id="pills-tabContent">
                        <?php $i = 0; ?>
                        @foreach($job_list as $item)
                        <div class="tab-pane fade <?php if($i == 0) {echo "active show";} $i++;?>" id="{{$item[0]->tab_name}}" role="tabpanel" aria-labelledby="pills-one-tab">
                            <div class="row justify-content-center g-4">
                                @if(isset($item))
                                @foreach($item as $list)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10 col-12 {{$list->tab_name}}">
                                    <div class="jobpost-item hover-border2 {{$list->tab_name}}">
                                        <div class="job-header">
                                            <div class="icon">
                                                <img src="{{asset('public/frontend')}}/assets/images/icons/job-icon1.svg" alt="image" />
                                            </div>
                                            <h4 class="title">
                                                <a href="job-details.html">{{$list->title}}</a>
                                            </h4>
                                        </div>
                                        <div class="job-body">
                                            <p class="para">
                                                {{$list->description}}
                                            </p>
                                            <ul class="job-meta">
                                                <li>
                                                    <img src="{{asset('public/frontend')}}/assets/images/icons/location-prm2.svg" alt="image" />{{$list->location}}
                                                </li>
                                                <li>
                                                    <img src="{{asset('public/frontend')}}/assets/images/icons/time-prm2.svg" alt="image" />{{$list->job_type}}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="job-footer">
                                            <div class="eg-btn btn--primary2-light btn--sm">
                                                1 Day Ago
                                            </div>
                                            <a href="job-details.html" class="eg-btn btn--primary2 btn--sm">Apply Now</a>
                                        </div>
                                        loop chalate hbe
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="job-details-section" id="job-details">
    <div class="container">
        <div class="row d-flex justify-content-center gy-5">
            <div class="col-lg-12">
                <div class="apply-form">
                    <div class="apply-form-title">
                        <h4>Apply for a Position:</h4>
                        <p>Please complete the form below to apply for a position :</p>
                    </div>
                    <form>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="form-inner">
                                    <input type="text" name="fname" placeholder="Your Name:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-inner">
                                    <input type="text" name="fname" placeholder="Phone Number:">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-inner">
                                    <input type="text" name="fname" placeholder="Typing for Position :">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-inner">
                                    <input type="text" name="fname" placeholder="Experience:">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-inner">
                                    <textarea name="message" cols="30" rows="6" placeholder="Cover Letter :"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-inner">
                                    <label for="cv" class="mb-3">Upload Resume :</label>
                                    <input type="file">
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
</div>
</div>
</div>
</div>
@include('frontend.include.footer')