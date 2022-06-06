@extends('dashboard.layouts.app', [
    'activePage' => 'exhibitions-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Exhibitions Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">account_balance</i>
                            </div>
                            <h4 class="card-title">{{ __('Exhibitions') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
                                if ($role->name != 'Member')
                                { ?>
                                    <div class="text-right col-12">
                                        <a href="{{ route('exhibition.create') }}"
                                            class="btn btn-sm btn-rose">{{ __('Add exhibitions') }}</a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables"
                                    class="table table-striped table-no-bordered table-hover datatable-rose"
                                    style="display:none">
                                    <thead class="text-primary">
                                        <th>
                                            {{ __('Image') }}
                                        </th>
                                        <th>
                                            {{ __('Name') }}
                                        </th>
                                        <th>
                                            {{ __('Start Date') }}
                                        </th>
                                        <th>
                                            {{ __('Start Time') }}
                                        </th>
                                        <th>
                                            {{ __('End Date') }}
                                        </th>
                                        <th>
                                            {{ __('End Time') }}
                                        </th>
                                        <th>
                                            {{ __('Organiser') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($exhibitions as $exhibition)
                                        <tr>
                                            <td>
                                                <img src="{{ $exhibition->path() }}" alt="" style="max-width: 200px;">
                                            </td>
                                            <td>
                                                {{ $exhibition->Name }}
                                            </td>
                                            <td>
                                                {{ $exhibition->StartDate }}
                                            </td>
                                            <td>
                                                {{ $exhibition->StartTime }}
                                            </td>
                                            <td>
                                                {{ $exhibition->EndDate }}
                                            </td>
                                            <td>
                                                {{ $exhibition->EndTime }}
                                            </td>
                                            <td>
                                                {{ $exhibition->company }}
                                            </td>
                                            <td class="text-right td-actions">
                                                <form action="{{ route('exhibition.destroy', $exhibition) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a class="btn btn-warning btn-link"
                                                        href="{{ route('exhibitionRelGallery.index', $exhibition) }}" data-toggle="tooltip" data-placement="top" title="Expo Media">
                                                        <i class="material-icons">collections</i>
                                                        <div class="ripple-container"></div>
                                                    </a>

                                                    <a href="{{ route('hall.index', $exhibition) }}" data-toggle="tooltip" data-placement="top" title="Hall" class="btn btn-warning btn-link">
                                                        <i class="material-icons">store_mall_directory</i>
                                                        <div class="ripple-container"></div>
                                                    </a>

                                                    <a href="{{ route('participant.index', $exhibition) }}" data-toggle="tooltip" data-placement="top" title="Participants" class="btn btn-info btn-link">
                                                        <i class="material-icons">people</i>
                                                        <div class="ripple-container"></div>
                                                    </a>

                                                    <a class="btn btn-success btn-link"
                                                        href="{{ route('exhibition.edit', $exhibition) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                        onclick="confirm('{{ __("Are you sure you want to delete this exhibition?") }}') ? this.parentElement.submit() : ''">
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
                    searchPlaceholder: "Search exhibitions",
                },
                "columnDefs": [
                    { "orderable": false, "targets": 3 },
                ],
            });
        });
    </script>

@endpush
