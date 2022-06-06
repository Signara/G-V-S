@extends('dashboard.layouts.app', [
    'activePage' => 'models-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Models Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('model.update', $models) }}"
                        autocomplete="off" class="form-horizontal company-form">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">store_mall_directory</i>
                                </div>
                                <h4 class="card-title">{{ __('Edit models') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('model.index') }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                                    <div class="col-sm-7">
                                        <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                @if ($models->Image)
                                                <img src="{{ $models->path() }}" alt="...">
                                                @else
                                                <img src="{{ asset('material') }}/img/image_placeholder.jpg" alt="...">
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-file">
                                                    <span class="fileinput-new">{{ __('Select Image') }}</span>
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
                                        <div class="form-group{{ $errors->has('Name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}"
                                                name="Name" id="input-Name" type="text" placeholder="{{ __('Name') }}"
                                                value="{{ old('Name', $models->Name) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="5" class="form-control{{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" id="input-Description" type="text" placeholder="{{ __('Description') }}">{{ old('Description', $models->Description) }}</textarea>
                                            @include('dashboard.alerts.feedback', ['field' => 'Description'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('xValue') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('xValue') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('xValue') ? ' is-invalid' : '' }}"
                                                name="xValue" id="input-xValue" type="text" placeholder="{{ __('xValue') }}"
                                                value="{{ old('xValue', $models->xValue) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'xValue'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('yValue') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('yValue') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('yValue') ? ' is-invalid' : '' }}"
                                                name="yValue" id="input-yValue" type="text" placeholder="{{ __('yValue') }}"
                                                value="{{ old('yValue', $models->yValue) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'yValue'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('zValue') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('zValue') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('zValue') ? ' is-invalid' : '' }}"
                                                name="zValue" id="input-zValue" type="text" placeholder="{{ __('zValue') }}"
                                                value="{{ old('zValue', $models->zValue) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'zValue'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('prefabName') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('prefabName') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('prefabName') ? ' is-invalid' : '' }}"
                                                name="prefabName" id="input-prefabName" type="text" placeholder="{{ __('prefabName') }}"
                                                value="{{ old('prefabName', $models->prefabName) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'prefabName'])
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
                                                    {{ $company->id == old('CompanyID', $models->CompanyID) ? 'selected' : '' }}>
                                                    {{ $company->CommonName }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'CompanyID'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Type') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Type" data-style="select-with-transition" title="" data-size="100" required="true" aria-required="true">
                                                <option value="">-</option>
                                                <option value="Stall"<?=$models->Type == 'Stall' ? ' selected="selected"' : '';?>>Stall</option>
                                                <option value="Banner"<?=$models->Type == 'Banner' ? ' selected="selected"' : '';?>>Banner</option>
                                                <option value="Others"<?=$models->Type == 'Others' ? ' selected="selected"' : '';?>>Others</option>
                                                <option value="WaitingArea"<?=$models->Type == 'WaitingArea' ? ' selected="selected"' : '';?>>WaitingArea</option>
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Type'])
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
@endpush
