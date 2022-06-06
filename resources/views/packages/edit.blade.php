@extends('dashboard.layouts.app', [
    'activePage' => 'packages-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Packages Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('package.update', $package) }}"
                        autocomplete="off" class="form-horizontal package-form">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">local_offer</i>
                                </div>
                                <h4 class="card-title">{{ __('Edit packages') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('package.index') }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}"
                                                name="Name" id="input-Name" type="text" placeholder="{{ __('Name') }}"
                                                value="{{ old('Name', $package->Name) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="5" class="form-control{{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" id="input-Description" type="text" placeholder="{{ __('Description') }}">{{ old('Description', $package->Description) }}</textarea>
                                            @include('dashboard.alerts.feedback', ['field' => 'Description'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Cost') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Cost') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Cost') ? ' is-invalid' : '' }}"
                                                name="Cost" id="input-Cost" type="text" placeholder="{{ __('Cost') }}"
                                                value="{{ old('Cost', $package->Cost) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Cost'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Participant Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ParticipantType') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="ParticipantType"
                                                data-style="select-with-transition" title="-" data-size="7" required="true" aria-required="true">
                                                @foreach ($participanttypes as $participanttype)
                                                <option value="{{ $participanttype->id }}"
                                                    {{ $participanttype->id == old('ParticipantType', $package->ParticipantType) ? 'selected' : '' }}>
                                                    {{ $participanttype->Type }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'ParticipantType'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Stalls') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Stalls') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Stalls[]"
                                                data-style="select-with-transition" multiple title="-" data-size="7">
                                                @foreach ($models as $model)
                                                <option value="{{ $model->id }}" {{ (in_array($model->id, $selectdStall)) ? 'selected="selected"' : '' }}>
                                                    {{ $model->Name }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Stalls'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('VisitorData') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('VisitorData') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="VisitorData" data-style="select-with-transition" title="" data-size="100">
                                                <option value="">-</option>
                                                <option value="All"<?=$package->VisitorData == 'All' ? ' selected="selected"' : '';?>>All</option>
                                                <option value="Industry"<?=$package->VisitorData == 'Industry' ? ' selected="selected"' : '';?>>Industry</option>
                                                <option value="Category"<?=$package->VisitorData == 'Category' ? ' selected="selected"' : '';?>>Category</option>
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'VisitorData'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Banners') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Banners') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Banners" data-style="select-with-transition" title="" data-size="100">
                                                <option value="">-</option>
                                                <option value="On"<?=$package->Banners == 'On' ? ' selected="selected"' : '';?>>On</option>
                                                <option value="Off"<?=$package->Banners == 'Off' ? ' selected="selected"' : '';?>>Off</option>
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Banners'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Other Models') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('OtherModels') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="OtherModels" data-style="select-with-transition" title="" data-size="100" required="true" aria-required="true">
                                                <option value="">-</option>
                                                <option value="On"<?=$package->OtherModels == 'On' ? ' selected="selected"' : '';?>>On</option>
                                                <option value="Off"<?=$package->OtherModels == 'Off' ? ' selected="selected"' : '';?>>Off</option>
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'OtherModels'])
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
