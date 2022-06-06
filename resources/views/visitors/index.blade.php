@extends('dashboard.layouts.app', [
    'activePage' => 'visitor-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Visitors Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">person_pin</i>
                            </div>
                            <h4 class="card-title">{{ __('Visitors') }}</h4>
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
                                            {{ __('Exhibition') }}
                                        </th>
                                        <th>
                                            {{ __('Visitor') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($visitors as $visitor)
                                        <tr>
                                            <td>
                                                {{ $visitor->Exhibition }}
                                            </td>
                                            <td>
                                                {{ $visitor->Visitor }}
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
                    searchPlaceholder: "Search visitor",
                },
                "columnDefs": [
                    { "orderable": false, "targets": 3 },
                ],
            });
        });
    </script>

@endpush
