@extends('blog.app', [
    'class' => '',
    'classPage' => '',
    'headerImage' => '/material/img/BG-Blurr.jpg'
])

@section('header_content')
    <h1 class="title">
        <!---{!!__('A fully functional Laravel blog <br class="d-none d-xl-block"> with beautiful design') !!}--->
        <div class=" new-feature">
            <!--<h3 class="new-sub">Get three products at the price of one.</h3>
            <h3 class="mt-0 new-sub"><i class="material-icons hide-icon-head">dashboard</i><span class="ml-0">Ready to use blog with Laravel admin</span></h3>
            <h3 class="mt-0 new-sub"><i class="material-icons hide-icon-head">dashboard</i><span class="ml-0">Material Dashboard PRO</span></h3>
            <h3 class="mt-0 new-sub"><i class="material-icons hide-icon-head">dashboard</i>Material Kit PRO</h3>--->
            </div>
    </h1>
@endsection

@section('content')
        <div class="container">
            <div class="row">
            <div class="ml-auto mr-auto col-md-12">
                <div class="text-center">
                <h3 class="title">SEARCH BY INDUSTRY OR EXPO</h3>
                </div>
                <div class="card card-raised card-form-horizontal">
                <div class="card-body ">
                    <form action="{{ route('blog.search') }}">
                    <div class="row">
                        <div class="col-lg-9 col-md-6 ">
                        <span class="bmd-form-group"><div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">{{ ('search') }}</i>
                            </span>
                            </div>
                            <input type="text" name="searching" value="" placeholder="SEARCH BY INDUSTRY OR EXPO" class="form-control">
                        </div></span>
                        </div>
                        <div class="col-lg-3 col-md-6 ">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    <div class="container">

        <div class="row">
            <div class="ml-auto mr-auto text-center col-md-10">
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <a class="flex-sm-fill text-sm-center nav-link" href="#featured">FEATURED EXHIBITIONS</a>
                    <a class="flex-sm-fill text-sm-center nav-link" href="#live">LIVE EXHIBITIONS</a>
                    <a class="flex-sm-fill text-sm-center nav-link" href="#threesixty">365 Days Open</a>
                    <a class="flex-sm-fill text-sm-center nav-link" href="#stats">Stats</a>
                    <a class="flex-sm-fill text-sm-center nav-link" href="#trending">Trending Exhibitions</a>
                    <a class="flex-sm-fill text-sm-center nav-link" href="#latest">Latest Exhibitions</a>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="ml-auto mr-auto text-center col-md-8">
                <h2 class="title">BROWSE BY INDUSTRY</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($industries as $industrY)
            <div class="col-md-3">
              <div class="card card-profile card-plain">
                <div class="card-header card-header-image">
                  <a href="{{ route('blog.exhibition.industry', $industrY->slug) }}">
                    @if ($industrY->picture == '')
                    <img class="img img-raised" src="{{ asset('material') }}/img/examples/card-blog4.jpg">
                    @else
                    <img class="img img-raised" src="{{ $industrY->path() }}">
                    @endif
                  </a>
                </div>
                <div class="card-body">
                    <a href="{{ route('blog.exhibition.industry', $industrY->slug) }}"><h4 class="card-title">{{ $industrY->name }}</h4></a>
                </div>
              </div>
            </div>
            @endforeach
            <a href="{{ route('blog.industry.index') }}" class="btn btn-rose btn-raised btn-round">
                {{ __('View All') }}
            </a>
        </div>

        <div class="section" id="featured">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto text-center col-md-8">
                        <h2 class="title">FEATURED EXHIBITIONS</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($featured_articles as $article)
                    <div class="col-lg-4 col-md-12">
                        <div class="card card-blog">
                            @include('blog._partials.featured_articles')
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container" id="live">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="ml-auto mr-auto text-center col-md-8">
                            <h2 class="title">LIVE EXHIBITIONS</h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($live_articles as $article)
                        <div class="col-lg-4 col-md-12">
                            <div class="card card-blog">
                                @include('blog._partials.live_articles')
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="threesixty">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="ml-auto mr-auto text-center col-md-8">
                            <h2 class="title">365 DAYS OPEN</h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($threesixty_articles as $article)
                        <div class="col-lg-4 col-md-6">
                            <div class="card card-blog">
                                  <div class="card-header card-header-image">
                                    <a href="{{ route('blog.exhibition.index', $article->slug) }}">
                                    @if ($article->Image == '')
                                        <img class="img img-raised" src="{{ asset('material') }}/img/bg5.jpg">
                                    @else
                                        <img class="img img-raised" src="{{ $article->path() }}">
                                    @endif
                                    </a>
                                    <div class="colored-shadow" style="background-image: url(&quot;/storage/articles-seeder/article-upd.jpg&quot;); opacity: 1;">
                                    </div>
                                  </div>
                                  <div class="card-body ">
                                    <h6 class="card-category text-success">
                                        <?php
                                        $tagdata = DB::table('tags')->select('id','name','slug','color')->whereIn('id', explode(',',$article->Tag))->get()->toArray();
                                        ?>
                                        @foreach ($tagdata as $tag)
                                            <a href="{{ route('blog.tag', $tag->slug ) }}"><span style="color: {{ $tag->color }};">{{ $tag->name }}</span></a>
                                        @endforeach
                                    </h6>
                                    <h4 class="card-title">
                                        <a href="{{ route('blog.exhibition.index', $article->slug) }}">{{ $article->Name }}</a>
                                    </h4>
                                    <p class="card-description">
                                        {{ Str::limit($article->Description, '120') }}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="card-title text-left">Start Date</h5>
                                            <h6 class="text-left text-dark">{{ date('d-m-Y', strtotime($article->StartDate)) }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="card-title text-right">End Date</h5>
                                            <h6 class="text-right text-dark">{{ date('d-m-Y', strtotime($article->EndDate)) }}</h6>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                    <div class="author">
                                      <a href="{{ route('blog.company.index', $article->companyslug) }}">
                                        @if ($article->Logo == '')
                                        <img  alt="Profile Image" class="avatar img-raised" src="{{ asset('material') }}/img/company-profile-placeholder.png">
                                        @else
                                        <img src="{{ asset('storage').'/'.$article->Logo }}" alt="..." class="avatar img-raised">
                                        @endif
                                        <span>{{ Str::limit($article->CommonName, '10') }}</span>
                                      </a>
                                    </div>
                                    <div class="ml-auto stats">
                                        <?php
                                        $sectorList = [];
                                        $sectorSlug = [];
                                        $sectordata = DB::table('sectors')->select('id','name','slug')->whereIn('id', explode(',',$article->Sector))->get()->toArray();
                                        foreach ($sectordata as $sector)
                                        {
                                            $sectorList[] = $sector->name;
                                            $sectorSlug[] = $sector->slug;
                                        }
                                        $sectorName = '';
                                        $sectorSlugName = '';
                                        $sectorName = implode(', ', $sectorList);
                                        $sectorSlugName = implode(', ', $sectorSlug);
                                        $sectors = explode(',', $sectorSlugName); ?>
                                        <h6 class="text-dark">{{ Str::limit($sectorName, '10') }}</h6>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center section" id="stats">
            <div class="row">
              <div class="ml-auto mr-auto col-md-8">
                <h2 class="title">Stats</h2>
                <h5 class="description">Virtu Expo is amongst the first to bring a 3D virtual exhibition environment for its exhibitors and visitors.</h5>
              </div>
            </div>
            <div class="features">
              <div class="row">
                <div class="col-md-3">
                  <div class="info">
                    <div class="icon icon-info">
                      <h1>12</h1>
                    </div>
                    <h4 class="info-title">Exhibitions</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="info">
                    <div class="icon icon-success">
                        <h1>186</h1>
                    </div>
                    <h4 class="info-title">Exhibitors</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="info">
                    <div class="icon icon-danger">
                        <h1>1523</h1>
                    </div>
                    <h4 class="info-title">Visitors</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="info">
                    <div class="icon icon-warning">
                        <h1>150</h1>
                    </div>
                    <h4 class="info-title">Industries</h4>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="team-5 section-image" id="trending" style="background-image: url('/material/img/homepage2.jpg')">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto text-center col-md-8">
                    <h2 class="title">Trending Exhibitions</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($trending_articles as $article)
                <div class="col-lg-4 col-md-6">
                    <div class="card card-blog">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header card-header-image">
                                    <a href="{{ route('blog.exhibition.index', $article->slug) }}">
                                        @if ($article->Image == '')
                                        <img class="img img-raised" src="{{ asset('material') }}/img/examples/card-blog4.jpg">
                                        @else
                                            <img class="img img-raised" src="{{ $article->path() }}">
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h6 class="card-category text-success">
                                        <?php
                                        $tagdata = DB::table('tags')->select('id','name','slug','color')->whereIn('id', explode(',',$article->Tag))->get()->toArray();
                                        ?>
                                        @foreach ($tagdata as $tag)
                                            <a href="{{ route('blog.tag', $tag->slug ) }}"><span style="color: {{ $tag->color }};">{{ $tag->name }}</span></a>
                                        @endforeach
                                    </h6>
                                    <!---<h6 class="card-category text-success">
                                        <?php
                                        $sectorList = [];
                                        $sectordata = DB::table('sectors')->select('id','name','slug')->whereIn('id', explode(',',$article->Sector))->get()->toArray();
                                        foreach ($sectordata as $sector)
                                        {
                                            $sectorList[] = $sector->name;
                                        }
                                        $sectorName = '';
                                        $sectorName = implode(', ', $sectorList);
                                        $sectors = explode(',', $article->Sector); ?>
                                        @foreach ($sectors as $sector)
                                        <a href="javascript:void(0)" class="text-dark">{{ $sectorName }}</a>
                                        @endforeach
                                    </h6>--->
                                    <a href="{{ route('blog.exhibition.index', $article->slug) }}">
                                        <h4 class="card-title">{{ $article->Name }}</h4>
                                    </a>
                                    <p class="card-description">
                                        {{ Str::limit($article->Description, '120') }}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="card-title text-left">Start Date</h5>
                                            <h6 class="text-left text-dark">{{ date('d-m-Y', strtotime($article->StartDate)) }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="card-title text-right">End Date</h5>
                                            <h6 class="text-right text-dark">{{ date('d-m-Y', strtotime($article->EndDate)) }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="author">
                                        <a href="{{ route('blog.company.index', $article->companyslug) }}">
                                            @if ($article->Logo == '')
                                            <img  alt="Profile Image" class="avatar img-raised" src="{{ asset('material') }}/img/company-profile-placeholder.png">
                                            @else
                                            <img src="{{ asset('storage').'/'.$article->Logo }}" alt="..." class="avatar img-raised">
                                            @endif
                                            <span>{{ $article->CommonName }}</span>
                                        </a>
                                    </div>
                                    <div class="ml-auto stats">
                                        <?php
                                        $sectorList = [];
                                        $sectorSlug = [];
                                        $sectordata = DB::table('sectors')->select('id','name','slug')->whereIn('id', explode(',',$article->Sector))->get()->toArray();
                                        foreach ($sectordata as $sector)
                                        {
                                            $sectorList[] = $sector->name;
                                            $sectorSlug[] = $sector->slug;
                                        }
                                        $sectorName = '';
                                        $sectorSlugName = '';
                                        $sectorName = implode(', ', $sectorList);
                                        $sectorSlugName = implode(', ', $sectorSlug);
                                        $sectors = explode(',', $article->Sector); ?>
                                        <h6 class="text-dark">{{ Str::limit($sectorName, '10') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container" id="latest">
        <div class="section">
            <h2 class="text-center title">{{ __('Latest Exhibitions') }}</h2>
            <div class="row justify-content-center">
                @foreach ($latest_articles as $article)
                    @include('blog._partials.latest_articles')
                @endforeach
                <a href="{{ route('blog.article.index') }}" class="btn btn-rose btn-raised btn-round">
                    {{ __('View All') }}
                </a>
            </div>
        </div>
    </div>

@endsection
