@extends('dashboard.layouts.app', [
    'activePage' => 'exhibitions-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Participant Management')
])
<style>
    label.error {
         color: #dc3545;
         font-size: 14px;
    }
</style>

<link rel="stylesheet" href="{{ asset('material') }}/css/select2.min.css">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" id="exhbtn-form" enctype="multipart/form-data" action="{{ route('participant.store', $exhibition) }}"
                        autocomplete="off" class="form-horizontal exhibition-form">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">people</i>
                                </div>
                                <h4 class="card-title">{{ __('Add participant') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="text-right col-md-12">
                                        <a href="{{ route('participant.index', $exhibition) }}"
                                            class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Company') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" id="Company" name="Company"
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
                                    <label class="col-sm-2 col-form-label">{{ __('Products') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Products') ? ' has-danger' : '' }}">
                                            <select class="form-control col-sm-4 Products" name="Products[]"
                                                data-style="select-with-transition" id="products" multiple title="-" data-size="7">
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Products'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Participant Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ParticipantType') ? ' has-danger' : '' }}">
                                            <select class="pl-0 pr-0 selectpicker col-sm-12" name="ParticipantType"
                                                data-style="select-with-transition" id="ParticipantType" title="" data-size="7" required="true" aria-required="true">
                                                <option value="">-</option>
                                                @foreach ($participanttypes as $participanttype)
                                                <option value="{{ $participanttype->id }}"
                                                    {{ $participanttype->id == old('ParticipantType') ? 'selected' : '' }}>
                                                    {{ $participanttype->Type }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'ParticipantType'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Package') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Package') ? ' has-danger' : '' }}">
                                            <select class="form-control col-sm-4 Package" name="Package"
                                                data-style="select-with-transition" id="packages" multiple title="" data-size="7" required>
                                                <option value="">-</option>
                                                @foreach ($packages as $package)
                                                <option value="{{ $package->id }}"
                                                    {{ $package->id == old('Package') ? 'selected' : '' }}>
                                                    {{ $package->Name }}</option>
                                                @endforeach
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Package'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('StartDate') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('StartDate') ? ' is-invalid' : '' }} datepicker"
                                                name="StartDate" id="input-StartDate" type="text" placeholder="{{ __('Start Date') }}"
                                                value="{{ old('StartDate') }}" required="true" aria-required="true" />
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
                                                value="{{ old('StartTime') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'StartTime'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('End Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('EndDate') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('EndDate') ? ' is-invalid' : '' }} datepicker"
                                                name="EndDate" id="input-EndDate" type="text" placeholder="{{ __('End Date') }}"
                                                value="{{ old('EndDate') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'EndDate'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('End Time') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('EndTime') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('EndTime') ? ' is-invalid' : '' }} timepicker"
                                                name="EndTime" id="input-EndTime" type="text" placeholder="{{ __('End Time') }}"
                                                value="{{ old('EndTime') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'EndTime'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Products Allowed') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('products_allowed') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('products_allowed') ? ' is-invalid' : '' }}"
                                                name="products_allowed" id="input-products_allowed" type="text" placeholder="{{ __('Products Allowed') }}"
                                                value="{{ old('products_allowed') }}" required="true" aria-required="true" />
                                            @include('dashboard.alerts.feedback', ['field' => 'products_allowed'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Users') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Admins') ? ' has-danger' : '' }}">
                                            <select class="form-control col-sm-4 Admins" name="Admins[]"
                                                data-style="select-with-transition" id="users" multiple title="-" data-size="7" required="true" aria-required="true">
                                            </select>
                                            @include('dashboard.alerts.feedback', ['field' => 'Admins'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto mr-auto card-footer">
                                <button type="submit" class="btn btn-rose">{{ __('Add Participant') }}</button>
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
         <script src="{{ asset('material') }}/js/plugins/select2.min.js"></script>
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
    <script type="text/javascript">
    $(document).ready(function () {
    /*$('#ParticipantType').on('change',function(){
    var exhibitionID = '<?=$exhibition->id?>';
    var participantID = $(this).val();
    if(participantID){
        $.ajax({
           type:"GET",
           url:"{{ route('participant.getPackages') }}?exhibition="+exhibitionID+"&id="+participantID,
           success:function(res){
            if(res){
                $(".Package").empty();
                $(".Package").append('<option value = "">--Choose Package--</option>');
                $.each(res,function(id,Name){
                    $(".Package").append('<option value="'+id+'">'+Name+'</option>');
                });

            }else{
               $(".Package").empty();
            }
        }
    });
    }
   });*/

   $('#Company').on('change',function(){
    var companyID = $(this).val();
    if(companyID){
        $.ajax({
           type:"GET",
           url:"{{ route('participant.getProducts') }}?id="+companyID,
           success:function(res){
            if(res){
                $(".Products").empty();
                $(".Products").append('<option value = "">--Choose Products--</option>');
                $.each(res,function(id,Name){
                    $(".Products").append('<option value="'+id+'">'+Name+'</option>');
                });

            }else{
               $(".Products").empty();
            }
        }
    });
    }
   });

   $('#Company').on('change',function(){
    var companyID = $(this).val();
    if(companyID){
        $.ajax({
           type:"GET",
           url:"{{ route('participant.getUsers') }}?id="+companyID,
           success:function(res){
            if(res){
                $(".Admins").empty();
                $(".Admins").append('<option value = "">--Choose Users--</option>');
                $.each(res,function(id,name){
                    $(".Admins").append('<option value="'+id+'">'+name+'</option>');
                });

            }else{
               $(".Admins").empty();
            }
        }
    });
    }
   });

   $('#products').select2({
    placeholder: "--- Choose Products ---",
    width: '100%'
   });

   $('#users').select2({
    placeholder: "--- Choose Admins ---",
    width: '100%'
   });

   $('#packages').select2({
    placeholder: "--- Choose Package ---",
    maximumSelectionLength: 1,
    width: '100%'
   });

   $("#exhbtn-form").validate({
    rules: {
        Company: "required",
        ParticipantType: "required",
        Package: "required",
        StartDate: "required",
        StartTime: "required",
        EndDate: "required",
        EndTime: "required",
        products_allowed: "required",
    },
    messages: {
        Company: "Please select the company",
        ParticipantType: "Please select the participant type",
        Package: "Please select the package",
        StartDate: "Start Date is required",
        StartTime: "Start Time is required",
        EndDate: "End Date is required",
        EndTime: "End Time is required",
        products_allowed: "Products Allowed is required",
    }
});

});
</script>
@endpush
