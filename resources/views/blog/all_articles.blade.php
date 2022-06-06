@extends('blog.app', [
    'class' => '',
    'headerImage' => '/material/img/homepage1.jpg'
])
@section('header_content')
    <h1 class="title">
        <!---{!! __('A fully functional Laravel blog <br class="d-none d-xl-block"> with beautiful design') !!}--->
        <div class=" new-feature">
            <!---<h3 class="new-sub">Get three products at the price of one.</h3>
            <h3 class="mt-0 new-sub"><i class="material-icons hide-icon-head">dashboard</i><span class="ml-0">Ready to use blog with Laravel admin</span></h3>
            <h3 class="mt-0 new-sub"><i class="material-icons hide-icon-head">dashboard</i><span class="ml-0">Material Dashboard PRO</span></h3>
            <h3 class="mt-0 new-sub"><i class="material-icons hide-icon-head">dashboard</i>Material Kit PRO</h3>-->
            </div>
    </h1>
@endsection

@section('content')
    <div class="container">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-md-12">
                        <?php
                        $slug = @explode('/',$_SERVER['REQUEST_URI']);
                        $slug = $slug[1];
                        ?>
                        @if($slug === 'indstryRelexhibition')
                        <?php
                        $slugs = @explode('/',$_SERVER['REQUEST_URI']);
                        $exhbtnslug = $slugs[2];
                        $industry = DB::table('sectors')->where('slug','=',$exhbtnslug)->select('name')->first();
                        ?>
                        <h2 class="title">{{ $industry->name }}</h2>
                        @else
                        <h2 class="title">{{ __('All Exhibitions') }}</h2>
                        @endif
                        <div class="row">
                        @foreach($articles as $article)
                            <div class="col-lg-6 col-md-12">
                            @include('blog._partials.article_full')
                            </div>
                        @endforeach
                        </div>
                        @include('blog._partials.pagination')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
