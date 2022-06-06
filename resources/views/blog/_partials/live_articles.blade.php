<div class="card-header card-header-image">
    <a href="{{ route('blog.exhibition.index', $article->slug) }}">
        @if ($article->Image == '')
        <img class="img img-raised" src="{{ asset('material') }}/img/examples/card-blog4.jpg">
        @else
            <img class="img img-raised" src="{{ $article->path() }}">
        @endif
    </a>
  <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/card-blog2.jpg&quot;); opacity: 1;"></div></div>
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
            <h5 class="card-title text-right">Start Date</h5>
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
