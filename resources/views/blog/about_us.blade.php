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
     <!--     Fonts and icons     -->
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
     <!-- CSS Files -->
     <link href="{{ asset('material') }}/css/material-kit.min.css?v=2.2.0" rel="stylesheet" />
     <!-- CSS Just for demo purpose, dont include it in your project -->
     <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
     <link href="{{ asset('material') }}/demo/vertical-nav.css" rel="stylesheet" />
   </head>

   <body class="about-us sidebar-collapse">
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
                    <!---<li class="button-container dropdown nav-item mr-lg-2">
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
     <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../assets/img/bg9.jpg');">
       <div class="container">
         <div class="row">
           <div class="ml-auto mr-auto text-center col-md-8">
             <h1 class="title">About Us</h1>
             <h4>Meet the amazing team behind this project and find out more about how we work.</h4>
           </div>
         </div>
       </div>
     </div>
     <div class="main main-raised">
       <div class="container">
         <div class="text-center about-description">
           <div class="row">
             <div class="ml-auto mr-auto col-md-8">
               <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
             </div>
           </div>
         </div>
         <div class="about-team team-1">
           <div class="row">
             <div class="ml-auto mr-auto text-center col-md-8">
               <h2 class="title">We are nerd rockstars</h2>
               <h5 class="description">This is the paragraph where you can write more details about your team. Keep you user engaged by providing meaningful information.</h5>
             </div>
           </div>
           <div class="row">
             <div class="col-md-3">
               <div class="card card-profile card-plain">
                 <div class="card-avatar">
                   <a href="#pablo">
                     <img class="img" src="../assets/img/faces/marc.jpg">
                   </a>
                 </div>
                 <div class="card-body">
                   <h4 class="card-title">Alec Thompson</h4>
                   <h6 class="category text-muted">CEO / Co-Founder</h6>
                   <p class="card-description">
                     And I love you like Kanye loves Kanye. We need to restart the human foundation.
                   </p>
                 </div>
                 <div class="card-footer justify-content-center">
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                     <i class="fa fa-twitter"></i>
                   </a>
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                     <i class="fa fa-facebook-square"></i>
                   </a>
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                     <i class="fa fa-google"></i>
                   </a>
                 </div>
               </div>
             </div>
             <div class="col-md-3">
               <div class="card card-profile card-plain">
                 <div class="card-avatar">
                   <a href="#pablo">
                     <img class="img" src="../assets/img/faces/kendall.jpg">
                   </a>
                 </div>
                 <div class="card-body">
                   <h4 class="card-title">Tania Andrew</h4>
                   <h6 class="category text-muted">Designer</h6>
                   <p class="card-description">
                     Don't be scared of the truth because we need to restart the human foundation. And I love you like Kanye loves Kanye.
                   </p>
                 </div>
                 <div class="card-footer justify-content-center">
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                     <i class="fa fa-twitter"></i>
                   </a>
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                     <i class="fa fa-dribbble"></i>
                   </a>
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-linkedin">
                     <i class="fa fa-linkedin"></i>
                   </a>
                 </div>
               </div>
             </div>
             <div class="col-md-3">
               <div class="card card-profile card-plain">
                 <div class="card-avatar">
                   <a href="#pablo">
                     <img class="img" src="../assets/img/faces/christian.jpg">
                   </a>
                 </div>
                 <div class="card-body">
                   <h4 class="card-title">Christian Mike</h4>
                   <h6 class="category text-muted">Web Developer</h6>
                   <p class="card-description">
                     I love you like Kanye loves Kanye. Don't be scared of the truth because we need to restart the human foundation.
                   </p>
                 </div>
                 <div class="card-footer justify-content-center">
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook"><i class="fa fa-facebook-square"></i></a>
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                 </div>
               </div>
             </div>
             <div class="col-md-3">
               <div class="card card-profile card-plain">
                 <div class="card-avatar">
                   <a href="#pablo">
                     <img class="img" src="../assets/img/faces/avatar.jpg">
                   </a>
                 </div>
                 <div class="card-body">
                   <h4 class="card-title">Rebecca Stormvile</h4>
                   <h6 class="category text-muted">Web Developer</h6>
                   <p class="card-description">
                     Don't be scared of the truth because we need to restart the human foundation.
                   </p>
                 </div>
                 <div class="card-footer justify-content-center">
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-google"><i class="fa fa-google"></i></a>
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                   <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="about-services features-2">
           <div class="row">
             <div class="ml-auto mr-auto text-center col-md-8">
               <h2 class="title">We build awesome products</h2>
               <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information.</h5>
             </div>
           </div>
           <div class="row">
             <div class="col-md-4">
               <div class="info info-horizontal">
                 <div class="icon icon-rose">
                   <i class="material-icons">gesture</i>
                 </div>
                 <div class="description">
                   <h4 class="info-title">1. Design</h4>
                   <p>The moment you use Material Kit, you know you&#x2019;ve never felt anything like it. With a single use, this powerfull UI Kit lets you do more than ever before. </p>
                   <a href="#pablo">Find more...</a>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="info info-horizontal">
                 <div class="icon icon-rose">
                   <i class="material-icons">build</i>
                 </div>
                 <div class="description">
                   <h4 class="info-title">2. Develop</h4>
                   <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                   <a href="#pablo">Find more...</a>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="info info-horizontal">
                 <div class="icon icon-rose">
                   <i class="material-icons">mode_edit</i>
                 </div>
                 <div class="description">
                   <h4 class="info-title">3. Make Edits</h4>
                   <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                   <a href="#pablo">Find more...</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="about-office">
           <div class="text-center row">
             <div class="ml-auto mr-auto col-md-8">
               <h2 class="title">Our office is our second home</h2>
               <h4 class="description">Here are some pictures from our office. You can see the place looks like a palace and is fully equiped with everything you need to get the job done.</h4>
             </div>
           </div>
           <div class="row">
             <div class="col-md-4">
               <img class="rounded img-raised img-fluid" alt="Raised Image" src="../assets/img/examples/office2.jpg">
             </div>
             <div class="col-md-4">
               <img class="rounded img-raised img-fluid" alt="Raised Image" src="../assets/img/examples/office4.jpg">
             </div>
             <div class="col-md-4">
               <img class="rounded img-raised img-fluid" alt="Raised Image" src="../assets/img/examples/office3.jpg">
             </div>
             <div class="col-md-6">
               <img class="rounded img-raised img-fluid" alt="Raised Image" src="../assets/img/examples/office5.jpg">
             </div>
             <div class="col-md-6">
               <img class="rounded img-raised img-fluid" alt="Raised Image" src="../assets/img/examples/office1.jpg">
             </div>
           </div>
         </div>
         <div class="about-contact">
           <div class="row">
             <div class="ml-auto mr-auto col-md-8">
               <h2 class="text-center title">Want to work with us?</h2>
               <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will get back to you in a couple of hours.</h4>
               <form class="contact-form">
                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label for="name" class="bmd-label-floating">Your name</label>
                       <input type="text" class="form-control">
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label for="email" class="bmd-label-floating">Your Email</label>
                       <input type="email" class="form-control">
                     </div>
                   </div>
                   <div class="col-md-4">
                     <select class="selectpicker " data-style="select-with-transition" data-size="7">
                       <option value="1" disabled>Speciality</option>>
                       <option value="2">I&apos;m a Designer</option>
                       <option value="3">I&apos;m a Developer</option>
                       <option value="4">I&apos;m a Hero</option>
                     </select>
                   </div>
                 </div>
                 <div class="row">
                   <div class="ml-auto mr-auto text-center col-md-4">
                     <button class="btn btn-primary btn-round">
                       Let&apos;s talk
                     </button>
                   </div>
                 </div>
               </form>
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
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"><
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

     @push('js')
        @if ($errors->has('newsletter_email'))
            <script>
                $(document).ready(
                    function(){
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#newsletter").offset().top
                        }, 2000);
                    });
            </script>
        @endif
    @endpush
   </body>

   </html>
