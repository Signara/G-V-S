<footer class="footer">
    <div class="container">
        <!---<nav class="float-left">
            <ul>
                <li>
                    <a href="https://www.creative-tim.com">
                        {{ __('Creative Tim') }}
                    </a>
                </li>
                <li>
                    <a href="https://creative-tim.com/presentation">
                        {{ __('About Us') }}
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        {{ __('Blog') }}
                    </a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/license">
                        {{ __('Licenses') }}
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.updivision.com">
                        {{ __('UPDIVISION') }}
                    </a>
                </li>
            </ul>
        </nav>--->
        <div class="float-right copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, {{ __('Made with') }} <i class="material-icons">favorite</i> by
            <a href="{{ route('home') }}" target="_blank">{{ __('Virtual Expo') }}</a>.
        </div>
    </div>
</footer>
