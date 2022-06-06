<div class="card card-plain card-blog">
    <div class="card-header card-header-image">
        <a href="{{ route('blog.exhibition.index', $article->slug) }}">
            @if ($article->Image == '')
                <img class="img img-raised" src="{{ asset('material') }}/img/bg10.jpg">
            @else
                <img class="img img-raised" src="{{ $article->path() }}">
            @endif
        </a>
        <div class="colored-shadow colored-shadow-big"
            style="background-image: url(&quot;../assets/img/bg5.jpg&quot;); opacity: 1;"></div>
    </div>
    <div class="card-body">
        <h6 class="card-category text-success">
            <?php
            $tagdata = DB::table('tags')->select('id','name','slug','color')->whereIn('id', explode(',',$article->Tag))->get()->toArray();
            ?>
            @foreach ($tagdata as $tag)
                <a href="{{ route('blog.tag', $tag->slug ) }}"><span style="color: {{ $tag->color }};">{{ $tag->name }}</span></a>
            @endforeach
        </h6>
        <!---<h6 class="card-category">
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
        <h3 class="card-title">
            <a href="{{ route('blog.exhibition.index', $article->slug) }}">{{ $article->Name }}</a>
        </h3>
        <h5 class="card-description">
            {{ Str::limit($article->Description, '120') }}
        </h5>
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
            <h6 class="text-dark">{{ $sectorName }}</h6>
        </div>
    </div>
</div>
