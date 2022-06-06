@extends('dashboard.layouts.app', [
  'class' => 'off-canvas-sidebar',
  'classPage' => 'login-page',
  'activePage' => '',
  'title' => __('Material Dashboard'),
  'pageBackground' => asset("material").'/img/login.jpg'
])

<?php $id = @explode('?',$_SERVER['REQUEST_URI']);

$id = $id[1]; ?>

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
      <form class="form" method="POST" action="{{ route('loginotp',$id) }}">
        @csrf

        <div class="mb-3 card card-login card-hidden">
          <div class="text-center card-header card-header-rose">
            <h4 class="card-title"><strong>{{ __('Login with OTP') }}</strong></h4>
          </div>
          <div class="card-body">
            <div class="bmd-form-group{{ $errors->has('OTP') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">vpn_key</i>
                  </span>
                </div>
                <input type="text" name="OTP" class="form-control" placeholder="{{ __('OTP...') }}" value="{{ old('OTP') }}" required>
              </div>
              @if ($errors->has('OTP'))
                <div id="OTP-error" class="pl-3 error text-danger" for="OTP" style="display: block;">
                  <strong>{{ $errors->first('OTP') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-rose btn-link btn-lg">{{ __('Login') }}</button>
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
