<?php $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first(); ?>
<div class="sidebar" data-color="rose" data-background-color="black"
    data-image="{{ asset('material') }}/img/sidebar-5.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-mini">
            {{ __('VE') }}
        </a>
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ __('Virtu Expo') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <!---<div class="user">
            <div class="photo">
                <img src="{{ auth()->user()->profilePicture() }}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        {{ auth()->user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="sidebar-mini"> LO </span>
                                <span class="sidebar-normal"> Log Out </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>--->
        <ul class="nav">
            <!---<li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                     <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">home</i>
                    <p>{{ __('Go to Blog') }}</p>
                </a>
            </li>--->
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }} </p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'exhibitions-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('exhibition.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">account_balance</i>
                    <p> {{ __('Exhibitions') }} </p>
                </a>
            </li>
            @if($role->name == 'Dev Admin' || $role->name == 'Admin')
            <li class="nav-item{{ $activePage == 'company-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('company.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">business</i>
                    <p> {{ __('Companies') }} </p>
                </a>
            </li>
            @endif
            @if($role->name == 'Dev Admin' || $role->name == 'Admin')
            @can('manage-users', App\User::class)
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">supervised_user_circle</i>
                    <p> {{ __('Users') }} </p>
                </a>
            </li>
            @endcan
            <li class="nav-item{{ $activePage == 'sector-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('sector.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">group_work</i>
                    <p> {{ __('Industry') }} </p>
                </a>
            </li>
            @endif
            @if($role->name == 'Dev Admin')
            <li class="nav-item{{ $activePage == 'models-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('model.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">store_mall_directory</i>
                    <p> {{ __('Models') }} </p>
                </a>
            </li>
            @endif
            @if($role->name == 'Dev Admin' || $role->name == 'Admin')
            <li class="nav-item{{ $activePage == 'packages-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('package.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">local_offer</i>
                    <p> {{ __('Packages') }} </p>
                </a>
            </li>
            @endif
            <li class="nav-item{{ $activePage == 'promotional-material-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('promotionalmaterial.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">library_books</i>
                    <p> {{ __('Promotional Materials') }} </p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'inquiry-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('inquiry.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">phone</i>
                    <p> {{ __('inquiries') }} </p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'products-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('product.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">shopping_cart</i>
                    <p> {{ __('Products') }} </p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'visitor-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('visitor.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">person_pin</i>
                    <p> {{ __('Visitors') }} </p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'communication-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('communication.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">chat</i>
                    <p> {{ __('Communication') }} </p>
                </a>
            </li>
            <!---<li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i _ngcontent-gsf-c19="" class="material-icons icon-image-preview">account_circle</i>
                    <p>{{ __('User profile') }} </p>
                </a>
            </li>--->
            @if($role->name == 'Dev Admin' || $role->name == 'Admin')
            @can('manage-articles', App\User::class)
                <li class="nav-item{{ $activePage == 'tag-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('tag.index') }}">
                            <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">loyalty</i>
                        <p> {{ __('Tags') }} </p>
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'article-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('article.index') }}">
                            <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">class</i>
                        <p> {{ __('Articles') }} </p>
                    </a>
                </li>
            @endcan
            @endif
            @can('manage-users', App\User::class)
            <li class="nav-item{{ $activePage == 'role-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('role.index') }}">
                        <i _ngcontent-gbk-c19="" class="material-icons icon-image-preview">assignment_ind</i>
                    <p> {{ __('Roles') }} </p>
                </a>
            </li>
            @endcan
            <hr class="bg-white">
            <!----<li class="nav-item{{ $activePage == 'item-management' ? ' active' : '' }}">
                <a class="nav-link sub-title">
                        <h4 class="text-white"><b>EXTRA GOODIES</b></h4>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'item-management' ? ' active' : '' }}">
                <a class="nav-link sub-title">
                        <h5 class="text-white" style="color:#e91e63 !important">Material Dashboard PRO</h5>
                </a>
            </li>
            <ul class="nav">
                <li class="nav-item {{ $menuParent == 'pages' ? 'active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#pagesExamples" {{ $menuParent == 'Pages' ? 'aria-expanded="true"' : '' }}>
                    <i class="material-icons">image</i>
                    <p> {{ __('Pages') }}
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse{{ $menuParent == 'pages' ? ' show' : '' }}" id="pagesExamples">
                    <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('page.pricing') }}">
                          <span class="sidebar-mini"> P </span>
                          <span class="sidebar-normal"> {{ __('Pricing') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('page.rtl-support') }}">
                          <span class="sidebar-mini"> RS </span>
                          <span class="sidebar-normal"> {{ __('RTL Support') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'timeline' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.timeline') }}">
                          <span class="sidebar-mini"> T </span>
                          <span class="sidebar-normal"> {{ __('Timeline') }} </span>
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="{{ route('page.lock') }}">
                          <span class="sidebar-mini"> LSP </span>
                          <span class="sidebar-normal"> {{ __('Lock Screen Page') }} </span>
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                          <span class="sidebar-mini"> UP </span>
                          <span class="sidebar-normal"> User Profile </span>
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="{{ route('page.error') }}">
                          <span class="sidebar-mini"> E </span>
                          <span class="sidebar-normal"> Error Page </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item {{ $menuParent == 'compoments' ? 'active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#componentsExamples" {{ $menuParent == 'components' ? 'aria-expanded="true"' : '' }}>
                    <i class="material-icons">apps</i>
                    <p> Components
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ $menuParent == 'components' ? ' show' : '' }}" id="componentsExamples">
                    <ul class="nav">
                      <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                          <span class="sidebar-mini"> MLT </span>
                          <span class="sidebar-normal"> Multi Level Collapse
                            <b class="caret"></b>
                          </span>
                        </a>
                        <div class="collapse" id="componentsCollapse">
                          <ul class="nav">
                            <li class="nav-item ">
                              <a class="nav-link" href="#0">
                                <span class="sidebar-mini"> E </span>
                                <span class="sidebar-normal"> Example </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item{{ $activePage == 'buttons' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.buttons') }}">
                          <span class="sidebar-mini"> B </span>
                          <span class="sidebar-normal"> {{ __('Buttons') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'grid' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.grid') }}">
                          <span class="sidebar-mini"> GS </span>
                          <span class="sidebar-normal"> {{ __('Grid System') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'panels' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('page.panels') }}">
                          <span class="sidebar-mini"> P </span>
                          <span class="sidebar-normal"> {{ __('Panels') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'sweet-alert' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.sweet-alert') }}">
                          <span class="sidebar-mini"> SA </span>
                          <span class="sidebar-normal"> {{ __('Sweet Alert') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.notifications') }}">
                          <span class="sidebar-mini"> N </span>
                          <span class="sidebar-normal"> {{ __('Notifications') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.icons') }}">
                          <span class="sidebar-mini"> I </span>
                          <span class="sidebar-normal"> {{ __('Icons') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.typography') }}">
                          <span class="sidebar-mini"> T </span>
                          <span class="sidebar-normal"> {{ __('Typography') }} </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item {{ $menuParent == 'forms' ? ' active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#formsExamples" {{ $menuParent == 'forms' ? 'aria-expanded="true"' : '' }}>
                    <i class="material-icons">content_paste</i>
                    <p> Forms
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ $menuParent == 'forms' ? 'show' : '' }}" id="formsExamples">
                    <ul class="nav">
                      <li class="nav-item{{ $activePage == 'form_regular' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.regular_forms') }}">
                          <span class="sidebar-mini"> RF </span>
                          <span class="sidebar-normal"> {{ __('Regular Forms') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'form_extended' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.extended_forms') }}">
                          <span class="sidebar-mini"> EF </span>
                          <span class="sidebar-normal"> {{ __('Extended Forms') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'form_validation' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.validation_forms') }}">
                          <span class="sidebar-mini"> VF </span>
                          <span class="sidebar-normal"> {{ __('Validation Forms') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'form_wizard' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.wizard_forms') }}">
                          <span class="sidebar-mini"> W </span>
                          <span class="sidebar-normal"> {{ __('Wizard') }} </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item {{ $menuParent == 'tables' ? 'active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#tablesExamples" {{ $menuParent == 'tables' ? 'aria-expanded="true"' : '' }}>
                    <i class="material-icons">grid_on</i>
                    <p> {{ __('Tables') }}
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ $menuParent == 'tables' ? 'show' : '' }}" id="tablesExamples">
                    <ul class="nav">
                      <li class="nav-item{{ $activePage == 'regular' ? ' active' : '' }}  ">
                        <a class="nav-link" href="{{ route('page.regular_tables') }}">
                          <span class="sidebar-mini"> RT </span>
                          <span class="sidebar-normal"> {{ __('Regular Tables') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'extended' ? ' active' : '' }}  ">
                        <a class="nav-link" href="{{ route('page.extended_tables') }}">
                          <span class="sidebar-mini"> ET </span>
                          <span class="sidebar-normal"> {{ __('Extended Tables') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'datatables' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.datatable_tables') }}">
                          <span class="sidebar-mini"> DT </span>
                          <span class="sidebar-normal"> {{ __('DataTables.net') }} </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item {{ $menuParent == 'maps' ? 'active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#mapsExamples" {{ $menuParent == 'maps' ? 'aria-expanded="true"' : '' }}>
                    <i class="material-icons">place</i>
                    <p> Maps
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ $menuParent == 'maps' ? 'show' : '' }}" id="mapsExamples">
                    <ul class="nav">
                      <li class="nav-item{{ $activePage == 'google_maps' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.google_maps') }}">
                          <span class="sidebar-mini"> GM </span>
                          <span class="sidebar-normal"> {{ __('Google Maps') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'fullscreen_maps' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.fullscreen_maps') }}">
                          <span class="sidebar-mini"> FSM </span>
                          <span class="sidebar-normal"> {{ __('Full Screen Map') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'vector_maps' ? ' active' : '' }} ">
                        <a class="nav-link" href="{{ route('page.vector_maps') }}">
                          <span class="sidebar-mini"> VM </span>
                          <span class="sidebar-normal"> {{ __('Vector Map') }} </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item{{ $activePage == 'widgets' ? ' active' : '' }} ">
                  <a class="nav-link" href="{{ route('page.widgets') }}">
                    <i class="material-icons">widgets</i>
                    <p> Widgets </p>
                  </a>
                </li>
                <li class="nav-item{{ $activePage == 'charts' ? ' active' : '' }} ">
                  <a class="nav-link" href="{{ route('page.charts') }}">
                    <i class="material-icons">timeline</i>
                    <p> Charts </p>
                  </a>
                </li>
                <li class="nav-item{{ $activePage == 'calendar' ? ' active' : '' }} ">
                  <a class="nav-link" href="{{ route('page.calendar') }}">
                    <i class="material-icons">date_range</i>
                    <p> Calendar </p>
                  </a>
                </li>
            </ul>
            <li class="dropdown nav-item">
                    <a href="/material/material-dashboard-pro/examples/dashboard.html" class="nav-link" target="_blank">
                        <i class="material-icons d-none d-lg-inline-block d-xl-inline-block">apps</i>{{ __('Material Dashboard PRO') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sub-title">
                            <h5 class="text-white" style="color:#e91e63 !important">Material Kit PRO</h5>
                    </a>
                </li>
                <li class="nav-item {{ $menuParent == 'comp' ? 'active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#compExamples" {{ $menuParent == 'comp' ? 'aria-expanded="true"' : '' }}>
                    <i class="material-icons">apps</i>
                    <p> Components
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ $menuParent == 'comp' ? 'show' : '' }}" id="compExamples">
                    <ul class="nav">
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/presentation.html" class="nav-link " target="blank">
                          <i class="material-icons">layers</i> Presentation
                      </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/index.html" class="nav-link" target="blank">
                          <i class="material-icons">line_style</i> All Components
                      </a>
                      </li>
                      <li class="nav-item">
                        <a href="/material/material-kit-pro/docs/2.1/getting-started/introduction.html" class="nav-link" target="blank">
                          <i class="material-icons">content_paste</i> Documentation
                      </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item {{ $menuParent == 'sect' ? 'active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#sectExamples" {{ $menuParent == 'sect' ? 'aria-expanded="true"' : '' }}>
                    <p><i class="material-icons">view_day</i> Sections
                    <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ $menuParent == 'sect' ? 'show' : '' }}" id="sectExamples">
                    <ul class="nav">
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/sections.html#headers" class="nav-link" target="blank">
                          <i class="material-icons">dns</i> Headers
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/sections.html#features" class="nav-link" target="blank">
                          <i class="material-icons">build</i> Features
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/material/material-kit-pro/sections.html#blogs" class="nav-link" target="blank">
                          <i class="material-icons">list</i> Blogs
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/material/material-kit-pro/sections.html#teams" class="nav-link" target="blank">
                          <i class="material-icons">people</i> Teams
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/material/material-kit-pro/sections.html#projects" class="nav-link" target="blank">
                          <i class="material-icons">assignment</i> Projects
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/material/material-kit-pro/sections.html#pricing" class="nav-link" target="blank">
                          <i class="material-icons">monetization_on</i> Pricing
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/material/material-kit-pro/sections.html#testimonials" class="nav-link" target="blank">
                          <i class="material-icons">chat</i> Testimonials
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/material/material-kit-pro/sections.html#contactus" class="nav-link" target="blank">
                          <i class="material-icons">call</i> Contacts
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item {{ $menuParent == 'ex' ? 'active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#exExamples" {{ $menuParent == 'ex' ? 'aria-expanded="true"' : '' }}>
                    <i class="material-icons">view_carousel</i>
                    <p> Examples
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ $menuParent == 'ex' ? 'show' : '' }}" id="exExamples">
                    <ul class="nav">
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/about-us.html" class="nav-link " target="blank">
                          <i class="material-icons">account_balance</i> About Us
                      </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/blog-post.html" class="nav-link " target="blank">
                          <i class="material-icons">art_track</i> Blog Post
                      </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/blog-posts.html" class="nav-link " target="blank">
                          <i class="material-icons">view_quilt</i> Blog Posts
                      </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/contact-us.html" class="nav-link " target="blank">
                          <i class="material-icons">location_on</i> Contact Us
                      </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/landing-page.html" class="nav-link " target="blank">
                          <i class="material-icons">view_day</i> Landing Page
                      </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/login-page.html" class="nav-link " target="blank">
                          <i class="material-icons">fingerprint</i> Login Page
                      </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/pricing.html" class="nav-link " target="blank">
                          <i class="material-icons">attach_money</i> Pricing Page
                      </a>
                      </li>
                      <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/shopping-cart.html" class="nav-link " target="blank">
                          <i class="material-icons">shopping_basket</i> Shopping Cart
                      </a>
                      </li>
                       <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/ecommerce.html" class="nav-link " target="blank">
                          <i class="material-icons">store</i> Ecommerce Page
                      </a>
                      </li>
                       <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/product-page.html" class="nav-link " target="blank">
                          <i class="material-icons">shopping_cart</i> Product Page
                      </a>
                      </li>
                       <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/profile-page.html" class="nav-link " target="blank">
                          <i class="material-icons">account_circle</i> Profile Page
                      </a>
                      </li>
                       <li class="nav-item ">
                        <a href="/material/material-kit-pro/examples/signup-page.html" class="nav-link " target="blank">
                          <i class="material-icons">person_add</i> Signup Page
                      </a>
                      </li>
                    </ul>
                  </div>
                </li>--->
        </ul>
    </div>
</div>
