<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend') }}/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    @foreach ($maindata as $item)
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @if(session('status'))
        <h2> <strong class="text-success text-center">{{session('status')}}</strong> </h2>
        @endif
        <!-- Masthead-->
        <header class="masthead" style=" background-image: url(<?php echo $item->bc_image; ?>);">
            <div class="container">
                <div class="masthead-subheading">{{ $item->sub_title }}</div>
                <div class="masthead-heading text-uppercase">{{ $item->title }}</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="{{ url($item->resume) }}">Download</a>
            </div>
        </header>
    @endforeach




    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                @foreach ($service as $s_item)
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="{{ $s_item->icon }} fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">{{ $s_item->title }}</h4>
                        <p class="text-muted">{{ $s_item->description }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>



    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Portfolio</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                @if (count($portfolio) > 0)
                    @foreach ($portfolio as $p_item)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item -->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal"
                                    href="#portfolioModal<?php echo $p_item->id; ?>">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="{{ url($p_item->small_image) }}" alt="small image" />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading"> {{ $p_item->client }} </div>
                                    <div class="portfolio-caption-subheading text-muted"> {{ $p_item->category }}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Portfolio item modal popup-->
                        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $p_item->id; ?>" tabindex="-1"
                            role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="close-modal" data-bs-dismiss="modal"><img
                                            src="{{ asset('backend') }}/assets/img/close-icon.svg"
                                            alt="Close modal" /></div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="modal-body">
                                                    <!-- Project details-->
                                                    <h2 class="text-uppercase">{{ $p_item->title }} </h2>
                                                    <p class="item-intro text-muted"> {{ $p_item->sub_title }} </p>
                                                    <img class="img-fluid d-block mx-auto"
                                                        src="{{ $p_item->big_image }}" alt="big image" />
                                                    <p> {{ $p_item->description }} </p>
                                                    <ul class="list-inline">
                                                        <li>
                                                            <strong>Client: </strong>
                                                            {{ $p_item->client }}
                                                        </li>
                                                        <li>
                                                            <strong>Category:</strong>
                                                            {{ $p_item->category }}
                                                        </li>
                                                    </ul>
                                                    <button class="btn btn-primary btn-xl text-uppercase"
                                                        data-bs-dismiss="modal" type="button">
                                                        <i class="fas fa-xmark me-1"></i>
                                                        Close Project
                                                    </button>
                                                </div>
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
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">
                
                @foreach ($about as $a_item)
                        <li>
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="{{url($a_item->image)}}" alt="..."></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                        voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                        unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                    
                    @endforeach
               
             
                
           
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('backend') }}/assets/img/logos/microsoft.svg" alt="..."
                            aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('backend') }}/assets/img/logos/google.svg" alt="..."
                            aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('backend') }}/assets/img/logos/facebook.svg" alt="..."
                            aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('backend') }}/assets/img/logos/ibm.svg" alt="..."
                            aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <!-- * * * * * * * * * * * * * * *-->

            <form id="contactForm" action="{{route('portfolio.contact.store')}}" method="post">
                @csrf
            
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">    
                            <!-- Name input-->
                            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Your Name *" />
                             @error('name')
                                  <strong class="text-danger">{{$message}}</strong>
                             @enderror
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Your Email *" />
                            
                            @error('email')
                                  <strong class="text-danger">{{$message}}</strong>
                             @enderror
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="tel" placeholder="Your Phone *" />
                            @error('phone')
                            <strong class="text-danger">{{$message}}</strong>
                       @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                            @error('message')
                                  <strong class="text-danger">{{$message}}</strong>
                             @enderror
                            </div>
                        </div>
                    </div>
                </div>
             
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " type="submit">Send Message</button></div>
                   
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('backend') }}/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
