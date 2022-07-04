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
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Imagem</th>
                                <th>Estoque</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Ação</th>
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
        $('.tableProduct').dataTable( {
            language: {
                url: "{{ asset('vendor/datatable/pt-BR.json') }}"
            },
            processing: true,
            serverSide: true,
            autoWidth: true,
            responsive: true,
            "ajax": {
                "url": '{{ route("products.index") }}',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'description' },
                { data: 'price' },
                { data: 'image' },
                { data: 'stocked' },
                { data: 'status' },
                { data: 'date' },
                { 'defaultContent': "<a href='{{ route('home') }}' type='button' class='btn btn-secondary'>Gerenciar</a>", "dt" : 7 },
            ]
        } );

        {{--$('.tableProduct').DataTable({--}}
        {{--    language: {--}}
        {{--        url: "{{ asset('vendor/datatable/pt-BR.json') }}"--}}
        {{--    },--}}
        {{--    processing: true,--}}
        {{--    serverSide: true,--}}
        {{--    autoWidth: true,--}}
        {{--    responsive: true,--}}
        {{--    --}}{{--ajax: '{{ route("products.index") }}',--}}
        {{--    ajax: {--}}
        {{--        url: '{{ route("products.index") }}',--}}
        {{--        dataSrc: 'data'--}}
        {{--    },--}}
        {{--    dataType: 'json',--}}
        {{--    columns: [--}}
        {{--        {--}}
        {{--        data: 'id',--}}
        {{--        name: 'id'--}}
        {{--        },--}}
        {{--        {--}}
        {{--            data: 'name',--}}
        {{--            name: 'name'--}}
        {{--        },--}}
        {{--        {--}}
        {{--            data: 'description',--}}
        {{--            name: 'description'--}}
        {{--        },--}}
        {{--        {--}}
        {{--            data: 'price',--}}
        {{--            name: 'price'--}}
        {{--        },--}}
        {{--        {--}}
        {{--            data: 'stocked',--}}
        {{--            name: 'stocked'--}}
        {{--        },--}}
        {{--        {--}}
        {{--            data: 'image',--}}
        {{--            name: 'image'--}}
        {{--        },--}}
        {{--        {--}}
        {{--            data: 'status',--}}
        {{--            name: 'status'--}}
        {{--        },--}}
        {{--        {--}}
        {{--            data: 'date',--}}
        {{--            name: 'date'--}}
        {{--        },--}}
        {{--        {--}}
        {{--            data: 'action',--}}
        {{--            name: 'action',--}}
        {{--            orderable: false,--}}
        {{--            searchable: false--}}
        {{--        }--}}
        {{--    ]--}}
        {{--});--}}
    </script>
@endpush
