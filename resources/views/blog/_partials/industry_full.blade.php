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
