@extends('dashboard.layouts.app', [
    'activePage' => 'inquiry-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Inquiry Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">phone</i>
                            </div>
                            <h4 class="card-title">{{ __('Inquiries') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="text-right col-12">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables"
                                    class="table table-striped table-no-bordered table-hover datatable-rose"
                                    style="display:none">
                                    <thead class="text-primary">
                                        <th>
                                            {{ __('User Name') }}
                                        </th>
                                        <th>
                                            {{ __('Company Name') }}
                                        </th>
                                        <th>
                                            {{ __('Exhibition Name') }}
                                        </th>
                                        <th>
                                            {{ __('Date') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($inquiries as $inquiry)
                                        <tr>
                                            <td>
                                                {{ $inquiry->User }}
                                            </td>
                                            <td>
                                                {{ $inquiry->Company }}
                                            </td>
                                            <td>
                                                {{ $inquiry->Exhibition }}
                                            </td>
                                            <td>
                                                {{ date('Y-m-d', strtotime($inquiry->Date)) }}
                                            </td>
                                            <td class="text-right td-actions">
                                                <form action="{{ route('inquiry.destroy', $inquiry) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="button" class="btn btn-danger btn-link"
                                                        data-original-title="" title="Delete"
                                                        onclick="confirm('{{ __("Are you sure you want to delete this inquiry?") }}') ? this.parentElement.submit() : ''">
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
