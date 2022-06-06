@extends('dashboard.layouts.app', [
    'activePage' => 'user-management',
    'menuParent' => 'laravel',
    'titlePage' => __('User Management')
])

<link rel="stylesheet" href="{{ asset('material') }}/css/select2.min.css">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">perm_identity</i>
                            </div>
                            <h4 class="card-title">{{ __('Edit User') }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Profile photo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-circle">
                                                @if ($user->picture)
                                                <img src="{{ $user->profilePicture() }}" alt="...">
                                                @else
                                                <img src="{{ asset('material') }}/img/placeholder.jpg" alt="...">
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                            <div>
                                                <span class="btn btn-rose btn-file">
                                                    <span class="fileinput-new">{{ __('Select image') }}</span>
                                                    <span class="fileinput-exists">{{ __('Change') }}</span>
                                                    <input type="file" name="photo" id="input-picture" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger fileinput-exists"
                                                    data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                    {{ __('Remove') }}</a>
                                            </div>
                                            @include('dashboard.alerts.feedback', ['field' => 'photo'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text" placeholder="{{ __('Name') }}"
                                                value="{{ old('name', $user->name) }}" required="true"
                                                aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Slug') }}" value="{{ old('slug', $user->slug) }}" required="true" aria-required="true"/>
                                        @include('dashboard.alerts.feedback', ['field' => 'slug'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" id="input-email" type="email" placeholder="{{ __('Email') }}"
                                                value="{{ old('email', $user->email) }}" required />
                                            @include('dashboard.alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                </div>
                                <!---<div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('About') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('about') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}"
                                                name="about" id="input-about" type="text" placeholder="{{ __('About') }}"
                                                value="{{ old('about', auth()->user()->about) }}" required="true"
                                                aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'about'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Facebook') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('facebook') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                                                name="facebook" id="input-facebook" type="text"
                                                placeholder="{{ __('Facebook') }}"
                                                value="{{ old('facebook', auth()->user()->facebook) }}"/>
                                            @include('dashboard.alerts.feedback', ['field' => 'facebook'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Twitter') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}"
                                                name="twitter" id="input-twitter" type="text" placeholder="{{ __('Twitter') }}"
                                                value="{{ old('twitter', auth()->user()->twitter) }}"/>
                                            @include('dashboard.alerts.feedback', ['field' => 'twitter'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Youtube') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('youtube') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}"
                                                name="youtube" id="input-youtube" type="text" placeholder="{{ __('Youtube') }}"
                                                value="{{ old('youtube', auth()->user()->youtube) }}"/>
                                            @include('dashboard.alerts.feedback', ['field' => 'youtube'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Linkedin') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('linkedin') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}"
                                                name="linkedin" id="input-linkedin" type="text"
                                                placeholder="{{ __('Linkedin') }}"
                                                value="{{ old('linkedin', auth()->user()->linkedin) }}"/>
                                            @include('dashboard.alerts.feedback', ['field' => 'linkedin'])
                                        </div>
                                    </div>
                                </div>--->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-3">
                                    <select class="form-control col-sm-12 country_code" id="country_code" name="country_code"
                                        data-style="select-with-transition" title="" data-size="100">
                                        <option value="">-</option>
                                        @foreach ($countrycodes as $countrycode)
                                        <option value="{{ $countrycode->id }}"
                                            {{ $countrycode->id == old('country_code', $user->country_code) ? 'selected' : '' }}>
                                            {{ $countrycode->phonecode }}  {{ $countrycode->iso3 }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group{{ $errors->has('Phone') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('Phone') ? ' is-invalid' : '' }}" name="Phone" id="input-Phone" type="text" placeholder="{{ __('Phone') }}" value="{{ old('Phone', $user->Phone) }}" required />
                                        @include('dashboard.alerts.feedback', ['field' => 'Phone'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Designation') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Designation') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('Designation') ? ' is-invalid' : '' }}" name="Designation" id="input-Designation" type="text" placeholder="{{ __('Designation') }}" value="{{ old('Designation', $user->Designation) }}" required />
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
                                                    {{ $company->id == old('CompanyID', $user->CompanyID) ? 'selected' : '' }}>
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
                                              {{ $role->id == old('role_id', $user->role_id) ? 'selected' : '' }}>
                                              {{ $role->name }}</option>
                                          @endforeach
                                      </select>
                                      @include('dashboard.alerts.feedback', ['field' => 'role_id'])
                                      </div>
                                    </div>
                                  </div>
                                <button type="submit" class="btn btn-rose pull-right">{{ _('Update Profile') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">lock</i>
                            </div>
                            <h4 class="card-title">{{ __('Change password') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                        for="input-current-password">{{ __('Current Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                                input type="password" name="old_password" id="input-current-password"
                                                placeholder="{{ __('Current Password') }}" value="" required />
                                            @include('dashboard.alerts.feedback', ['field' => 'old_password'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                        for="input-password">{{ __('New Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" id="input-password" type="password"
                                                placeholder="{{ __('New Password') }}" value="" required />
                                            @include('dashboard.alerts.feedback', ['field' => 'password'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                        for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password_confirmation"
                                                id="input-password-confirmation" type="password"
                                                placeholder="{{ __('Confirm New Password') }}" value="" required />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-rose pull-right">{{ _('Change password') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!---<div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="{{ $user->profilePicture() }}" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                            <h4 class="card-title">Alec Thompson</h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                        </div>
                    </div>
                </div>--->
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

            $(document).on('blur', 'input#input-title', function () {
                if (!$('input#input-slug').val()) {
                    setSlug($('input#input-title'), $('input#input-slug'));
                }
            })
        });
    </script>
@endpush
