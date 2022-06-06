@extends('dashboard.layouts.app', [
    'activePage' => 'models-management',
    'menuParent' => 'laravel',
    'titlePage' => __('Models Management')
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store_mall_directory</i>
                            </div>
                            <h4 class="card-title">{{ __('Models') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="text-right col-12">
                                    <a href="{{ route('model.create') }}"
                                        class="btn btn-sm btn-rose">{{ __('Add models') }}</a>
                                </div>
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
                                            {{ __('xValue') }}
                                        </th>
                                        <th>
                                            {{ __('yValue') }}
                                        </th>
                                        <th>
                                            {{ __('zValue') }}
                                        </th>
                                        <th>
                                            {{ __('Type') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($models as $model)
                                        <tr>
                                            <td>
                                                <img src="{{ $model->path() }}" alt="" style="max-width: 200px;">
                                            </td>
                                            <td>
                                                {{ $model->Name }}
                                            </td>
                                            <td>
                                                {{ $model->xValue }}
                                            </td>
                                            <td>
                                                {{ $model->yValue }}
                                            </td>
                                            <td>
                                                {{ $model->zValue }}
                                            </td>
                                            <td>
                                                {{ $model->Type }}
                                            </td>
                                            <td class="text-right td-actions">
                                                <form action="{{ route('model.destroy', $model) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a class="btn btn-success btn-link"
                                                        href="{{ route('model.edit', $model) }}" data-original-title=""
                                                        title="Edit">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                        data-original-title="" title="Delete"
                                                        onclick="confirm('{{ __("Are you sure you want to delete this model?") }}') ? this.parentElement.submit() : ''">
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
                    searchPlaceholder: "Search models",
                },
                "columnDefs": [
                    { "orderable": false, "targets": 3 },
                ],
            });
        });
    </script>

@endpush
