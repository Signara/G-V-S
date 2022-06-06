@extends('dashboard.layouts.app', [
  'class' => 'off-canvas-sidebar',
  'classPage' => 'login-page',
  'activePage' => '',
  'title' => __('Material Dashboard'),
  'pageBackground' => asset("material").'/img/login.jpg'
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
  <div class="row align-articles-center">
    <div class="ml-auto mr-auto col-lg-4 col-md-6 col-sm-8">
      <form class="form" method="POST" action="{{ route('sendotp') }}">
        @csrf

        <div class="mb-3 card card-login card-hidden">
          <div class="text-center card-header card-header-rose">
            <h4 class="card-title"><strong>{{ __('Login with OTP') }}</strong></h4>
          </div>
          <div class="card-body">
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">account_circle</i>
                  </span>
                </div>
                <input type="text" name="email" class="form-control" placeholder="{{ __('Email or Phone Number') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="pl-3 error text-danger" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-rose btn-link btn-lg">{{ __('Get OTP') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    md.checkFullPageBackgroundImage();
    setTimeout(function() {
      // after 1000 ms we add the class animated to the login/register card
      $('.card').removeClass('card-hidden');
    }, 700);
  });
</script>
@endpush