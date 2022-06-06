@extends('dashboard.layouts.app', [
    'class' => 'off-canvas-sidebar',
    'classPage' => 'login-page',
    'activePage' => 'login',
    'title' => __('Material Dashboard'),
    'pageBackground' => '/material/img/login.jpg'
])

@section('content')
    <div class="container">
        <div class="row">
            <div class="mb-1 ml-auto mr-auto text-center col-md-9">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <div class="logo-big">
                        <img src="{{ asset('material') }}/img/VirtuExpo_Logo.png" class="img-fluid" style="height:100px;">
                    </div>
                    <div class="ripple-container"></div>
                </a>
            </div>
        </div><br />
        <div class="row">
            <div class="ml-auto mr-auto col-lg-4 col-md-6 col-sm-8">
                <form class="form" method="POST" action="{{ route('authenticate') }}">
                    @csrf

                    <div class="card card-login card-hidden">
                        <div class="text-center card-header card-header-rose">
                            <h4 class="card-title">{{ __('Login') }}</h4>
                            <!---<div class="social-line">
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>--->
                        </div>
                        <div class="card-body ">
                            <!---<span class="form-group  bmd-form-group email-error {{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">email</i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="exampleEmails" name="email"
                                        placeholder="{{ __('Email...') }}"
                                        value="">
                                    @include('dashboard.alerts.feedback', ['field' => 'email'])
                                </div>
                            </span><br />
                            <h5 class='text-center'>OR</h5>-->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">account_circle</i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="examplePhones" name="Phone"
                                        placeholder="{{ __('Email or Phone Number') }}"
                                        value="" required>
                                </div>
                            </span>
                            <span class="form-group bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="examplePassword" name="password"
                                        placeholder="{{ __('Password...') }}" value="" required>
                                    @include('dashboard.alerts.feedback', ['field' => 'password'])
                                </div>
                            </span>
                            <div class="mt-3 ml-3 mr-auto form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-rose btn-link btn-lg">{{ __('Lets Go') }}</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-light">
                            <small>{{ __('Forgot password?') }}</small>
                        </a>
                        @endif
                    </div>
                    <div class="text-right col-6">
                        <a href="{{ route('generateotp') }}" class="text-light">
                            <small>{{ __('Login with OTP') }}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            md.checkFullPageBackgroundImage();
            setTimeout(function () {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700);
        });
    </script>
@endpush
