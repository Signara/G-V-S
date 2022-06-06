@extends('dashboard.layouts.app', ['activePage' => 'user-management', 'menuParent' => 'laravel', 'titlePage' => __('User Management')])

<link rel="stylesheet" href="{{ asset('material') }}/css/select2.min.css">

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" enctype="multipart/form-data" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">person</i>
                </div>
                <h4 class="card-title">{{ __('Add User') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="text-right col-md-12">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Profile photo') }}</label>
                  <div class="col-sm-7">
                    <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-circle">
                        <img src="{{ asset('material') }}/img/placeholder.jpg" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                      <div>
                        <span class="btn btn-rose btn-file">
                          <span class="fileinput-new">{{ __('Select image') }}</span>
                          <span class="fileinput-exists">{{ __('Change') }}</span>
                          <input type="file" name="photo" id = "input-picture" />
                        </span>
                          <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
                      </div>
                      @include('dashboard.alerts.feedback', ['field' => 'photo'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @include('dashboard.alerts.feedback', ['field' => 'name'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}" required="true" aria-required="true"/>
                      @include('dashboard.alerts.feedback', ['field' => 'slug'])
                    </div>
                  </div>
                </div>
                <!---<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('About') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('about') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" name="about" id="input-about" type="text" placeholder="{{ __('About') }}" value="{{ old('about') }}"/>
                      @include('dashboard.alerts.feedback', ['field' => 'about'])
                    </div>
                  </div>
                </div>--->
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                      @include('dashboard.alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                  <div class="col-sm-3">
                    <select class="form-control col-sm-12 country_code" id="country_code" name="country_code"
                    data-style="select-with-transition" title="" data-size="7" required>
                    <option value="">-</option>
                    @foreach ($countrycodes as $countrycode)
                    <option value="{{ $countrycode->id }}"
                        {{ $countrycode->id == old('country_code') ? 'selected' : '' }}>
                        {{ $countrycode->phonecode }} {{ $countrycode->iso3 }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('Phone') ? ' has-danger' : '' }}">
                    <span></span><input class="form-control{{ $errors->has('Phone') ? ' is-invalid' : '' }}" name="Phone" id="input-Phone" type="text" placeholder="{{ __('Phone') }}" value="{{ old('Phone') }}" required /></span>
                        @include('dashboard.alerts.feedback', ['field' => 'Phone'])
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Designation') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('Designation') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('Designation') ? ' is-invalid' : '' }}" name="Designation" id="input-Designation" type="text" placeholder="{{ __('Designation') }}" value="{{ old('Designation') }}" required />
                          @include('dashboard.alerts.feedback', ['field' => 'Designation'])
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('CompanyID') ? ' has-danger' : '' }}">
                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="CompanyID"
                                data-style="select-with-transition" title="" data-size="7">
                                <option value="">-</option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}"
                                    {{ $company->id == old('CompanyID') ? 'selected' : '' }}>
                                    {{ $company->CommonName }}</option>
                                @endforeach
                            </select>
                            @include('dashboard.alerts.feedback', ['field' => 'CompanyID'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                        <select class="pl-0 pr-0 selectpicker col-sm-12" name="role_id"
                            data-style="select-with-transition" title="" data-size="7">
                            <option value="">-</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $role->id == old('role_id') ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                            @endforeach
                        </select>
                        @include('dashboard.alerts.feedback', ['field' => 'role_id'])
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" required/>
                      @include('dashboard.alerts.feedback', ['field' => 'password'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ml-auto mr-auto card-footer">
                <button type="submit" class="btn btn-rose">{{ __('Add User') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script src="{{ asset('material') }}/js/plugins/select2.min.js"></script>
    <script>

        $(document).ready(function () {
            $('.country_code').select2({
                placeholder: "--- Choose Country Code ---",
                width: '100%'
            });

            $(document).on('blur', 'input#input-name', function () {
                if (!$('input#input-slug').val()) {
                    setSlug($('input#input-name'), $('input#input-slug'));
                }
            })
        });
    </script>
@endpush

