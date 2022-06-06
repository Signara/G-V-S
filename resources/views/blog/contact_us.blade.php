   <!DOCTYPE html>
   <html lang="en">

   <head>
     <meta charset="utf-8" />
     <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
     <link rel="icon" type="image/png" href="../assets/img/favicon.png">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>
        Virtu Expo
     </title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <!-- Open Graph data -->
     <meta property="fb:app_id" content="655968634437471">
     <meta property="og:title" content="Material Kit Pro by Creative Tim" />
     <meta property="og:type" content="article" />
     <meta property="og:url" content="https://demos.creative-tim.com/material-kit-pro/presentation.html" />
     <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/46/original/opt_mkp_thumbnail.jpg" />
     <meta property="og:description" content="Start Your Development With A Badass Bootstrap 4 UI Kit inspired by Material Design" />
     <meta property="og:site_name" content="Creative Tim" />
     <!--     Fonts and icons     -->
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
     <!-- CSS Files -->
     <link href="{{ asset('material') }}/css/material-kit.min.css?v=2.2.0" rel="stylesheet" />
     <!-- CSS Just for demo purpose, dont include it in your project -->
     <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
     <link href="{{ asset('material') }}/demo/vertical-nav.css" rel="stylesheet" />
   </head>

   <body class="contact-page sidebar-collapse">
    <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
        <div class="container">
          <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div class="logo-big">
                    <img src="{{ asset('material') }}/img/VirtuExpo_Logo.png" class="img-fluid">
                </div>
                <div class="logo-small">
                    <img src="{{ asset('material') }}/img/VirtuExpo_Logo.png" class="img-fluid">
                </div>
                <div class="ripple-container"></div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse">
             <ul class="ml-auto navbar-nav">
                 {{-- <li class="dropdown nav-item">
                     <a href="/material/index.html" class="nav-link" target="_blank">
                         <i class="material-icons d-none d-lg-inline-block d-xl-inline-block">apps</i>{{ __(' Includes Material Kit PRO') }}
                     </a>
                 </li> --}}
                 @guest
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <strong>{{ __('Home') }}</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.aboutus.index') }}" class="nav-link">
                            <strong>{{ __('About Us') }}</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.contactus.index') }}" class="nav-link">
                            <strong>{{ __('Contact Us') }}</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.blogs') }}" class="nav-link">
                            <strong>{{ __('Blog') }}</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.article.index') }}" class="nav-link"><strong>{{ __('All Exhibitions') }}</strong></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="btn btn-warning btn-round btn-block">
                            {{ __('Download App') }}
                        </a>
                    </li>
                    <!--- <li class="button-container dropdown nav-item mr-lg-2">
                         <a href="{{ route('login') }}" class="btn btn-info btn-round btn-block">
                             {{ __('Login') }}
                         </a>
                         <div class="dropdown-menu dropdown-with-icons">
                             <form method="get" action="{{ route('login') }}" style="display: none;" id="loginForm">
                                 <input type="text" value="" name="role" id="roleType">
                             </form>
                             <a href="#" class="mx-2 dropdown-item" onclick="document.getElementById('roleType').value='1';
                                                                        document.getElementById('loginForm').submit();">
                                 <strong>{{ __('Admin') }}</strong>&nbsp;{{ __('to manage the blog') }}
                             </a>
                             <a href="#" class="mx-2 dropdown-item" onclick="document.getElementById('roleType').value='2';
                                                                        document.getElementById('loginForm').submit();">
                                 <strong>{{ __('Author') }}</strong>&nbsp;{{ __('to manage articles') }}
                             </a>
                             <a href="#" class="mx-2 dropdown-item" onclick="document.getElementById('roleType').value='3';
                                                                        document.getElementById('loginForm').submit();">
                                 <strong>{{ __('Member') }}</strong>&nbsp;{{ __('to comment') }}
                             </a>
                         </div>
                     </li>--->
                     <li class="nav-item">
                         <!---<a href="<?php request()->getHttpHost()?>/expo" target="_blank" class="btn btn-success btn-round btn-block">
                             {{ __('Go to Expo') }}
                         </a>--->
                     </li>
                 @endguest

                 @auth()
                     <form method="POST" action="{{ route('logout') }}" style="display: none" id="logoutForm">
                         @csrf
                     </form>
                     <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <strong>{{ __('Home') }}</strong>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('blog.aboutus.index') }}" class="nav-link">
                            <strong>{{ __('About Us') }}</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.contactus.index') }}" class="nav-link">
                            <strong>{{ __('Contact Us') }}</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.blogs') }}" class="nav-link">
                            <strong>{{ __('Blog') }}</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.article.index') }}" class="nav-link"><strong>{{ __('All Exhibitions') }}</strong></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="btn btn-warning btn-round btn-block">
                            {{ __('Download App') }}
                        </a>
                    </li>
                     <li class="dropdown nav-item">
                         <a class="nav-link" href = "{{route('dashboard')}}">
                              {{ __('Go to') }} <strong>{{ __('Admin') }}</strong> {{ __(' panel') }}
                         </a>

                     </li>
                     <li class="button-container dropdown nav-item mr-lg-2">
                         <a href="" target="_blank" class="btn btn-info btn-round btn-block" onclick="document.getElementById('logoutForm').submit();">
                             {{ __('Logout') }}
                         </a>
                     </li>
                     <li class="nav-item">
                         <!---<a href="<?php request()->getHttpHost()?>/expo" target="_blank" class="btn btn-success btn-round btn-block">
                             {{ __('Go to Expo') }}
                         </a>--->
                     </li>
                 @endauth
             </ul>
          </div>
        </div>
      </nav>
     <div id="contactUsMap" class="big-map"></div>
     <div class="main main-raised">
       <div class="contact-content">
         <div class="container">
           <h2 class="title">Send us a message</h2>
           <div class="row">
             <div class="col-md-6">
               <p class="description">You can contact us with anything related to our Products. We&apos;ll get in touch with you as soon as possible.<br><br>
               </p>
               <form method="post" enctype="multipart/form-data" action="{{ route('blog.contactus.store') }}"
               autocomplete="off" class="form-horizontal role-form">
               @csrf
               @method('post')
                 <div class="form-group">
                   <label for="name" class="bmd-label-floating">Your name</label>
                   <input type="text" name="name" class="form-control" id="name">
                 </div>
                 <div class="form-group">
                   <label for="exampleInputEmails" class="bmd-label-floating">Email address</label>
                   <input type="email" name="email" class="form-control" id="exampleInputEmails">
                   <span class="bmd-help">We'll never share your email with anyone else.</span>
                 </div>
                 <div class="form-group">
                   <label for="phone" class="bmd-label-floating">Phone</label>
                   <input type="text" name="phone" class="form-control" id="phone">
                 </div>
                 <div class="form-group label-floating">
                   <label class="form-control-label bmd-label-floating" for="message"> Your message</label>
                   <textarea class="form-control" name="message" rows="6" id="message"></textarea>
                 </div>
                 <div class="text-center submit">
                   <button type="submit" class="btn btn-primary btn-raised btn-round">Contact Us</button>
                 </div>
               </form>
             </div>
             <div class="ml-auto col-md-4">
               <div class="info info-horizontal">
                 <div class="icon icon-primary">
                   <i class="material-icons">pin_drop</i>
                 </div>
                 <div class="description">
                   <h4 class="info-title">Find us at the office</h4>
                   <p> Bld Mihail Kogalniceanu, nr. 8,<br>
                     7652 Bucharest,<br>
                     Romania
                   </p>
                 </div>
               </div>
               <div class="info info-horizontal">
                 <div class="icon icon-primary">
                   <i class="material-icons">phone</i>
                 </div>
                 <div class="description">
                   <h4 class="info-title">Give us a ring</h4>
                   <p> Michael Jordan<br>
                     +40 762 321 762<br>
                     Mon - Fri, 8:00-22:00
                   </p>
                 </div>
               </div>
               <div class="info info-horizontal">
                 <div class="icon icon-primary">
                   <i class="material-icons">business_center</i>
                 </div>
                 <div class="description">
                   <h4 class="info-title">Legal Information</h4>
                   <p> Creative Tim Ltd.<br>
                     VAT &#xB7; EN2341241<br>
                     IBAN &#xB7; EN8732ENGB2300099123<br>
                     Bank &#xB7; Great Britain Bank
                   </p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
     <footer class="footer footer-white footer-big">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <h5>{{ __('Industries') }}</h5>
                        <ul class="links-vertical">
                            @foreach ($footerAuthors as $author)
                                <li>
                                    <a href="{{ route('blog.exhibition.industry', $author->slug) }}">
                                        {{ $author->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>{{ __('Articles') }}</h5>
                        <ul class="links-vertical">
                            @foreach ($footerCategories as $category)
                                <li>
                                    <a href="{{ route('blog.article.show', $category->slug) }}">
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>{{ __('Download App') }}</h5>
                        <a href="" target="_blank" alt="..."><img src="/material/img/Androids.png"></img><img src="/material/img/iOS.png"></img></a>

                        <!---<ul class="links-horizontal">
                            @foreach ($footerTags as $tag)
                                @if ($tag->articles->isnotEmpty())
                                <li>
                                    <a style = "padding:1px" href="{{ route('blog.tag', $tag->slug) }}"><span style="background-color: {{ $tag->color }}" class="badge badge-pill">{{ $tag->name }}</span></a>
                                </li>
                                @endif
                            @endforeach
                        </ul>--->
                    </div>
                    <div class="col-md-3">
                        <h5>{{ __('Newsletter') }}</h5>
                        <p>
                            {{ __('Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about
                            this.') }}
                        </p>
                        <form class="form form-newsletter" method="post" action="{{route('blog.newsletter.store')}}" id="newsletter">
                            @csrf

                            <input style="display:none" name="newsletter" value="1">
                            @if ($errors->has('newsletter_email'))
                                <div id="email-error" class="error text-danger" for="email" style="display: block;">
                                    <strong>{{ $errors->first('newsletter_email') }}</strong>
                                </div>
                            @endif
                            <div class="form-group bmd-form-group" >
                                <input type="email" class="form-control" name="newsletter_email" placeholder="Your Email...">
                            </div>
                            <button type="submit" class="btn btn-primary btn-just-icon" name="button">
                                <i class="material-icons">{{ __('mail') }}</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <nav>
                <ul>
                    <li>
                        <a href="{{  route('home') }}" target="_blank">
                            {{ __('Virtu Expo') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.aboutus.index') }}">
                            {{ __('About Us') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.blogs') }}">
                            {{ __('Blog') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.contactus.index') }}">
                            {{ __('Contact Us') }}
                        </a>
                    </li>
                    <!---<li>
                        <a href="https://www.updivision.com" target="_blank">
                            {{ __('UPDIVISION') }}
                        </a>
                    </li>--->
                </ul>
            </nav>
            <ul class="social-buttons">
                <li>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                </li>
                <li>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                        <i class="fa fa-dribbble"></i>
                    </a>
                </li>
                <li>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
                <li>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-youtube">
                        <i class="fa fa-youtube-play"></i>
                    </a>
                </li>
            </ul>
            <div class="copyright pull-center">
                {{ __('Copyright ©') }}
                <script>
                    document.write(new Date().getFullYear())
                </script><a href="{{ route('home') }}" target="_blank">{{ __('Virtual Expo') }}</a>{{ __(' All Rights Reserved.') }}
            </div>
        </div>
    </footer>
     <!--   Core JS Files   -->
     <script src="{{ asset('material') }}/js/core/jquery.min.js" type="text/javascript"></script>
     <script src="{{ asset('material') }}/js/core/popper.min.js" type="text/javascript"></script>
     <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
     <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
     <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
     <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
     <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
     <script src="{{ asset('material') }}/js/plugins/nouislider.min.js" type="text/javascript"></script>
     <!--  Google Maps Plugin    -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
     <!--	Plugin for Sharrre btn -->
     <script src="../assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
     <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
     <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
     <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
     <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
     <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
     <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
     <!--	Plugin for Small Gallery in Product Page -->
     <script src="{{ asset('material') }}/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
     <!-- Plugins for presentation and navigation  -->
     <script src="{{ asset('material') }}/demo/modernizr.js" type="text/javascript"></script>
     <script src="{{ asset('material') }}/demo/vertical-nav.js" type="text/javascript"></script>
     <!-- Place this tag in your head or just before your close body tag. -->
     <script async defer src="https://buttons.github.io/buttons.js"></script>
     <!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
     <script src="{{ asset('material') }}/demo/demo.js" type="text/javascript"></script>
     <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
     <script src="{{ asset('material') }}/js/material-kit.min.js?v=2.2.0" type="text/javascript"></script>
     <script>
       $().ready(function() {
         materialKitDemo.initContactUsMap();
       });
     </script>
   </body>

   </html>
