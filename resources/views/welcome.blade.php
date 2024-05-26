<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnAs</title>
    <link rel="shortcut icon" href="{{ asset('frontend_assets') }}/images/logo.png" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Raleway:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/jquery.rprogessbar.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/responsive.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".main_nav">



    <!-- partical js start-->
    <div id="particles-js"></div>
    <!-- partical js end -->



    <!-- back2top part start -->
    <div class="back2top">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
    <!-- back2top part end -->





    <!-- menu part start -->
    <section id="navbar" class="main_nav">
        <div class="row mx-0 align-items-center">
            <div class="col-lg-12 px-0">
                <div class="navbar_main d-flex justify-content-between">
                    <div class="nav_left">
                        @foreach ($logo as $log)
                            @if ($log->photo == null)
                                <h1 class="wow bounce" data-wow-delay="1.5s">{{ $log->name }}</h1>
                            @else
                                <img class="wow bounce ms-2" width="100" data-wow-delay="1.5s"
                                    src="{{ asset('uploads/logo') }}/{{ $log->photo }}" alt="logo">
                            @endif
                        @endforeach
                        <img src="" alt="">
                    </div>
                    <div class="nav_right">
                        <button class="btn menu_btn" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i
                                class="fa-solid fa-bars wow bounce" data-wow-delay="4.5s"></i></button>

                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasTop"
                            aria-labelledby="offcanvasTopLabel">
                            <div class="offcanvas-header menu_title">
                                <h5 id="offcanvasTopLabel">Menu</h5>
                                <button type="button" class=" text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"><i class="fa-solid fa-x"></i></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="menu_list text-center">
                                    <ul>

                                        @foreach ($menus as $menu)
                                            <li><a class="nav-link active"
                                                    href="{{ $menu->menu_link }}">{{ $menu->menu_name }}</a></li>
                                        @endforeach
                                        {{-- <li><a class="nav-link" href="#feature">features</a></li>
                    <li><a class="nav-link" href="#service">Service</a></li>
                    <li><a class="nav-link" href="#work">Work</a></li>
                    <li><a class="nav-link" href="#skill">Skills</a></li>
                    <li><a class="nav-link" href="#feedback">Feedback</a></li>
                    <li><a class="nav-link" href="#pricing">pricing</a></li>
                    <li><a class="nav-link" href="#contact">Contact</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- menu part end -->





    <!-- banner part start -->
    <section id="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 order-2 order-lg-1">
                    <div class="banner_text wow fadeInUp">
                        <h2>{{ $banner->subtitle }}</h2>
                        <p class="subtitle">{{ $banner->title }}<span> {{ $banner->name }}</span></p>
                        <p class="typer">a <span class="typed"></span></p>
                        <p class="content">{{ $banner->description }}</p>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2">
                    <div class="banner_image text-end wow fadeInUp">
                        <img src="{{ asset('uploads/banner') }}/{{ $banner->photo }}" class="w-100 img-fluid"
                            alt="man_image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part end -->



    <!-- feature part start -->
    <section id="feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="feat_head wow fadeInUp">
                        <h2>features</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">

                @foreach ($features as $feature)
                    <div class="col-lg-4 col-md-6">
                        <div class="feat_item wow bounceInUp">
                            <i class="fa-solid fa-{{ $feature->icon }}"></i>
                            <h2>{{ $feature->title }}</h2>
                            <p>{{ $feature->description }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- feature part end -->



    <!-- service part start -->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ser_head wow fadeInUp">
                        <h2>Services</h2>
                    </div>
                </div>
            </div>
            <div class="row ser_slider">
                @foreach ($services as $service)
                    <div class="col-lg-3">
                        <div class="ser_item">
                            <i class="fa-solid fa-{{ $service->icon }}"></i>
                            <h2>{{ $service->title }}</h2>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- service part end -->


    <!-- work part start -->
    <section id="work">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="work_head wow fadeInUp">
                        <h2>Works</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($works as $work)
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="work_item wow fadeInUpBig">
                            <div class="work_img">
                                <img src="{{ asset('uploads/work') }}/{{ $work->photo }}" class="w-100 img-fluid"
                                    alt="kubb">
                                <div class="work_ol"></div>
                                <div class="work_ol_two">
                                </div>
                                <a href="{{ $work->link }}" target="_blank">live
                                    preview <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <div class="work_text">
                                <p>project name :- <span>{{ $work->title }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- work part end -->


    <!-- skils part start -->
    <section id="skill">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="skill_head wow fadeInUp">
                        <h2>skills</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="skill_rate ">
                        @foreach ($skills as $skill)
                            <div class="single-progressbar wow fadeInLeft">
                                <h4 class="title">{{ $skill->name }}</h4>
                                <div class="{{ $skill->name }}"></div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- skils part end -->


    <!-- feedback part start -->
    <section id="feedback">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="feed_head wow fadeInUp">
                        <h2>feedback</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row feed_slider">
                        <div class="col-lg-6">
                            <div class="feed_item">
                                <div class="feed_item_top d-flex align-items-center justify-content-between">
                                    <div class="feed_left d-flex align-items-center">
                                        <div class="feed_img">
                                            <img src="{{ asset('frontend_assets') }}/images/team-1.png"
                                                class="w-100 img-fluid" alt="">
                                        </div>
                                        <div class="feed_text">
                                            <h2>ranu mandal</h2>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="feed_right text-end">
                                        <img src="{{ asset('frontend_assets') }}/images/market (1).png"
                                            class="w-50 img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="feed_item_bottom">
                                    <p>great work man.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feed_item">
                                <div class="feed_item_top d-flex align-items-center justify-content-between">
                                    <div class="feed_left d-flex align-items-center">
                                        <div class="feed_img">
                                            <img src="{{ asset('frontend_assets') }}/images/team-2.png"
                                                class="w-100 img-fluid" alt="">
                                        </div>
                                        <div class="feed_text">
                                            <h2>Steve jobs</h2>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="feed_right text-end">
                                        <img src="images/market-4.png" class="w-50 img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="feed_item_bottom">
                                    <p>I am very satisfied with your and your work</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feed_item">
                                <div class="feed_item_top d-flex align-items-center justify-content-between">
                                    <div class="feed_left d-flex align-items-center">
                                        <div class="feed_img">
                                            <img src="{{ asset('frontend_assets') }}/images/team-3.png"
                                                class="w-100 img-fluid" alt="">
                                        </div>
                                        <div class="feed_text">
                                            <h2>Sheikh hasina</h2>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="feed_right text-end">
                                        <img src="{{ asset('frontend_assets') }}/images/market (3).png"
                                            class="w-50 img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="feed_item_bottom">
                                    <p>You are a very skilled developer and I am very happy to see your work .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feedback part end -->

    <!-- pricing part css start -->

    <section id="pricing">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="pricing_head">
                        <h2>pricing</h2>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="price_item wow fadeInLeftBig">
                        <div class="price_head text-center">
                            <h4>static</h4>
                        </div>
                        <div class="price_title">
                            <div class="price_t_left">
                                <h5>Make Your Single Page</h5>
                                <h6>Elementor
                                </h6>
                            </div>
                            <div class="price_t_right">
                                <span class="counter">15</span><span>$</span>
                            </div>
                        </div>

                        <div class="price_subtitle">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut reprehenderit assumenda
                                consequatur
                                molestias sunt ipsum!</p>
                        </div>

                        <div class="price_list d-flex justify-content-between">
                            <div class="price_list_left">
                                <p><i class="fa-solid fa-arrow-right"></i> 1 Page with Elementor</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Design Customization</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Responsive Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Content Upload</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Design Customization</p>
                            </div>
                            <div class="price_list_right">
                                <p><i class="fa-solid fa-arrow-right"></i> multipage Elementor</p>
                                <p><i class="fa-solid fa-arrow-right"></i> maintaine Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Responsive Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Content Upload</p>
                                <p><i class="fa-solid fa-arrow-right"></i>8 Plugins/Extensions</p>
                            </div>
                        </div>

                        <div class="price_btn text-center">
                            <a href="#">make a appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="price_item wow fadeInUpBig">
                        <div class="price_head text-center">
                            <h4>standerd</h4>
                        </div>
                        <div class="price_title">
                            <div class="price_t_left">
                                <h5>Design Make this Page</h5>
                                <h6>Elementor
                                </h6>
                            </div>
                            <div class="price_t_right">
                                <span class="counter">30</span><span>$</span>
                            </div>
                        </div>

                        <div class="price_subtitle">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut reprehenderit assumenda
                                consequatur
                                molestias sunt ipsum!</p>
                        </div>

                        <div class="price_list d-flex justify-content-between">
                            <div class="price_list_left">
                                <p><i class="fa-solid fa-arrow-right"></i> 1 Page with Elementor</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Design Customization</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Responsive Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Content Upload</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Design Customization</p>
                            </div>
                            <div class="price_list_right">
                                <p><i class="fa-solid fa-arrow-right"></i> multipage Elementor</p>
                                <p><i class="fa-solid fa-arrow-right"></i> maintaine Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Responsive Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Content Upload</p>
                                <p><i class="fa-solid fa-arrow-right"></i>8 Plugins/Extensions</p>
                            </div>
                        </div>

                        <div class="price_btn text-center">
                            <a href="#">make a appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="price_item wow fadeInRightBig">
                        <div class="price_head text-center">
                            <h4>premium</h4>
                        </div>
                        <div class="price_title">
                            <div class="price_t_left">
                                <h5>Customize Your Single Page</h5>
                                <h6>Elementor
                                </h6>
                            </div>
                            <div class="price_t_right">
                                <span class="counter">50</span><span>$</span>
                            </div>
                        </div>

                        <div class="price_subtitle">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut reprehenderit assumenda
                                consequatur
                                molestias sunt ipsum!</p>
                        </div>

                        <div class="price_list d-flex justify-content-between">
                            <div class="price_list_left">
                                <p><i class="fa-solid fa-arrow-right"></i> 1 Page with Elementor</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Design Customization</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Responsive Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Content Upload</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Design Customization</p>
                            </div>
                            <div class="price_list_right">
                                <p><i class="fa-solid fa-arrow-right"></i> multipage Elementor</p>
                                <p><i class="fa-solid fa-arrow-right"></i> maintaine Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Responsive Design</p>
                                <p><i class="fa-solid fa-arrow-right"></i> Content Upload</p>
                                <p><i class="fa-solid fa-arrow-right"></i>8 Plugins/Extensions</p>
                            </div>
                        </div>

                        <div class="price_btn text-center">
                            <a href="#">make a appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- pricing part css end -->



    <!-- contact part start -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="contact_head wow fadeInUp">
                        <h2>Contact</h2>
                        <h3>Contact With Me</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="con_left wow bounceInLeft">
                        <div class="con_img text-center">
                            <img src="{{ asset('uploads/contact_card/') }}/{{ $card->photo }}"
                                class="w-100 img-fluid" alt="">
                        </div>
                        <div class="con_text">
                            <h2>{{ $card->name }}</h2>
                            <h3>{{ $card->title }}</h3>
                            <p class="description">{{ $card->description }}</p>
                            <p class="call">Number :- +880 {{ $card->number }}</p>
                            <p class="mail">Mail :- {{ $card->email }}</p>

                            <div class="con_social">
                                <h2>Find me on</h2>
                                <a href="{{ $card->fb ? $card->fb : '#' }}"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                                <a href="{{ $card->tw ? $card->tw : '#' }}"><i class="fa-brands fa-twitter"></i></a>
                                <a href="{{ $card->in ? $card->in : '#' }}"><i
                                        class="fa-brands fa-instagram"></i></a>
                                <a href="{{ $card->pi ? $card->pi : '#' }}"><i
                                        class="fa-brands fa-pinterest-p"></i></a>
                                <a href="{{ $card->li ? $card->li : '#' }}"><i
                                        class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-7 px-5">
                    <div class="row con_form wow bounceInRight">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-floating mt-4">
                                    <input type="name" name="name" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Your Name</label>
                                </div>
                                @error('name')
                                    <div class="alert alert-danger text-black mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-floating mt-4">
                                    <input type="number" name="number" class="form-control" id="floatingPassword"
                                        placeholder="Password" minlength="11" maxlength="11">
                                    <label for="floatingPassword">Phone Number</label>
                                </div>
                                @error('number')
                                    <div class="alert alert-danger text-black mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mt-4">
                                    <input type="email" name="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger text-black mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mt-4">
                                    <input type="subject" name="subject" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Subject</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mt-4">
                                    <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Your Message</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="con_form_button my-4">
                                    {{-- <input type="submit" value=""> --}}
                                    <button type="submit" class="btn btn-danger w-100">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact part end -->


    <!-- copyrigth part start -->
    <section id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <p>&copy; 2022. All rights reserved by <a href="#">Anas Abdullah</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- copyrigth part end -->




    <!-- preloader part start -->
    <!-- <div class="preloader_bg">
    <div class="preloader"></div>
  </div> -->
    <!-- preloader part end -->


    <!-- main preloader part start -->
    {{-- <div class="preloader">
    <div class="loader">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div> --}}
    <!-- main preloader part end -->





    <!-- javascript links here -->
    <script src="{{ asset('frontend_assets') }}/js/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/jQuery.rProgressbar.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/lightbox.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/waypoints.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend_assets') }}/js/wow.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/particles.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/typed.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/kursor"></script>
    <script src="https://cdn.jsdelivr.net/npm/kursor@0.0.14/dist/kursor.js"></script>
    <script src="https://unpkg.com/kursor"></script>
    <script src="{{ asset('frontend_assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/custom.js"></script>

    <script>
        // skill part js

        @foreach ($skills as $skill)

            $('.{{ $skill->name }}').rProgressbar({
                percentage: {{ $skill->percentage }},
                fillBackgroundColor: '#ff014f',
                backgroundColor: 'transparent',
                duration: 1200
            });
        @endforeach
    </script>

    @if (session('send'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('send') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    <script>
        // patical js

        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('particles-js', '{{ asset('frontend_assets') }}/js/particles.json', function() {
            console.log('callback - particles.js config loaded');
        });
    </script>
</body>

</html>
