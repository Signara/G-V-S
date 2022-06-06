@extends('dashboard.layouts.app', [
    'activePage' => 'company-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Company Management')
])
<link rel="stylesheet" href="{{ asset('material') }}/css/select2.min.css">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('company.store') }}"
                        autocomplete="off" class="form-horizontal company-form">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">business</i>
                                </div>
                                <h4 class="card-title">{{ __('Add company') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('company.index') }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Logo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ asset('material') }}/img/image_placeholder.jpg" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-file">
                                                    <span class="fileinput-new">{{ __('Select image') }}</span>
                                                    <span class="fileinput-exists">{{ __('Change') }}</span>
                                                    <input type="file" name="photo" id="input-picture" required="true" aria-required="true" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger fileinput-exists"
                                                    data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                    {{ __('Remove') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Brand Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('CommonName') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('CommonName') ? ' is-invalid' : '' }}"
                                                name="CommonName" id="input-CommonName" type="text" placeholder="{{ __('Brand Name') }}"
                                                value="{{ old('CommonName') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'CommonName'])
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
                                    <label class="col-sm-2 col-form-label">{{ __('Registered Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('RegisteredName') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('RegisteredName') ? ' is-invalid' : '' }}"
                                                name="RegisteredName" id="input-RegisteredName" type="text" placeholder="{{ __('Registered Name') }}"
                                                value="{{ old('RegisteredName') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'RegisteredName'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('RegisteredName') ? ' is-invalid' : '' }}"
                                                name="Email" id="input-Email" type="email" placeholder="{{ __('Email') }}"
                                                value="{{ old('Email') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Email'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Phone') ? ' is-invalid' : '' }}"
                                                name="Phone" id="input-Phone" type="text" placeholder="{{ __('Phone') }}"
                                                value="{{ old('Phone') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Phone'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Website') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Website') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Website') ? ' is-invalid' : '' }}"
                                                name="Website" id="Website" type="text" placeholder="{{ __('Website') }}"
                                                value="{{ old('Website') }}" />
                                            @include('dashboard.alerts.feedback', ['field' => 'Website'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Description') ? ' has-danger' : '' }}">
                                            <textarea cols="30" rows="5" class="form-control{{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" id="input-Description" type="text" placeholder="{{ __('Description') }}">{{ old('Description') }}</textarea>
                                            @include('dashboard.alerts.feedback', ['field' => 'Description'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Address') ? ' has-danger' : '' }}">
                                            <textarea type="text" cols="30" rows="5" id="Address" class="form-control" name="Address" placeholder="{{ __('Address') }}">{{ old('Address') }}</textarea>
                                            @include('dashboard.alerts.feedback', ['field' => 'Address'])
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
                                        <div class="form-group{{ $errors->has('Sectors') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="Sectors" id="sector"
                                            data-style="select-with-transition" title="-" data-size="7" required="true" aria-required="true">
                                                @foreach ($sectors as $sector)
                                                <option value="{{ $sector->id }}"
                                                    {{ $sector->id == old('Sectors') ? 'selected' : '' }}>
                                                    {{ $sector->name }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Sectors'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Categories') ? ' has-danger' : '' }}">
                                            <select class="form-control col-sm-4 category" name="Categories[]"
                                                data-style="select-with-transition" id="category" multiple title="-" data-size="7" required="true" aria-required="true">
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Categories'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Company Admin') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('CompanyAdminUserIDs') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="CompanyAdminUserIDs"
                                                data-style="select-with-transition" title="-" data-size="7">
                                                <option Value="0">None</option>
                                                @if(!empty($users))
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == old('CompanyAdminUserIDs') ? 'selected' : '' }}>
                                                    {{ $user->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'CompanyAdminUserIDs'])
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
                            </div>
                            <div class="ml-auto mr-auto card-footer">
                                <button type="submit" class="btn btn-rose">{{ __('Add company') }}</button>
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
    <script src="{{ asset('material') }}/js/plugins/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('blur', 'input#input-CommonName', function () {
                if (!$('input#input-slug').val()) {
                    setSlug($('input#input-CommonName'), $('input#input-slug'));
                }
            })

            $('#sector').on('change',function(){
                var sectorID = $(this).val();
                if(sectorID){
                    $.ajax({
                       type:"GET",
                       url:"{{ route('company.getCategories') }}?id="+sectorID,
                       success:function(res){
                        if(res){
                            $(".category").empty();
                            $(".category").append('<option>--Choose Categories--</option>');
                            $.each(res,function(id,name){
                                $(".category").append('<option value="'+id+'">'+name+'</option>');
                            });

                        }else{
                           $(".category").empty();
                        }
                    }
                });
                }
            });

            $('#category').select2({
                placeholder: "--- Choose Categories ---",
                width: '100%'
            });

            $("#input-Phone").attr("maxlength", "10");
            $("#input-Phone").keypress(function(e) {
                var kk = e.which;
                if(kk < 48 || kk > 57)
                e.preventDefault();
            });

        });

    </script>
@endpush
