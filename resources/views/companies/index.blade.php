@extends('dashboard.layouts.app', [
    'activePage' => 'company-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Company Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">business</i>
                            </div>
                            <h4 class="card-title">{{ __('Companies') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="text-right col-12">
                                    <a href="{{ route('company.create') }}"
                                        class="btn btn-sm btn-rose">{{ __('Add company') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables"
                                    class="table table-striped table-no-bordered table-hover datatable-rose"
                                    style="display:none">
                                    <thead class="text-primary">
                                        <th>
                                            {{ __('Logo') }}
                                        </th>
                                        <th>
                                            {{ __('Brand Name') }}
                                        </th>
                                        <th>
                                            {{ __('Email') }}
                                        </th>
                                        <th>
                                            {{ __('Phone') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($companies as $company)
                                        <tr>
                                            <td>
                                                <img src="{{ $company->path() }}" alt="" style="max-width: 200px;">
                                            </td>
                                            <td>
                                                {{ $company->CommonName }}
                                            </td>
                                            <td>
                                                {{ $company->Email }}
                                            </td>
                                            <td>
                                                {{ $company->Phone }}
                                            </td>
                                            <td class="text-right td-actions">
                                                <form action="{{ route('company.destroy', $company) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a class="btn btn-success btn-link"
                                                        href="{{ route('company.edit', $company) }}" data-original-title=""
                                                        title="Edit">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                        data-original-title="" title="Delete"
                                                        onclick="confirm('{{ __("Are you sure you want to delete this company?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#datatables').fadeIn(1100);
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search companies",
                },
                "columnDefs": [
                    { "orderable": false, "targets": 3 },
                ],
            });
        });
    </script>

@endpush
