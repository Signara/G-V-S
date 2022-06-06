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
