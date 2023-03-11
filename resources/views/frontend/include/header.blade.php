@php
$services = DB::table('what_we_offers')->where('status', '=', 1)->get();
$project_cat = DB::table('project_categroys')->latest()->get();

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="{{asset('public/frontend')}}/assets/images/icons/favicon.png" type="image/gif" sizes="20x20" />
    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/animate.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/all.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/boxicons.min.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/bootstrap-icons.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/jquery-ui.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/swiper-bundle.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/nice-select.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/magnific-popup.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/odometer.css" />

    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/style.css" />

    <!-- sweetalert js -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
</head>

<body>

    <div id="header-topbar" class="bg-assh-2 pd-y-10">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-8">
                    <div class="header-topbar-layout2">
                        <div class="header-top-left">
                            <div class="item-location"><svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.12018 0.574918C2.31702 0.378368 2.55339 0.225896 2.81362 0.127607C3.07385 0.0293176 3.352 -0.0125448 3.62963 0.00479393C3.90727 0.0221327 4.17805 0.0982766 4.42402 0.22818C4.67 0.358083 4.88557 0.538779 5.05643 0.758293L7.0758 3.35254C7.44593 3.82842 7.57643 4.44829 7.43018 5.03329L6.8148 7.49704C6.78299 7.62465 6.78471 7.75832 6.81979 7.88507C6.85488 8.01182 6.92214 8.12734 7.01505 8.22042L9.77918 10.9845C9.87237 11.0776 9.98808 11.145 10.115 11.1801C10.242 11.2152 10.3759 11.2168 10.5037 11.1848L12.9663 10.5694C13.255 10.4972 13.5563 10.4916 13.8475 10.553C14.1387 10.6144 14.4121 10.7412 14.6471 10.9238L17.2413 12.942C18.1739 13.6677 18.2594 15.0458 17.4247 15.8794L16.2614 17.0427C15.4289 17.8752 14.1847 18.2408 13.0248 17.8324C10.0561 16.7879 7.36073 15.0884 5.13855 12.8599C2.91025 10.6381 1.21074 7.94306 0.166053 4.97479C-0.241197 3.81604 0.124428 2.57067 0.956928 1.73817L2.12018 0.574918Z"></path>
                                </svg><a href="tel:+8801761456456"><span class="country_flag"><img src="{{asset('public/frontend')}}/assets/images/icons/india.png" width="20px"></span>+91 1234567890</a> <a href="{{asset('public/frontend')}}/tel:+8801761456456"><span class="country_flag"><img src="{{asset('public/frontend')}}/assets/images/icons/canada.png" width="20px"></span> +1 (123)-456-7890</a>

                                <a href="tel:+8801761456456"><span class="country_flag"> <img src="{{asset('public/frontend')}}/assets/images/icons/united-states-of-america.png" width="20px"></span> +1 (123)-456-7890</a>
                                <a href="tel:+8801761456456"><span class="country_flag"><img src="{{asset('public/frontend')}}/assets/images/icons/australia.png" width="20px"></span> +1 (123)-456-7890</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-end">
                    <div class="header-topbar-layout2 d-flex align-items-center">
                        <button type="button" class="btn modal_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Get A Quote</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Get A Quote</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('get_a_quote')}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="recipient-name" placeholder="Name">
                                            </div>
                                            @error('name')
                                            <strong class="text text-danger">{{$message}}</strong>
                                            @enderror
                                            <div class="mb-3">
                                                <input type="text" name="business_name" value="{{old('business_name')}}" class="form-control" id="recipient-name" placeholder="Business Name">
                                            </div>
                                            @error('business_name')
                                            <strong class="text text-danger">{{$message}}</strong>
                                            @enderror
                                            <div class="mb-3">
                                                <input type="text" value="{{old('phone')}}" class="form-control" id="recipient-name" name="phone" placeholder="Phone">
                                            </div>
                                            @error('phone')
                                            <strong class="text text-danger">{{$message}}</strong>
                                            @enderror
                                            <div class="mb-3">
                                                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="recipient-name" placeholder="Email">
                                            </div>
                                            @error('email')
                                            <strong class="text text-danger">{{$message}}</strong>
                                            @enderror
                                            <div class="mb-3">
                                                <textarea class="form-control" name="business_address" id="message-text" placeholder="Business Address">{{old('business_address')}}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="existing_website" value="{{old('existing_website')}}" class="form-control" id="recipient-name" placeholder="Existing Website(If any)">
                                            </div>
                                            <div class="mb-3">
                                                <input type="date" name="date" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <select name="interested_in" class="form-select form-control  w-100" aria-label="Default select example" style="margin-bottom:1rem ;">
                                                    <option selected>Interested in</option>
                                                    <option value="1">Service1</option>
                                                    <option value="2">Service2</option>
                                                    <option value="3">Service3</option>
                                                </select>
                                            </div>
                                            @error('interested_in')
                                            <strong class="text text-danger">{{$message}}</strong>
                                            @enderror
                                            <div class="mb-3">
                                                <textarea name="message" class="form-control" id="message-text" placeholder="Message">{{old('message')}}</textarea>
                                            </div>
                                            <button type="submit" class="btn eg-btn btn--primary" style="border: transparent;">Send message</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="header-top-right">
                            <li class="social-icon">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header-area style-1">

        <div class="header-logo">
            <a href="{{url('/')}}"><img alt="image" src="{{asset('public/frontend')}}/assets/images/icons/logo.png" /></a>
        </div>
        <div class="main-nav">
            <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
                <div class="mobile-logo-wrap">
                    <a href="{{url('/')}}"><img alt="image" src="{{asset('public/frontend')}}/assets/images/icons/logo.png" /></a>
                </div>
                <div class="menu-close-btn">
                    <i class="bi bi-x-lg text-white"></i>
                </div>
            </div>
            <ul class="menu-list">
                <li><a href="{{route('about_us')}}">About us</a></li>
                <li class="menu-item-has-children">
                    <a href="#" class="drop-down">Services</a><i class="bi bi-chevron-down dropdown-icon"></i>
                    <ul class="sub-menu">
                        @if(isset($services))
                        @foreach($services as $list)
                        <li><a href="{{url('service-details/'.@$list->slug)}}">{{@$list->title}}</a></li>
                        @endforeach
                        @endif
                    </ul>
                </li>
                <li><a href="{{route('plans')}}">Plans</a></li>
                <li class="menu-item-has-children">
                    <a href="{{route('project')}}" class="drop-down">Projects</a><i class="bi bi-chevron-down dropdown-icon"></i>
                    <ul class="sub-menu">
                        @if(isset($project_cat))
                        @foreach($project_cat as $list)
                        <li><a href="{{url('project/'.$list->id)}}">{{$list->name}}</a></li>
                        @endforeach
                        @endif
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{route('blogs')}}">Blog</a>
                </li>
                <li><a href="{{route('careers')}}">Career</a></li>
                <li><a href="{{route('contact')}}">Contact us</a></li>
                <li><a href="{{route('faq')}}">FAQ</a></li>
            </ul>
        </div>
        <div class="nav-right d-flex align-items-center gap-5">
            <div class="mobile-menu-btn d-lg-none d-block">
                <h5 class="text-white mb-0">MENU</h5>
            </div>
            <div class="eg-btn btn--primary header-btn">
                <a href="contact.html">Pay Now</a>
            </div>
        </div>
    </header>