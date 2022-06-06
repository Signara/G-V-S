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
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">library_books</i>
                            </div>
                            <h4 class="card-title">{{ __('Promotional Materials') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="text-right col-12">
                                    <a href="{{ route('promotionalmaterial.create') }}"
                                        class="btn btn-sm btn-rose">{{ __('Add Promotional Materials') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables"
                                    class="table table-striped table-no-bordered table-hover datatable-rose"
                                    style="display:none">
                                    <thead class="text-primary">
                                        <th>
                                            {{ __('File') }}
                                        </th>
                                        <th>
                                            {{ __('Title') }}
                                        </th>
                                        <th>
                                            {{ __('Company') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($promotionalmaterials as $promotionalmaterial)
                                        <tr>
                                            <td>
                                                <?php $slug = @explode('/',$promotionalmaterial->File); ?>
                                                @if($promotionalmaterial->Type == 'Video')
                                                {{ $slug[1] }}
                                                @else
                                                <img src="{{ $promotionalmaterial->path() }}" alt="" style="max-width: 200px;">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $promotionalmaterial->Title }}
                                            </td>
                                            <td>
                                                {{ $promotionalmaterial->company }}
                                            </td>
                                            <td class="text-right td-actions">
                                                <form action="{{ route('promotionalmaterial.destroy', $promotionalmaterial) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="btn btn-success btn-link"
                                                        href="{{ route('promotionalmaterial.edit', $promotionalmaterial) }}"
                                                        data-original-title="" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                        data-original-title="" title="Delete"
                                                        onclick="confirm('{{ __("Are you sure you want to delete this promotionalmaterial?") }}') ? this.parentElement.submit() : ''">
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
                    searchPlaceholder: "Search promotionalmaterial",
                },
                "columnDefs": [
                    { "orderable": false, "targets": 3 },
                ],
            });
        });
    </script>

@endpush
