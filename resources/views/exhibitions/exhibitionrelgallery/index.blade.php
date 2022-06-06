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
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">collections</i>
                            </div>
                            <h4 class="card-title">{{ __('Expo Media') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="text-left col-md-12">
                                    <a href="{{ route('exhibition.index') }}"
                                        class="btn btn-sm btn-rose">{{ __('Back to list') }}</a>
                                </div>
                                <div class="text-right col-12">
                                    <a href="{{ route('exhibitionRelGallery.create', $exhibition) }}"
                                        class="btn btn-sm btn-rose">{{ __('Add Expo Media') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables"
                                    class="table table-striped table-no-bordered table-hover datatable-rose"
                                    style="display:none">
                                    <thead class="text-primary">
                                        <th>
                                            {{ __('Name') }}
                                        </th>
                                        <th>
                                            {{ __('Gallery') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($exhibitionrelgalleries as $exhibitionrelgallery)
                                        <tr>
                                            <td>
                                                {{ $exhibitionrelgallery->Name }}
                                            </td>
                                            <td>
                                                <img src="{{ $exhibitionrelgallery->multiplepath() }}" alt="...">
                                            </td>
                                            <td class="text-right td-actions">
                                                <form action="{{ route('exhibitionRelGallery.destroy', [$exhibition , $exhibitionrelgallery]) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a class="btn btn-success btn-link"
                                                        href="{{ route('exhibitionRelGallery.edit', [$exhibition , $exhibitionrelgallery]) }}" data-original-title=""
                                                        title="Edit">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                        data-original-title="" title="Delete"
                                                        onclick="confirm('{{ __("Are you sure you want to delete this ExhibitionRelGallery?") }}') ? this.parentElement.submit() : ''">
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
