@extends('dashboard.layouts.app', [
    'activePage' => 'exhibitions-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Expo Media Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('exhibitionRelGallery.store', $exhibition) }}"
                        autocomplete="off" class="form-horizontal exhibition-form">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">collections</i>
                                </div>
                                <h4 class="card-title">{{ __('Add Expo Media') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('exhibitionRelGallery.index', $exhibition) }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Gallery') }}</label>
                                    <div class="col-sm-7">
                                      <div class="text-center fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                          <img src="{{ asset('material') }}/img/placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                                          <span class="btn btn-rose btn-file">
                                            <span class="fileinput-new">{{ __('Select Gallery') }}</span>
                                            <span class="fileinput-exists">{{ __('Change') }}</span>
                                            <input type="file" name="gallary" id = "input-gallary" required="true" aria-required="true" />
                                          </span>
                                            <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Remove') }}</a>
                                        </div>
                                        @include('dashboard.alerts.feedback', ['field' => 'gallary'])
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto mr-auto card-footer">
                                <button type="submit" class="btn btn-rose">{{ __('Add Expo Media') }}</button>
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
