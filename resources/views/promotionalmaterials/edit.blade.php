@extends('dashboard.layouts.app', [
    'activePage' => 'promotional-material-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Promotional Materials Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('promotionalmaterial.update', $promotionalmaterial) }}"
                        autocomplete="off" class="form-horizontal company-form">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">library_books</i>
                                </div>
                                <h4 class="card-title">{{ __('Edit promotional materials') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('promotionalmaterial.index') }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Title') ? ' is-invalid' : '' }}"
                                                name="Title" id="input-Title" type="text" placeholder="{{ __('Title') }}"
                                                value="{{ old('Title', $promotionalmaterial->Title) }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Title'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Company') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Company"
                                                data-style="select-with-transition" title="" data-size="7">
                                                <option value="">-</option>
                                                @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ $company->id == old('Company', $promotionalmaterial->Company) ? 'selected' : '' }}>
                                                    {{ $company->CommonName }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Company'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Type') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Type" data-style="select-with-transition" title="" data-size="100" required="true" aria-required="true">
                                                <option value="">-</option>
                                                <option value="Image"<?=$promotionalmaterial->Type == 'Image' ? ' selected="selected"' : '';?>>Image</option>
                                                <option value="Video"<?=$promotionalmaterial->Type == 'Video' ? ' selected="selected"' : '';?>>Video</option>
                                                <option value="Brochure"<?=$promotionalmaterial->Type == 'Brochure' ? ' selected="selected"' : '';?>>Brochure</option>
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Type'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('File') }}</label>
                                    <div class="col-sm-7">
                                        <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                @if ($promotionalmaterial->File)
                                                <img src="{{ $promotionalmaterial->path() }}" alt="...">
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
                                <!---<div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Thumbanail') }}</label>
                                    <div class="col-sm-7">
                                        <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                @if ($promotionalmaterial->Thumbanail)
                                                <img src="{{ $promotionalmaterial->path() }}" alt="...">
                                                @else
                                                <img src="{{ asset('material') }}/img/image_placeholder.jpg" alt="...">
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-file">
                                                    <span class="fileinput-new">{{ __('Select Image') }}</span>
                                                    <span class="fileinput-exists">{{ __('Change') }}</span>
                                                    <input type="file" name="picture" id="input-picture" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger fileinput-exists"
                                                    data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                    {{ __('Remove') }}</a>
                                            </div>
                                            @include('dashboard.alerts.feedback', ['field' => 'picture'])
                                        </div>
                                    </div>
                                </div>--->
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
