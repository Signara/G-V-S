@extends('dashboard.layouts.app', [
    'activePage' => 'exhibitions-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Hall Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('hall.update', [$exhibition , $hall]) }}"
                        autocomplete="off" class="form-horizontal exhibition-form">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">store_mall_directory</i>
                                </div>
                                <h4 class="card-title">{{ __('Edit hall') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('hall.index', $exhibition) }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('SrNo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('SrNo') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('SrNo') ? ' is-invalid' : '' }}"
                                                name="SrNo" id="input-SrNo" type="text" placeholder="{{ __('SrNo') }}"
                                                value="{{ old('SrNo', $hall->SrNo) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'SrNo'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}"
                                                name="Name" id="input-Name" type="text" placeholder="{{ __('Name') }}"
                                                value="{{ old('Name', $hall->Name) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="5" class="form-control{{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" id="input-Description" type="text" placeholder="{{ __('Description') }}">{{ old('Description', $hall->Description) }}</textarea>
                                            @include('dashboard.alerts.feedback', ['field' => 'Description'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Floor Color') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('FloorColor') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('FloorColor') ? ' is-invalid' : '' }}"
                                                name="FloorColor" id="input-FloorColor" type="color" placeholder="{{ __('Floor Color') }}"
                                                value="{{ old('FloorColor', $hall->FloorColor) }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'FloorColor'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('StartDate') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('StartDate') ? ' is-invalid' : '' }} datepicker"
                                                name="StartDate" id="input-StartDate" type="text" placeholder="{{ __('Start Date') }}"
                                                value="{{ old('StartDate', $hall->StartDate) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'StartDate'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Start Time') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('StartTime') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('StartTime') ? ' is-invalid' : '' }} timepicker"
                                                name="StartTime" id="input-StartTime" type="text" placeholder="{{ __('Start Time') }}"
                                                value="{{ old('StartTime', $hall->StartTime) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'StartTime'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto mr-auto card-footer">
                                <button type="submit" class="btn btn-rose">{{ __('Save') }}</button>
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
            $(document).on('blur', 'input#input-title', function () {
                if (!$('input#input-slug').val()) {
                    setSlug($('input#input-title'), $('input#input-slug'));
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
