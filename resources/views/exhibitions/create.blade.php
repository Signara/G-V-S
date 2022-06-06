@extends('dashboard.layouts.app', [
    'activePage' => 'exhibitions-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Exhibitions Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('exhibition.store') }}"
                        autocomplete="off" class="form-horizontal exhibition-form">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">account_balance</i>
                                </div>
                                <h4 class="card-title">{{ __('Add exhibitions') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('exhibition.index') }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Featured Image') }}</label>
                                    <div class="col-sm-7">
                                      <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                          <img src="{{ asset('material') }}/img/placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                                          <span class="btn btn-rose btn-file">
                                            <span class="fileinput-new">{{ __('Select Featured Image') }}</span>
                                            <span class="fileinput-exists">{{ __('Change') }}</span>
                                            <input type="file" name="photo" id = "input-picture" required="true" aria-required="true" />
                                          </span>
                                            <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
                                        </div>
                                        @include('dashboard.alerts.feedback', ['field' => 'photo'])
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Banner') }}</label>
                                    <div class="col-sm-7">
                                      <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                          <img src="{{ asset('material') }}/img/placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                                          <span class="btn btn-rose btn-file">
                                            <span class="fileinput-new">{{ __('Select Banner') }}</span>
                                            <span class="fileinput-exists">{{ __('Change') }}</span>
                                            <input type="file" name="picture" id = "input-picture" required="true" aria-required="true" />
                                          </span>
                                            <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
                                        </div>
                                        @include('dashboard.alerts.feedback', ['field' => 'picture'])
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Info Image') }}</label>
                                    <div class="col-sm-7">
                                      <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                          <img src="{{ asset('material') }}/img/placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                                          <span class="btn btn-rose btn-file">
                                            <span class="fileinput-new">{{ __('Select Info Image') }}</span>
                                            <span class="fileinput-exists">{{ __('Change') }}</span>
                                            <input type="file" name="inf_img" id = "input-inf_img" required="true" aria-required="true" />
                                          </span>
                                            <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
                                        </div>
                                        @include('dashboard.alerts.feedback', ['field' => 'inf_img'])
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('PDF') }}</label>
                                    <div class="col-sm-7">
                                      <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                                          <span class="btn btn-rose btn-file">
                                            <span class="fileinput-new">{{ __('Select PDF') }}</span>
                                            <span class="fileinput-exists">{{ __('Change') }}</span>
                                            <input type="file" name="pdf" id = "input-pdf" required="true" aria-required="true" />
                                          </span>
                                            <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
                                        </div>
                                        @include('dashboard.alerts.feedback', ['field' => 'pdf'])
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}"
                                                name="Name" id="input-Name" type="text" placeholder="{{ __('Name') }}"
                                                value="{{ old('Name') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Display Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('display_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('display_name') ? ' is-invalid' : '' }}"
                                                name="display_name" id="input-display_name" type="text" placeholder="{{ __('Display Name') }}"
                                                value="{{ old('display_name') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'display_name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
                                                name="slug" id="input-slug" type="text" placeholder="{{ __('Slug') }}"
                                                value="{{ old('slug') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'slug'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="5" class="form-control{{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" id="input-Description" type="text" placeholder="{{ __('Description') }}" required="true" aria-required="true">{{ old('Description') }}</textarea>
                                            @include('dashboard.alerts.feedback', ['field' => 'Description'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Keywords') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('keywords') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('keywords') ? ' is-invalid' : '' }}"
                                                name="keywords" id="input-keywords" type="text" placeholder="{{ __('Keywords') }}"
                                                value="{{ old('keywords') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'keywords'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Industry') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Sector') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Sector[]"
                                                data-style="select-with-transition" multiple title="-" data-size="7" required="true" aria-required="true">
                                                @foreach ($sectors as $sector)
                                                <option value="{{ $sector->id }}"
                                                    {{ in_array($sector->id, old('Sector') ?? []) ? 'selected' : '' }}>
                                                    {{ $sector->name }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Sector'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tag') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Tag') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Tag[]"
                                                data-style="select-with-transition" multiple title="-" data-size="7" required="true" aria-required="true">
                                                @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    {{ in_array($tag->id, old('Tag') ?? []) ? 'selected' : '' }}>
                                                    {{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Tag'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
                                    <div class="col-sm-4">
                                        <div class="form-group{{ $errors->has('StartDate') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('StartDate') ? ' is-invalid' : '' }} datepicker"
                                                name="StartDate" id="input-StartDate" type="text" placeholder="{{ __('Start Date') }}"
                                                value="{{ old('StartDate') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'StartDate'])
                                        </div>
                                    </div>

                                    <!---<label class="col-sm-2 col-form-label">{{ __('Start Time') }}</label>
                                    <div class="col-sm-4">
                                        <div class="form-group{{ $errors->has('StartTime') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('StartTime') ? ' is-invalid' : '' }} timepicker"
                                                name="StartTime" id="input-StartTime" type="text" placeholder="{{ __('Start Time') }}"
                                                value="{{ old('StartTime') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'StartTime'])
                                        </div>
                                    </div>--->
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('End Date') }}</label>
                                    <div class="col-sm-4">
                                        <div class="form-group{{ $errors->has('EndDate') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('EndDate') ? ' is-invalid' : '' }} datepicker"
                                                name="EndDate" id="input-EndDate" type="text" placeholder="{{ __('End Date') }}"
                                                value="{{ old('EndDate') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'EndDate'])
                                        </div>
                                    </div>

                                    <!---<label class="col-sm-2 col-form-label">{{ __('End Time') }}</label>
                                    <div class="col-sm-4">
                                        <div class="form-group{{ $errors->has('EndTime') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('EndTime') ? ' is-invalid' : '' }} timepicker"
                                                name="EndTime" id="input-EndTime" type="text" placeholder="{{ __('End Time') }}"
                                                value="{{ old('EndTime') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'EndTime'])
                                        </div>
                                    </div>--->
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Organiser') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Organiser') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Organiser"
                                                data-style="select-with-transition" title="" data-size="7" required="true" aria-required="true">
                                                <option value="">-</option>
                                                @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ $company->id == old('Organiser') ? 'selected' : '' }}>
                                                    {{ $company->CommonName }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Organiser'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Admins') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Admins') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Admins[]"
                                                data-style="select-with-transition" multiple title="-" data-size="7">
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ in_array($user->id, old('Admins') ?? []) ? 'selected' : '' }}>
                                                    {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Admins'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Packages') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Packages') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Packages[]"
                                                data-style="select-with-transition" multiple title="-" data-size="7" required="true" aria-required="true">
                                                @foreach ($packages as $package)
                                                <option value="{{ $package->id }}"
                                                    {{ in_array($package->id, old('Packages') ?? []) ? 'selected' : '' }}>
                                                    {{ $package->Name }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Packages'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Facebook') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('facebook') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                                                name="facebook" id="input-facebook" type="text" placeholder="{{ __('Facebook') }}"
                                                value="{{ old('facebook') }}" />
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
                                                value="{{ old('twitter') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'twitter'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Instagram') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('instagram') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                                                name="instagram" id="input-instagram" type="text" placeholder="{{ __('Instagram') }}"
                                                value="{{ old('instagram') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'instagram'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Youtube') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('youtube') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}"
                                                name="youtube" id="input-youtube" type="text" placeholder="{{ __('Youtube') }}"
                                                value="{{ old('youtube') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'youtube'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Linkedin') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('linkedin') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}"
                                                name="linkedin" id="input-linkedin" type="text" placeholder="{{ __('Linkedin') }}"
                                                value="{{ old('linkedin') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'linkedin'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Android Link') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('android_link') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('android_link') ? ' is-invalid' : '' }}"
                                                name="android_link" id="input-android_link" type="text" placeholder="{{ __('Android Link') }}"
                                                value="{{ old('android_link') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'android_link'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('IOS Link') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ios_link') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ios_link') ? ' is-invalid' : '' }}"
                                                name="ios_link" id="input-ios_link" type="text" placeholder="{{ __('IOS Link') }}"
                                                value="{{ old('ios_link') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'ios_link'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto mr-auto card-footer">
                                <button type="submit" class="btn btn-rose">{{ __('Add Exhibition') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
    {{-- <script src="{{ asset('material') }}/js/article.js"></script> --}}

    <script>
        $(document).ready(function () {
            $(document).on('blur', 'input#input-Name', function () {
                if (!$('input#input-slug').val()) {
                    setSlug($('input#input-Name'), $('input#input-slug'));
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
          // initialise Datetimepicker and Sliders
          md.initFormExtendedDatetimepickers();
          if ($('.slider').length != 0) {
            md.initSliders();
          }
        });
    </script>
@endpush
