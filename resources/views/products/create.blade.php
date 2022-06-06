@extends('dashboard.layouts.app', [
    'activePage' => 'products-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Products Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}"
                        autocomplete="off" class="form-horizontal model-form">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">shopping_cart</i>
                                </div>
                                <h4 class="card-title">{{ __('Add products') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('product.index') }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Company') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Company"
                                                data-style="select-with-transition" title="" data-size="7" required="true" aria-required="true">
                                                <option value="">-</option>
                                                @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ $company->id == old('Company') ? 'selected' : '' }}>
                                                    {{ $company->CommonName }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Company'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="10"
                                                class="form-control{{ $errors->has('Description') ? ' is-invalid' : '' }}"
                                                name="Description" id="input-Description" type="text"
                                                placeholder="{{ __('Description') }}" required="true"
                                                aria-required="true">{{ old('Description') }}</textarea>
                                            @include('dashboard.alerts.feedback', ['field' => 'Description'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                                    <div class="col-sm-7">
                                      <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                          <img src="{{ asset('material') }}/img/placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                                          <span class="btn btn-rose btn-file">
                                            <span class="fileinput-new">{{ __('Select Image') }}</span>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Price') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Price') ? ' is-invalid' : '' }}"
                                                name="Price" id="input-Price" type="number" placeholder="{{ __('Price') }}"
                                                value="{{ old('Price') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Price'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto mr-auto card-footer">
                                <button type="submit" class="btn btn-rose">{{ __('Add products') }}</button>
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
