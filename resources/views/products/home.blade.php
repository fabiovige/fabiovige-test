@extends('layout.app')

@section('content')
    <div class="row mb-2 justify-content-center">
        <div class="col-12">
            <h2>Gerenciamento de produtos</h2>
            <div class="card">
                <div class="card-header">Lista de produtos</div>
                <div class="card-body">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-bordered table-hover table-responsive tableProduct">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th  scope="col">Nome</th>
                                <th  scope="col">Descrição</th>
                                <th  scope="col">Preço</th>
                                <th  scope="col">Estoque</th>
                                <th  scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push ('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatable/datatables.min.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/datatable/datatables.min.js') }}"></script>
    <script type="text/javascript">
        $('.tableProduct').DataTable();
    </script>
@endpush
