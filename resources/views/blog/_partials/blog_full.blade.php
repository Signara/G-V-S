<div class="card card-plain card-blog">
    <div class="card-header card-header-image">
        <a href="javascript:void(0)">
            @if ($article->picture == '')
                <img class="img img-raised" src="{{ asset('material') }}/img/bg10.jpg">
            @else
                <img class="img img-raised" src="{{ $article->path() }}">
            @endif
        </a>
        <div class="colored-shadow colored-shadow-big"
            style="background-image: url(&quot;../assets/img/bg5.jpg&quot;); opacity: 1;"></div>
    </div>
    <div class="card-body">
        <h6 class="card-category">
            <?php
            $categoryList = [];
            $categorydata = DB::table('categories')->select('id','name','slug')->whereIn('id', explode(',',$article->category_id))->get()->toArray();
            foreach ($categorydata as $category)
            {
                $categoryList[] = $category->name;
            }
            $categoryName = '';
            $categoryName = implode(', ', $categoryList);
            $categories = explode(',', $categoryName); ?>
            @foreach ($categories as $category)
            <a href="javascript:void(0)" class="text-dark">{{ $category }}</a>
            @endforeach
        </h6>
        <h3 class="card-title">
            <a href="{{ route('blog.article.show', $article->slug) }}">{{ $article->title }}</a>
        </h3>
        <h5 class="card-description">
            {{ Str::limit($article->excerpt, '700') }}
        </h5>
        <a href="{{ route('blog.article.show', $article->slug) }}" class="btn btn-primary btn-round">{{ __('Read More') }}</a>
    </div>
</div>
