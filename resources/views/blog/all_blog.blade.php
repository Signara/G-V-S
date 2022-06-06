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
                    <div class="ml-auto mr-auto col-md-10">
                        <h2 class="title">{{ __('All Blogs') }}</h2>
                        @foreach($articles as $article)
                            @include('blog._partials.blog_full')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection