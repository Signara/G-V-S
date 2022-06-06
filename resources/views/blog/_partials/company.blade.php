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
     <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-kit.css" rel="stylesheet" />
     <!-- CSS Just for demo purpose, dont include it in your project -->
     <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
     <link href="{{ asset('material') }}/demo/vertical-nav.css" rel="stylesheet" />
   </head>

   <body class="profile-page sidebar-collapse">
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

                <!---<li class="button-container nav-item iframe-extern">
                    <a href="https://www.creative-tim.com/product/material-blog-pro-laravel" target="_blank"
                        class="btn btn-rose btn-round btn-block">
                        <i class="material-icons">{{ ('shopping_cart') }}</i>{{ (' Buy Now') }}
                    </a>
                </li>--->
            </ul>
         </div>
       </div>
     </nav>
     <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('material') }}/img/city-profile.jpg');"></div>
     <div class="main main-raised">
       <div class="profile-content">
         <div class="container">
           <div class="row">
             <div class="ml-auto mr-auto col-md-6">
               <div class="profile">
                 <div class="avatar">
                    @if ($companies->Logo == '')
                    <img  alt="Circle Image" class="img-raised rounded-circle img-fluid" src="{{ asset('material') }}/img/company-profile-placeholder.png">
                    @else
                    <img src="{{ asset('storage').'/'.$companies->Logo }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                    @endif
                 </div>
                 <div class="name">
                   <h3 class="title">{{ $companies->CommonName }}</h3>
                   <?php
                        $sectorList = [];
                        $sectordata = DB::table('sectors')->select('name')->whereIn('id', explode(',',$companies->Sectors))->get()->toArray();
                        foreach ($sectordata as $sector)
                        {
                            $sectorList[] = $sector->name;
                        }
                        $sectorName = '';
                        $sectorName = implode(', ', $sectorList); ?>
                   <h5>{{ $sectorName }}</h5>
                   <?php
                        $categoryList = [];
                        $categorydata = DB::table('categories')->select('name')->whereIn('id', explode(',',$companies->Categories))->get()->toArray();
                        foreach ($categorydata as $category)
                        {
                            $categoryList[] = $category->name;
                        }
                        $categoryName = '';
                        $categoryName = implode(', ', $categoryList); ?>
                   <h6>{{ $categoryName }}</h6>
                 </div>
               </div>
             </div>
           </div>
           <div class="row">
             <div class="ml-auto mr-auto col-md-6">
               <div class="profile-tabs">
                 <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                   <!--
                                                           color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                                   -->
                   <li class="nav-item">
                     <a class="nav-link active" href="#work" role="tab" data-toggle="tab">
                       <i class="material-icons">palette</i>
                       Products
                     </a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#connections" role="tab" data-toggle="tab">
                       <i class="material-icons">people</i>
                       Employees
                     </a>
                   </li>
                 </ul>
               </div>
             </div>
           </div>
           <div class="tab-content tab-space">
             <div class="tab-pane active work" id="work">
               <div class="row">
                 <div class="ml-auto mr-auto col-md-7 ">
                   <h4 class="title">Products</h4>
                   <div class="row collections">
                    <?php
                    $products = DB::table('products')->where('Company','=',$companies->id)->orderBy('id','DESC')->get()->toArray();

                    $productscount = DB::table('products')->where('Company','=',$companies->id)->select('id')->count();

                    $exhibitionscount = DB::table('exhibitions')->where('Organiser','=',$companies->id)->select('id')->count();
                    ?>
                    @foreach($products as $product)
                     <div class="col-md-6">
                       <div class="card card-background" style="background-image: url('{{ asset('storage').'/'.$product->Image }}')">
                         <a href="#pablo"></a>
                         <div class="card-body">
                           <a href="#pablo">
                             <h2 class="card-title">{{ $product->Name }}</h2>
                           </a>
                         </div>
                       </div>
                     </div>
                    @endforeach
                   </div>
                 </div>
                 <div class="ml-auto mr-auto col-md-2 stats">
                   <h4 class="title">Stats</h4>
                   <ul class="list-unstyled">
                     <li><b>{{ $productscount }}</b> Products</li>
                     <li><b>{{ $exhibitionscount }}</b> Exhibitions</li>
                   </ul>
                   <hr>
                   <h4 class="title">About</h4>
                   <p class="description">{{ Str::limit($companies->Description, '50') }}</p>
                   <hr>
                   <h4 class="title">Keywords</h4>
                   <?php $keywords = explode(',', $companies->keywords); ?>
                   @foreach($keywords as $keyword)
                   <span class="badge badge-primary">{{ $keyword }}</span>
                   @endforeach
                   <hr>
                   <h4 class="title">Social Media</h4>
                   <a href="{{ $companies->facebook }}" class="btn btn-just-icon btn-link btn-facebook">
                    <i class="fa fa-facebook-square"></i>
                   </a>
                   <a href="{{ $companies->twitter }}" class="btn btn-just-icon btn-link btn-twitter">
                    <i class="fa fa-twitter"></i>
                   </a>
                   <a href="{{ $companies->instagram }}" class="btn btn-just-icon btn-link btn-instagram">
                    <i class="fa fa-instagram"></i>
                   </a>
                   <a href="{{ $companies->youtube }}" class="btn btn-just-icon btn-link btn-linkedin">
                    <i class="fa fa-linkedin-square"></i>
                   </a>
                   <a href="{{ $companies->linkedin }}" class="btn btn-just-icon btn-link btn-youtube">
                    <i class="fa fa-youtube-play"></i>
                   </a>
                 </div>
               </div>
             </div>
             <div class="tab-pane connections" id="connections">
               <div class="row">
               <?php $employeedatas = DB::table('users')->whereIn('id', explode(',',$companies->CompanyAdminUserIDs))->get(); ?>
               @foreach($employeedatas as $employeedata)
                 <div class="ml-auto mr-auto col-md-5">
                   <div class="card card-profile card-plain">
                     <div class="row">
                       <div class="col-md-5">
                         <div class="card-header card-header-image">
                            @if ($employeedata->picture == '')
                            <img  alt="Profile Image" class="img" src="{{ asset('material') }}/img/user-profile-placeholder.png">
                            @else
                            <img class="img" src="{{ asset('storage').'/'.$employeedata->picture }}" />
                            @endif
                         </div>
                       </div>
                       <div class="col-md-7">
                         <div class="card-body">
                           <h4 class="card-title">{{ $employeedata->name }}</h4>
                           <h6 class="card-category text-muted">{{ $employeedata->Designation }}</h6>
                           <p class="card-description">
                           </p>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 @endforeach
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
     <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
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
